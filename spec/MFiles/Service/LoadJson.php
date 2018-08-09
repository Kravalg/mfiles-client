<?php

namespace spec\MFiles\Service;

class LoadJson
{
    /**
     * Load a Json file and convert it to a stdClass.
     *
     * @param string $path
     *
     * @return \stdClass
     */
    public static function fromFile(string $path)
    {
        return json_decode(file_get_contents($path));
    }
}
