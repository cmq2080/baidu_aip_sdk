<?php

namespace cmq2080\baidu_aip\app\face\v3;

use cmq2080\baidu_aip\app\Driver;

class UserAdd extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['image', 'image_type', 'group_id', 'user_id', 'user_info', 'quality_control', 'liveness_control', 'action_type'];
        $this->requiredKeys = ['image', 'image_type', 'group_id', 'user_id'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/add';
    }
}
