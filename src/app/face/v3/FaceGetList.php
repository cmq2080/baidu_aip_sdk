<?php

namespace cmq2080\baidu_aip\app\face\v3;

use cmq2080\baidu_aip\app\Driver;

class FaceGetList extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['user_id', 'group_id'];
        $this->requiredKeys = ['user_id', 'group_id'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/face/getlist';
    }
}
