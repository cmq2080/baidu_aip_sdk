<?php

namespace cmq2080\baidu_aip\app\face\v4;

use cmq2080\baidu_aip\app\Driver;

class FaceVerify extends Driver
{
    public function __construct()
    {
        $this->allowedKeys = ['sdk_version', 'face_field', 'option', 'app', 's_key', 'device_id', 'data', 'image_list'];
        $this->requiredKeys = ['sdk_version'];
    }

    public function getRequestUrl(): string
    {
        return 'https://aip.baidubce.com/rest/2.0/face/v4/faceverify';
    }

    public function getData($key = null, $default = null)
    {
        $data = parent::getData($key, $default);
        $sdkVersion = intval($data['sdk_version']);
        if ($sdkVersion >= 5.2) {
            $requireKeys = [
                'app',
                's_key',
                'device_id',
                'data',
            ];
        } else {
            $requireKeys = [
                'image_list',
            ];
        }

        foreach ($requireKeys as $key) {
            if (!isset($data[$key])) {
                throw new \Exception('Attribute Required: ' . $key);
            }
        }

        return $data;
    }
}
