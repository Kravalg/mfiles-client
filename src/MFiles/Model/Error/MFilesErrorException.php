<?php

namespace MFiles\Model\Error;

class MFilesErrorException
{
    /** @var string */
    private $name;

    /** @var string */
    private $message;

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
