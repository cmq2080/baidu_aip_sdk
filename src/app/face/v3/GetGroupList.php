<?php

namespace cmq2080\baidu_aip\app\face\v3;

use cmq2080\baidu_aip\app\Driver;

class GetGroupList extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['start', 'length'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v3/faceset/group/getlist';
    }
}
