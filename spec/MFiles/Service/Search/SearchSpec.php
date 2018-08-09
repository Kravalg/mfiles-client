<?php

namespace spec\MFiles\Service\Search;

use MFiles\APIHandler;
use MFiles\Service\Search\Request\SearchRequest;
use MFiles\Service\Search\Response\SearchResponse;
use MFiles\Service\Search\Search;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Helper\HandlerHelper;
use spec\MFiles\Service\LoadJson;

class SearchSpec extends ObjectBehavior
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
        $this->shouldHaveType(Search::class);
    }

    /**
     * @param APIHandler|\PhpSpec\Wrapper\Collaborator $apiHandler
     *
     * @throws \MFiles\Service\Exception\MFilesException
     */
    function it_get_an_search_result(APIHandler $apiHandler)
    {

        /** @var SearchResponse $response */
        $request = new SearchRequest(['q' => 'off']);

        $apiHandler->get($this->getUri($request), [
            $this->getRequestOptions(),
        ])->willReturn(LoadJson::fromFile(__DIR__.'/fixtures/search-result.json'));

        $response = $this->call($request);
        $response->shouldHaveType(SearchResponse::class);

        $response->getObjects()->shouldNotBeNull();
    }
}
