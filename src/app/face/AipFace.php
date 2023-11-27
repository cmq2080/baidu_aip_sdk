<?php

namespace cmq2080\baidu_aip\app\face;

use cmq2080\baidu_aip\app\Driver;
use cmq2080\baidu_aip\app\DriverGetter;

class AipFace extends DriverGetter
{
    // quality_control
    const QUALITY_CONTROL_NONE   = 'NONE';
    const QUALITY_CONTROL_LOW    = 'LOW';
    const QUALITY_CONTROL_NORMAL = 'NORMAL';
    const QUALITY_CONTROL_HIGH   = 'HIGH';

    // liveness_control
    const LIVENESS_CONTROL_NONE   = 'NONE';
    const LIVENESS_CONTROL_LOW    = 'LOW';
    const LIVENESS_CONTROL_NORMAL = 'NORMAL';
    const LIVENESS_CONTROL_HIGH   = 'HIGH';

    // action_type
    const ACTION_TYPE_APPEND = 'APPEND';
    const ACTION_TYPE_REPLACE = 'REPLACE';
    const ACTION_TYPE_UPDATE = 'UPDATE';

    // image_type
    const IMAGE_TYPE_BASE64 = 'BASE64';
    const IMAGE_TYPE_URL = 'URL';
    const IMAGE_TYPE_FACE_TOKEN = 'FACE_TOKEN';

    // face_type
    const FACE_TYPE_LIVE = 'LIVE';
    const FACE_TYPE_IDCARD = 'IDCARD';
    const FACE_TYPE_WATERMARK = 'WATERMARK';
    const FACE_TYPE_CERT = 'CERT';

    public static function getDriver($appClassName, $version = 'v3'): Driver
    {
        return parent::getDriver($appClassName, $version);
    }
}
