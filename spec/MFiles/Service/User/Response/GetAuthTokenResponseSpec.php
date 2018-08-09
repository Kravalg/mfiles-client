<?php

namespace spec\MFiles\Service\User\Response;

use MFiles\Service\User\Response\GetAuthTokenResponse;
use PhpSpec\ObjectBehavior;

class GetAuthTokenResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GetAuthTokenResponse::class);
    }
}
