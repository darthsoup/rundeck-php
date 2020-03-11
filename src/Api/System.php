<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model\SystemInfo;

/**
 * API System
 */
class System extends AbstractApi
{
    /**
     * Get Rundeck server information and stats.
     *
     * @link http://rundeck.org/docs/api/#system-info
     * @return SystemInfo
     */
    public function info()
    {
        $output = $this->adapter->get($this->api . '/system/info');

        $system_info = json_decode($output, true);

        return new SystemInfo($system_info->system);
    }
}
