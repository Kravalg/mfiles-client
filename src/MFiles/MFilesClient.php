<?php

namespace MFiles;

use MFiles\Service\File\DownloadFile;
use MFiles\Service\File\Request\DownloadFileRequest;
use MFiles\Service\File\Response\DownloadFileResponse;
use MFiles\Service\Object\GetObjects;
use MFiles\Service\Object\Request\GetObjectsRequest;
use MFiles\Service\Search\Request\SearchRequest;
use MFiles\Service\Search\Response\SearchResponse;
use MFiles\Service\Search\Search;
use MFiles\Service\User\GetAuthToken;
use MFiles\Service\User\Request\GetAuthTokenRequest;
use MFiles\Service\User\Response\GetAuthTokenResponse;
use MFiles\Service\View\GetViewItems;
use MFiles\Service\View\Item\GetItemsFromView;
use MFiles\Service\View\Item\Request\GetItemsFromViewRequest;
use MFiles\Service\View\Item\Response\GetItemsFromViewResponse;
use MFiles\Service\View\Request\GetViewItemsRequest;
use MFiles\Service\View\Response\GetViewItemsResponse;

class MFilesClient
{
    /** @var APIHandler */
    private $apiHandler;

    /**
     * MFilesClientService constructor.
     *
     * @param APIHandler $apiHandler
     */
    public function __construct(APIHandler $apiHandler)
    {
        $this->apiHandler = $apiHandler;
    }

    /**
     * Allows to authorize client requests to the server.
     *
     * @param string $username
     * @param string $password
     * @param string $vaultGuid
     *
     * @throws Service\Exception\AccessDeniedException
     * @throws Service\Exception\ClientErrorException
     * @throws Service\Exception\InvalidJsonException
     * @throws Service\Exception\NotFoundException
     * @throws Service\Exception\ServiceException
     *
     * @return GetAuthTokenResponse
     */
    public function authorize(string $username, string $password, string $vaultGuid)
    {
        $service = new GetAuthToken($this->apiHandler);

        /** @var GetAuthTokenResponse $response */
        $response = $service->call(
            new GetAuthTokenRequest(
                $username,
                $password,
                $vaultGuid
            )
        );

        $this->apiHandler->setAuthToken($response->getValue());

        return $response;
    }

    /**
     * @throws Service\Exception\MFilesException
     *
     * @return GetObjectsRequest
     */
    public function getAllDocuments()
    {
        $service = new GetObjects($this->apiHandler);

        /** @var GetObjectsRequest $response */
        $response = $service->call(
            new GetObjectsRequest()
        );

        return $response;
    }

    /**
     * @throws Service\Exception\MFilesException
     *
     * @return GetViewItemsResponse
     */
    public function getRootViewItems()
    {
        $service = new GetViewItems($this->apiHandler);

        /** @var GetViewItemsResponse $response */
        $response = $service->call(
            new GetViewItemsRequest()
        );

        return $response;
    }

    /**
     * @param int $viewId
     *
     * @throws Service\Exception\MFilesException
     *
     * @return GetItemsFromViewResponse
     */
    public function getItemsFromView(int $viewId)
    {
        $service = new GetItemsFromView($this->apiHandler);

        /** @var GetItemsFromViewResponse $response */
        $response = $service->call(
            new GetItemsFromViewRequest($viewId)
        );

        return $response;
    }

    /**
     * @param int    $fileID
     * @param int    $objectType
     * @param int    $objectID
     * @param string $objectVersion
     *
     * @throws Service\Exception\MFilesException
     *
     * @return DownloadFileResponse
     */
    public function downloadFile(
        int $fileID,
        int $objectType,
        int $objectID,
        string $objectVersion = 'latest'
    ) {
        $service = new DownloadFile($this->apiHandler);

        /** @var DownloadFileResponse $response */
        $response = $service->call(
            new DownloadFileRequest(
                $fileID,
                $objectType,
                $objectID,
                $objectVersion
            )
        );

        return $response;
    }

    /**

     * @param array $searchRequest
     *
     * @throws Service\Exception\MFilesException
     *
     * @return SearchResponse
     */
    public function searchResult(
        array $searchRequest
    ) {
        $result = new Search($this->apiHandler);

        /** @var SearchResponse $response */
        $response = $result->call(
            new SearchRequest(
                $searchRequest
            )
        );

        return $response;
    }
    /**
     * @return APIHandler
     */
    public function getApiHandler()
    {
        return $this->apiHandler;
    }
}
