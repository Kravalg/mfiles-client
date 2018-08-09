<?php

namespace spec\MFiles\Service\Object;

use MFiles\APIHandler;
use MFiles\Service\Object\GetObjects;
use MFiles\Service\Object\Request\GetObjectsRequest;
use MFiles\Service\Object\Response\GetObjectsResponse;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Helper\HandlerHelper;
use spec\MFiles\Service\LoadJson;

class GetObjectsSpec extends ObjectBehavior
{
    /**
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    function let()
    {
        $apiHandler = HandlerHelper::getAuthorized(
            new APIHandler(getenv('TESTS__MFILES_BASE_URI'))
        );

        $this->beConstructedWith($apiHandler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(GetObjects::class);
    }

    /**
     * @param APIHandler|\PhpSpec\Wrapper\Collaborator $apiHandler
     *
     * @throws \MFiles\Service\Exception\MFilesException
     */
    function it_get_an_objects(APIHandler $apiHandler)
    {

        /** @var GetObjectsResponse $response */
        $request = new GetObjectsRequest();

        $apiHandler->get($this->getUri(), [
            $this->getRequestOptions($request),
        ])->willReturn(LoadJson::fromFile(__DIR__.'/fixtures/get-object.json'));

        $response = $this->call($request);
        $response->shouldHaveType(GetObjectsResponse::class);

        $response->getObjects()->shouldNotBeNull();
    }
}
