<?php

namespace spec\MFiles\Service\View\Item;

use MFiles\APIHandler;
use MFiles\Service\View\Item\GetItemsFromView;
use MFiles\Service\View\Item\Request\GetItemsFromViewRequest;
use MFiles\Service\View\Item\Response\GetItemsFromViewResponse;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Helper\HandlerHelper;

class GetItemsFromViewSpec extends ObjectBehavior
{
    const MFILES_VIEW_ID = 2;

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
        $this->shouldHaveType(GetItemsFromView::class);
    }

    /**
     * @param APIHandler $apiHandler
     */
    function it_get_items_from_view(APIHandler $apiHandler)
    {
        $request = new GetItemsFromViewRequest(static::MFILES_VIEW_ID);

        /** @var GetItemsFromViewResponse $response */
        $response = $this->call($request);
        $response->shouldHaveType(GetItemsFromViewResponse::class);

        $response->shouldNotBeNull();
    }
}
