<?php

namespace spec\MFiles;

use MFiles\APIHandler;
use MFiles\MFilesClient;
use PhpSpec\ObjectBehavior;

class MFilesClientSpec extends ObjectBehavior
{
    function let(APIHandler $apiHandler)
    {
        $this->beConstructedWith($apiHandler);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(MFilesClient::class);
    }

    /**
     * @throws \Exception
     */
    function it_has_an_api_handler()
    {
        $handler = $this->getApiHandler();
        $handler->shouldHaveType(APIHandler::class);
    }
}
