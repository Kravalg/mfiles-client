<?php

namespace MFiles\Service\User\Response;

use MFiles\Service\Response\BaseResponse;

class GetAuthTokenResponse extends BaseResponse
{
    /** @var string */
    private $value;

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }
}
