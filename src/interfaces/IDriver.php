<?php

namespace cmq2080\baidu_aip\interfaces;

interface IDriver
{
    public function setData(string $key, $value);

    public function getData($key = null, $default = null);

    public function getRequestUrl(): string;
}
