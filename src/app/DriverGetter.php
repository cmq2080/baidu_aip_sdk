<?php

namespace cmq2080\baidu_aip\app;

class DriverGetter
{
    public static function getDriver($appClassName, $version): Driver
    {
        $appClassName = static::getAppClassName($appClassName);
        $namespace = static::getNamespace();

        $driver = $namespace;
        if ($version) {
            $driver .= '\\' . $version;
        }
        $driver .= '\\' . $appClassName;

        if (!class_exists($driver)) {
            throw new \Exception('Driver Not Found: ' . $driver);
        }

        $instance = $driver::create();

        return $instance;
    }

    protected static function getAppClassName($appClassName)
    {
        $appClassName = str_replace('_', '-', $appClassName);
        $array = explode('-', $appClassName);
        $array = array_map(function ($row) {
            return ucfirst($row);
        }, $array);

        $appClassName = implode('', $array);
        return $appClassName;
    }

    protected static function getNamespace()
    {
        $className = static::class;

        $array = explode('\\', $className);

        if (count($array) > 1) {
            array_pop($array);
        }

        $namespace = implode('\\', $array);

        return $namespace;
    }
}
