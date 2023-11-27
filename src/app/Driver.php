<?php

namespace cmq2080\baidu_aip\app;

use cmq2080\baidu_aip\interfaces\IDriver;
use cmq2080\baidu_aip\traits\TData;

abstract class Driver implements IDriver
{
    use TData;

    protected $queryParamKeys = [];

    public static function create()
    {
        return new static();
    }

    abstract public function getRequestUrl(): string;
}
