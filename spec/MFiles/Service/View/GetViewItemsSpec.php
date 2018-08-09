<?php

namespace spec\MFiles\Service\View;

use MFiles\APIHandler;
use MFiles\Service\View\GetViewItems;
use MFiles\Service\View\Request\GetViewItemsRequest;
use MFiles\Service\View\Response\GetViewItemsResponse;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Helper\HandlerHelper;
use spec\MFiles\Service\LoadJson;

class GetViewItemsSpec extends ObjectBehavior
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
        $this->shouldHaveType(GetViewItems::class);
    }

    /**
     * @param APIHandler|\PhpSpec\Wrapper\Collaborator $apiHandler
     *
     * @throws \MFiles\Service\Exception\MFilesException
     */
    function it_get_viev_items(APIHandler $apiHandler)
    {
        /** @var GetViewItems $cl */
        $cl = $this;

        $request = new GetViewItemsRequest();

        $apiHandler->get($cl->getUri(), [
            $cl->getRequestOptions($request),
        ])->willReturn(LoadJson::fromFile(__DIR__.'/fixtures/get-view-items.json'));

        /** @var GetViewItemsResponse $response */
        $response = $cl->call($request);
        $response->shouldHaveType(GetViewItemsResponse::class);

        $response->shouldNotBeNull();
    }
}
