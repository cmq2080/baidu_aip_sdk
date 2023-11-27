<?php

namespace cmq2080\baidu_aip\app;

use cmq2080\baidu_aip\app\Driver;

class OAuth extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['grant_type', 'client_id', 'client_secret'];
        $this->requiredKeys = ['grant_type', 'client_id', 'client_secret'];
        $this->setData('grant_type', 'client_credentials');
    }

    public function getRequestUrl(): string
    {
        return "https://aip.baidubce.com/oauth/2.0/token";
    }
}
