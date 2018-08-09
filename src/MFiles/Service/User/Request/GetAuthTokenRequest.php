<?php

namespace MFiles\Service\User\Request;

use MFiles\Service\MFilesRequestInterface;

class GetAuthTokenRequest implements MFilesRequestInterface
{
    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $vaultGuid;

    /**
     * Authentication constructor.
     *
     * @param string $username
     * @param string $password
     * @param string $vaultGuid
     */
    public function __construct(
        string $username,
        string $password,
        string $vaultGuid
    ) {
        $this->username  = $username;
        $this->password  = $password;
        $this->vaultGuid = $vaultGuid;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getVaultGuid(): string
    {
        return $this->vaultGuid;
    }

    /**
     * @param string $vaultGuid
     */
    public function setVaultGuid(string $vaultGuid)
    {
        $this->vaultGuid = $vaultGuid;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }
}
