<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model\ExecutionInfo;

/**
 * API Execution
 */
class Execution extends AbstractApi
{
    /**
     * @param int $id
     * @return ExecutionInfo
     */
    public function info(int $id)
    {
        $output = $this->adapter->get($this->api . '/execution/' . $id);

        $executionInfo = json_decode($output);

        return new ExecutionInfo($executionInfo);
    }
}
