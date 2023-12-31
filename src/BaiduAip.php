<?php

namespace cmq2080\baidu_aip;

use cmq2080\baidu_aip\interfaces\IDriver;
use cmq2080\baidu_aip\traits\TData;
use cmq2080\curl_spear\Client;
use cmq2080\curl_spear\lib\Request;

class BaiduAip
{
    use TData;

    protected static $instance;

    protected IDriver $driver;

    protected $queryParamKeys;

    public static function instance($newInstance = false): BaiduAip
    {
        if ($newInstance) {
            return new static();
        }

        if (!isset(static::$instance) || static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    protected function __construct()
    {
        $this->allowedKeys = ['access_token'];
        $this->requiredKeys = ['access_token'];
        $this->queryParamKeys = ['access_token'];
    }

    public function load(IDriver $driver): BaiduAip
    {
        // 鉴权验证有白名单
        if ($driver instanceof \cmq2080\baidu_aip\app\OAuth) {
            $this->allowedKeys = [];
            $this->requiredKeys = [];
            $this->queryParamKeys = ['grant_type', 'client_id', 'client_secret'];
        } else {
            $this->allowedKeys = ['access_token'];
            $this->requiredKeys = ['access_token'];
            $this->queryParamKeys = ['access_token'];
        }

        $this->driver = $driver;
        return $this;
    }

    public function run()
    {
        $data = $this->getData();
        $driverData = $this->driver->getData();
        $data = array_merge($data, $driverData);

        $queryParams = $postData = [];
        foreach ($data as $key => $value) {
            // echo $key;
            if (in_array($key, $this->queryParamKeys)) {
                $queryParams[$key] = $value;
            } else {
                $postData[$key] = $value;
            }
        }

        $requestUrl = $this->driver->getRequestUrl();
        if ($queryParams) {
            $queryStr = http_build_query($queryParams);
            $requestUrl .= strpos($requestUrl, '?') === false ? '?' : '&';
            $requestUrl .= $queryStr;
        }

        $client = Client::instance();
        $client->setRequest((new Request()));
        $client->withJson()->post($requestUrl, $postData);
        $response = $client->getResponse();

        if (!$response->isSuccess()) {
            throw new \Exception('请求失败: ' . $response->getCode());
        }

        $result = $response->getJsonData();
        if ($result === null) {
            throw new \Exception('Content Is Not In JSON Format');
        }

        return $result;
    }
}
