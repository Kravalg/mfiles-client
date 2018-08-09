<?php

namespace MFiles\Service\Object\Parser;

use MFiles\Model\MFilesFile;
use MFiles\Model\Object\MFilesObject;
use MFiles\Model\Object\MFilesObjVer;

class ObjectParser
{
    /**
     * Parse object item JSON to object item.
     *
     * @param \stdClass $item
     *
     * @return MFilesObject
     */
    public function parse(\stdClass $item)
    {
        $object = new MFilesObject();

        $object->setTitle($item->Title);
        $object->setEscapedTitleWithId($item->EscapedTitleWithID);
        $object->setDisplayId($item->DisplayID);
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
     * @return MFilesObjVer
     */
    protected function parseObjVer(\stdClass $item)
    {
        $object = new MFilesObjVer();

        $object->setVersion($item->Version);
        $object->setID($item->ID);
        $object->setType($item->Type);

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
}
