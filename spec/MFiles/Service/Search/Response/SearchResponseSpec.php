<?php

namespace spec\MFiles\Service\Search\Response;

use MFiles\Service\Search\Response\SearchResponse;
use PhpSpec\ObjectBehavior;

class SearchResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SearchResponse::class);
    }
}
