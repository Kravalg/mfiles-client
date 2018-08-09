<?php

namespace spec\MFiles\Service\Object\Response;

use MFiles\Service\Object\Response\GetObjectsResponse;
use PhpSpec\ObjectBehavior;

class GetObjectsResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GetObjectsResponse::class);
    }
}
