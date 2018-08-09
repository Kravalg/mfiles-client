<?php

namespace spec\MFiles\Service\File;

use MFiles\APIHandler;
use MFiles\Service\File\DownloadFile;
use MFiles\Service\File\Request\DownloadFileRequest;
use MFiles\Service\File\Response\DownloadFileResponse;
use PhpSpec\ObjectBehavior;
use spec\MFiles\Helper\HandlerHelper;

class DownloadFileSpec extends ObjectBehavior
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
        $this->shouldHaveType(DownloadFile::class);
    }

    /**
     * @param APIHandler|\PhpSpec\Wrapper\Collaborator $apiHandler
     *
     * @throws \MFiles\Service\Exception\AccessDeniedException
     * @throws \MFiles\Service\Exception\ClientErrorException
     * @throws \MFiles\Service\Exception\InvalidJsonException
     * @throws \MFiles\Service\Exception\NotFoundException
     * @throws \MFiles\Service\Exception\ServiceException
     */
    function it_get_an_objects(APIHandler $apiHandler)
    {
        /** @var DownloadFileResponse $response */
        $request = new DownloadFileRequest(
            getenv('TESTS__MFILES_FILE_ID'),
            getenv('TESTS__MFILES_FILE_OBJECT_TYPE'),
            getenv('TESTS__MFILES_FILE_OBJECT_ID'),
            'latest'
        );

        $response = $this->call($request);
        $response->shouldHaveType(DownloadFileResponse::class);

        $response->getFile()->shouldNotBeNull();
    }
}
