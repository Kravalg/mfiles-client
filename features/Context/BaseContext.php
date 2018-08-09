<?php

namespace Context;

use Behat\Behat\Context\Context;
use Context\Helper\MFilesHelper;

abstract class BaseContext implements Context
{
    /** @var MFilesHelper */
    protected $helper;

    /**
     * BaseContext constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->helper = new MFilesHelper();
    }
}
