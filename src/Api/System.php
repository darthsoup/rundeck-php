<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model\SystemInfo;

/**
 * API System
 */
class System extends AbstractApi
{
    /**
     * @return SystemInfo
     */
    public function info()
    {
        $system_info = $this->adapter->get($this->api . '/system/info');

        $system_info = json_decode($system_info);

        return new SystemInfo($system_info->system);
    }
}