<?php

namespace cmq2080\baidu_aip\app;

class DriverLoader
{
    public static function load($appClassName, $version)
    {
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

    protected static function getNamespace()
    {
        $className = static::class;

        $arrs = explode('\\', $className);

        if (count($arrs) > 1) {
            array_pop($arrs);
        }

        $namespace = implode('\\', $arrs);

        return $namespace;
    }
}
