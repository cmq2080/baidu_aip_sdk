<?php

namespace cmq2080\baidu_aip\app\face\v3;

use cmq2080\baidu_aip\app\Driver;

class UserDelete extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['log_id', 'group_id', 'user_id', 'face_token'];
        $this->requiredKeys = ['log_id', 'group_id', 'user_id', 'face_token'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/user/delete';
    }
}
