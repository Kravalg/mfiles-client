<?php

namespace MFiles\Model\Error;

class MFilesError
{
    /** @var int */
    private $status;

    /** @var string */
    private $url;

    /** @var string */
    private $method;

    /** @var MFilesErrorException */
    private $exception;

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return MFilesErrorException
     */
    public function getException(): MFilesErrorException
    {
        return $this->exception;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param MFilesErrorException $exception
     */
    public function setException(MFilesErrorException $exception): void
    {
        $this->exception = $exception;
    }
}
