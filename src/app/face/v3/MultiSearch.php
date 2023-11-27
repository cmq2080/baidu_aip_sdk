<?php

namespace cmq2080\baidu_aip\app\face\v3;

use cmq2080\baidu_aip\app\Driver;

class MultiSearch extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['image', 'image_type', 'group_id_list', 'max_face_num', 'match_threshold', 'quality_control', 'liveness_control', 'user_id', 'max_user_num'];
        $this->requiredKeys = ['image', 'image_type', 'group_id_list'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v3/multi-search';
    }
}
