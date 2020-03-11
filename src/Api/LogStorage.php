<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * Api LogStorage
 *
 * Min API Level 17
 */
class LogStorage extends AbstractApi
{
    /**
     * Get Log Storage information and stats.
     *
     * @link http://rundeck.org/docs/api/#log-storage-info
     * @return LogStorage
     */
    public function get()
    {
        $output = $this->adapter->get($this->api . '/system/logstorage');

        $logstorage = json_decode($output, true);

        return new Model\LogStorage($logstorage);
    }
}
