<?php

namespace spec\MFiles\Service\File\Response;

use MFiles\Service\File\Response\DownloadFileResponse;
use PhpSpec\ObjectBehavior;

class DownloadFileResponseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(DownloadFileResponse::class);
    }
}
