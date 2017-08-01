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
        $executioninfo = $this->adapter->get($this->api . '/execution/' . $id);

        $executioninfo = json_decode($executioninfo);

        return new ExecutionInfo($executioninfo);
    }
}
