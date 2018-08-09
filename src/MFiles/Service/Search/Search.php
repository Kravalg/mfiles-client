<?php

namespace MFiles\Service\Search;

use MFiles\Model\MFilesFile;
use MFiles\Model\Search\MFilesObjectVersion;
use MFiles\Model\Search\MFilesSearch;
use MFiles\Service\MFilesGetService;
use MFiles\Service\MFilesRequestInterface;
use MFiles\Service\MFilesResponseInterface;
use MFiles\Service\Search\Request\SearchRequest;
use MFiles\Service\Search\Response\SearchResponse;

class Search extends MFilesGetService
{
    const URI = 'objects?';

    /**
     * Return the service URI.
     * Follow the rules from RFC 3986 http://tools.ietf.org/html/rfc3986#section-5.2.
     *
     * @param MFilesRequestInterface|null $request
     *
     * @return string
     */
    public function getUri($request = null): string
    {
        /* @var SearchRequest $request */
        return self::URI.$request->getSearchRequest();
    }

    /**
     * Transform an Request to POST parameters.
     *
     * @param MFilesRequestInterface $request
     *
     * @return array
     */
    public function getRequestOptions(MFilesRequestInterface $request = null): array
    {
        return [
            'json' => [

            ],
        ];
    }

    /**
     * Transform an JSON response to a Response object.
     *
     * @param $response
     *
     * @return MFilesResponseInterface
     */
    protected function parseResponse($response): MFilesResponseInterface
    {
        $objects = $this->parseItems($response->Items);

        $searchResponse = new SearchResponse();
        $searchResponse->setObjects($objects);
        $searchResponse->setMoreResults($response->MoreResults);

        return $searchResponse;
    }

    /**
     * Parse JSON to object items.
     *
     * @param array $items
     *
     * @return array
     */
    protected function parseItems(array $items)
    {
        $objects = [];

        foreach ($items as $item) {
            array_push(
                $objects,
                $this->parseItem($item)
            );
        }

        return $objects;
    }

    /**
     * Parse object item JSON to object item.
     *
     * @param \stdClass $item
     *
     * @return MFilesSearch
     */
    protected function parseItem(\stdClass $item)
    {
        $object = new MFilesSearch();

        $object->setTitle($item->Title);
        $object->setEscapedTitleWithId($item->EscapedTitleWithID);
        $object->setDisplayId(intval($item->DisplayID));
        $object->setClass($item->Class);
        $object->setCheckedOutAtUTC(new \DateTime($item->CheckedOutAtUtc));
        $object->setCheckedOutAt(new \DateTime($item->CheckedOutAt));
        $object->setLastModifiedUTC(new \DateTime($item->LastModifiedUtc));
        $object->setLastModified(new \DateTime($item->LastModified));
        $object->setObjectCheckedOut($item->ObjectCheckedOut);
        $object->setObjectCheckedOutToThisUser($item->ObjectCheckedOutToThisUser);
        $object->setCreatedUTC(new \DateTime($item->CreatedUtc));
        $object->setCreated(new \DateTime($item->Created));
        $object->setVisibleAfterOperation($item->VisibleAfterOperation);
        $object->setPathInIdView($item->PathInIDView);
        $object->setLastModifiedDisplayValue(new \DateTime($item->LastModifiedDisplayValue));
        $object->setCheckedOutAtDisplayValue(new \DateTime($item->CheckedOutAtDisplayValue));
        $object->setCreatedDisplayValue(new \DateTime($item->CreatedDisplayValue));
        $object->setObjectVersionFlags($item->ObjectVersionFlags);
        $object->setScore($item->Score);
        $object->setLastAccessedByMe(new \DateTime($item->LastAccessedByMe));
        $object->setAccessedByMeUTC(new \DateTime($item->AccessedByMeUtc));
        $object->setAccessedByMe(new \DateTime($item->AccessedByMe));
        $object->setObjectGUID($item->ObjectGUID);
        $object->setCheckedOutTo($item->CheckedOutTo);
        $object->setSingleFile($item->SingleFile);
        $object->setThisVersionLatestToThisUser($item->ThisVersionLatestToThisUser);

        $object->setObjVer(
            $this->parseObjVer($item->ObjVer)
        );
        $object->setFiles(
            $this->parseFiles($item->Files)
        );

        return $object;
    }

    /**
     * Parse Files JSON to object items.
     *
     * @param array $files
     *
     * @return array
     */
    protected function parseFiles(array $files)
    {
        $newFiles = [];
        foreach ($files as $file) {
            array_push(
                $newFiles,
                $this->parseFile($file)
            );
        }

        return $newFiles;
    }

    /**
     * Parse File JSON to object item.
     *
     * @param \stdClass $item
     *
     * @return MFilesFile
     */
    protected function parseFile(\stdClass $item)
    {
        $object = new MFilesFile();

        $object->setId($item->ID);
        $object->setName($item->Name);
        $object->setEscapedName($item->EscapedName);
        $object->setExtension($item->Extension);
        $object->setSize($item->Size);
        $object->setLastModified(new \DateTime($item->LastModified));
        $object->setChangeTimeUTC(new \DateTime($item->ChangeTimeUtc));
        $object->setChangeTime(new \DateTime($item->ChangeTime));
        $object->setCreatedUTC(new \DateTime($item->CreatedUtc));
        $object->setCreatedDisplayValue(new \DateTime($item->CreatedDisplayValue));
        $object->setLastModifiedDisplayValue(new \DateTime($item->LastModifiedDisplayValue));
        $object->setFileGUID($item->FileGUID);
        $object->setVersion($item->Version);

        return $object;
    }

    /**
     * Parse ObjVer JSON to object item.
     *
     * @param \stdClass $item
     *
     * @return MFilesObjectVersion
     */
    protected function parseObjVer(\stdClass $item)
    {
        $object = new MFilesObjectVersion();

        $object->setVersion($item->Version);
        $object->setID($item->ID);
        $object->setType($item->Type);

        return $object;
    }
}
