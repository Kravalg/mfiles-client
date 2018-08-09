<?php

namespace spec\MFiles;

use GuzzleHttp\ClientInterface;
use MFiles\APIHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PhpSpec\ObjectBehavior;

class APIHandlerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(getenv('TESTS__MFILES_BASE_URI'));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(APIHandler::class);
    }

    /**
     * @throws \Exception
     */
    function it_has_a_default_logger()
    {
        $logger = $this->getLogger();
        $logger->shouldHaveType(Logger::class);

        $handler = $logger->popHandler();
        $handler->shouldHaveType(StreamHandler::class);
    }

    /**
     * @throws \Exception
     */
    function it_has_a_http_client()
    {
        $http = $this->getHttpClient();
        $http->shouldHaveType(ClientInterface::class);

        $http->getBaseUrl()->shouldBe(getenv('TESTS__MFILES_BASE_URI'));
    }
}
