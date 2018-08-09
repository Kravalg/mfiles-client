<?php

namespace spec\MFiles\View\Object\Response;

use MFiles\Service\View\Response\GetViewItemsResponse;
use PhpSpec\ObjectBehavior;

class GetViewItemsResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GetViewItemsResponse::class);
    }
}
