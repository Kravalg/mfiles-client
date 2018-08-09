<?php

namespace MFiles\Model\Search;

class MFilesSearch
{
    /** @var string */
    private $title;

    /** @var int */
    private $displayId;

    /** @var int */
    private $class;

    /** @var \DateTimeInterface */
    private $lastModified;

    /** @var \DateTimeInterface */
    private $lastModifiedUTC;

    /** @var bool */
    private $singleFile;

    /** @var \DateTimeInterface */
    private $created;

    /** @var \DateTimeInterface */
    private $createdUTC;

    /** @var string */
    private $escapedTitleWithId;

    /** @var \DateTimeInterface */
    private $checkedOutAtUTC;

    /** @var \DateTimeInterface */
    private $checkedOutAt;

    /** @var bool */
    private $objectCheckedOut;

    /** @var bool */
    private $objectCheckedOutToThisUser;

    /** @var int */
    private $checkedOutTo;

    /** @var bool */
    private $thisVersionLatestToThisUser;

    /** @var bool */
    private $visibleAfterOperation;

    /** @var string */
    private $pathInIdView;

    /** @var \DateTimeInterface */
    private $lastModifiedDisplayValue;

    /** @var \DateTimeInterface */
    private $checkedOutAtDisplayValue;

    /** @var \DateTimeInterface */
    private $createdDisplayValue;

    /** @var string */
    private $objectVersionFlags;

    /** @var int */
    private $score;

    /** @var \DateTimeInterface */
    private $lastAccessedByMe;

    /** @var \DateTimeInterface */
    private $accessedByMeUTC;

    /** @var \DateTimeInterface */
    private $accessedByMe;

    /** @var string */
    private $objectGUID;

    /** @var MFilesObjectVersion */
    private $objVer;

    /** @var MFilesFile[] */
    private $files = [];

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDisplayValue(): \DateTimeInterface
    {
        return $this->createdDisplayValue;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedUTC(): \DateTimeInterface
    {
        return $this->createdUTC;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastModified(): \DateTimeInterface
    {
        return $this->lastModified;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastModifiedDisplayValue(): \DateTimeInterface
    {
        return $this->lastModifiedDisplayValue;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAccessedByMe(): \DateTimeInterface
    {
        return $this->accessedByMe;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAccessedByMeUTC(): \DateTimeInterface
    {
        return $this->accessedByMeUTC;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCheckedOutAt(): \DateTimeInterface
    {
        return $this->checkedOutAt;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCheckedOutAtDisplayValue(): \DateTimeInterface
    {
        return $this->checkedOutAtDisplayValue;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCheckedOutAtUTC(): \DateTimeInterface
    {
        return $this->checkedOutAtUTC;
    }

    /**
     * @return int
     */
    public function getCheckedOutTo(): int
    {
        return $this->checkedOutTo;
    }

    /**
     * @return int
     */
    public function getClass(): int
    {
        return $this->class;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated(): \DateTimeInterface
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getDisplayId(): int
    {
        return $this->displayId;
    }

    /**
     * @return string
     */
    public function getEscapedTitleWithId(): string
    {
        return $this->escapedTitleWithId;
    }

    /**
     * @return MFilesFile[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastAccessedByMe(): \DateTimeInterface
    {
        return $this->lastAccessedByMe;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastModifiedUTC(): \DateTimeInterface
    {
        return $this->lastModifiedUTC;
    }

    /**
     * @return string
     */
    public function getObjectGUID(): string
    {
        return $this->objectGUID;
    }

    /**
     * @return string
     */
    public function getObjectVersionFlags(): string
    {
        return $this->objectVersionFlags;
    }

    /**
     * @return MFilesObjectVersion
     */
    public function getObjVer(): MFilesObjectVersion
    {
        return $this->objVer;
    }

    /**
     * @return string
     */
    public function getPathInIdView(): string
    {
        return $this->pathInIdView;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @return bool
     */
    public function getSingleFile(): bool
    {
        return $this->singleFile;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function getObjectCheckedOutToThisUser(): bool
    {
        return $this->objectCheckedOutToThisUser;
    }

    /**
     * @param \DateTimeInterface $createdDisplayValue
     */
    public function setCreatedDisplayValue(\DateTimeInterface $createdDisplayValue)
    {
        $this->createdDisplayValue = $createdDisplayValue;
    }

    /**
     * @param \DateTimeInterface $createdUTC
     */
    public function setCreatedUTC(\DateTimeInterface $createdUTC)
    {
        $this->createdUTC = $createdUTC;
    }

    /**
     * @param \DateTimeInterface $lastModified
     */
    public function setLastModified(\DateTimeInterface $lastModified)
    {
        $this->lastModified = $lastModified;
    }

    /**
     * @param \DateTimeInterface $lastModifiedDisplayValue
     */
    public function setLastModifiedDisplayValue(\DateTimeInterface $lastModifiedDisplayValue)
    {
        $this->lastModifiedDisplayValue = $lastModifiedDisplayValue;
    }

    /**
     * @param \DateTimeInterface $accessedByMe
     */
    public function setAccessedByMe(\DateTimeInterface $accessedByMe)
    {
        $this->accessedByMe = $accessedByMe;
    }

    /**
     * @param \DateTimeInterface $accessedByMeUTC
     */
    public function setAccessedByMeUTC(\DateTimeInterface $accessedByMeUTC)
    {
        $this->accessedByMeUTC = $accessedByMeUTC;
    }

    /**
     * @param \DateTimeInterface $checkedOutAt
     */
    public function setCheckedOutAt(\DateTimeInterface $checkedOutAt)
    {
        $this->checkedOutAt = $checkedOutAt;
    }

    /**
     * @param \DateTimeInterface $checkedOutAtDisplayValue
     */
    public function setCheckedOutAtDisplayValue(\DateTimeInterface $checkedOutAtDisplayValue)
    {
        $this->checkedOutAtDisplayValue = $checkedOutAtDisplayValue;
    }

    /**
     * @param \DateTimeInterface $checkedOutAtUTC
     */
    public function setCheckedOutAtUTC(\DateTimeInterface $checkedOutAtUTC)
    {
        $this->checkedOutAtUTC = $checkedOutAtUTC;
    }

    /**
     * @param int $checkedOutTo
     */
    public function setCheckedOutTo(int $checkedOutTo)
    {
        $this->checkedOutTo = $checkedOutTo;
    }

    /**
     * @param int $class
     */
    public function setClass(int $class)
    {
        $this->class = $class;
    }

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created)
    {
        $this->created = $created;
    }

    /**
     * @param int $displayId
     */
    public function setDisplayId(int $displayId)
    {
        $this->displayId = $displayId;
    }

    /**
     * @param string $escapedTitleWithId
     */
    public function setEscapedTitleWithId(string $escapedTitleWithId)
    {
        $this->escapedTitleWithId = $escapedTitleWithId;
    }

    /**
     * @param MFilesFile[] $files
     */
    public function setFiles(array $files)
    {
        $this->files = $files;
    }

    /**
     * @param \DateTimeInterface $lastAccessedByMe
     */
    public function setLastAccessedByMe(\DateTimeInterface $lastAccessedByMe)
    {
        $this->lastAccessedByMe = $lastAccessedByMe;
    }

    /**
     * @param \DateTimeInterface $lastModifiedUTC
     */
    public function setLastModifiedUTC(\DateTimeInterface $lastModifiedUTC)
    {
        $this->lastModifiedUTC = $lastModifiedUTC;
    }

    /**
     * @param bool $objectCheckedOut
     */
    public function setObjectCheckedOut(bool $objectCheckedOut)
    {
        $this->objectCheckedOut = $objectCheckedOut;
    }

    /**
     * @param bool $objectCheckedOutToThisUser
     */
    public function setObjectCheckedOutToThisUser(bool $objectCheckedOutToThisUser)
    {
        $this->objectCheckedOutToThisUser = $objectCheckedOutToThisUser;
    }

    /**
     * @param string $objectGUID
     */
    public function setObjectGUID(string $objectGUID)
    {
        $this->objectGUID = $objectGUID;
    }

    /**
     * @param string $objectVersionFlags
     */
    public function setObjectVersionFlags(string $objectVersionFlags)
    {
        $this->objectVersionFlags = $objectVersionFlags;
    }

    /**
     * @param MFilesObjectVersion $objVer
     */
    public function setObjVer(MFilesObjectVersion $objVer)
    {
        $this->objVer = $objVer;
    }

    /**
     * @param string $pathInIdView
     */
    public function setPathInIdView(string $pathInIdView)
    {
        $this->pathInIdView = $pathInIdView;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score)
    {
        $this->score = $score;
    }

    /**
     * @param bool $singleFile
     */
    public function setSingleFile(bool $singleFile)
    {
        $this->singleFile = $singleFile;
    }

    /**
     * @param bool $thisVersionLatestToThisUser
     */
    public function setThisVersionLatestToThisUser(bool $thisVersionLatestToThisUser)
    {
        $this->thisVersionLatestToThisUser = $thisVersionLatestToThisUser;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param bool $visibleAfterOperation
     */
    public function setVisibleAfterOperation(bool $visibleAfterOperation)
    {
        $this->visibleAfterOperation = $visibleAfterOperation;
    }
}
