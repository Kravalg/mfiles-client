<?php

namespace spec\MFiles\Service\User;

use MFiles\APIHandler;
use MFiles\Service\User\GetAuthToken;
use MFiles\Service\User\Request\GetAuthTokenRequest;
use MFiles\Service\User\Response\GetAuthTokenResponse;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Service\LoadJson;

class GetAuthTokenSpec extends ObjectBehavior
{
    function let()
    {
        $apiHandler = new APIHandler(getenv('TESTS__MFILES_BASE_URI'));

        $this->beConstructedWith($apiHandler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GetAuthToken::class);
    }

    /**
     * @param APIHandler|\PhpSpec\Wrapper\Collaborator $apiHandler
     *
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    function it_gets_a_token(APIHandler $apiHandler)
    {
        $request = new GetAuthTokenRequest(
            getenv('TESTS__MFILES_USERNAME'),
            getenv('TESTS__MFILES_PASSWORD'),
            getenv('TESTS__MFILES_VAULTGUID')
        );

        $apiHandler->post($this->getUri(), [
            $this->getRequestOptions($request),
        ])->willReturn(LoadJson::fromFile(__DIR__.'/fixtures/get-auth-token.json'));

        $response = $this->call($request);
        $response->shouldHaveType(GetAuthTokenResponse::class);

        $response->getValue()->shouldNotBeNull();
    }
}
