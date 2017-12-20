<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * API Execution
 */
class Execution extends AbstractApi
{
    /**
     * Get the status for an execution by ID.
     * 
     * @link http://rundeck.org/docs/api/#execution-info
     * @param int $id Exection Id
     * @return ExecutionInfo
     */
    public function info(int $id)
    {
        $output = $this->adapter->get($this->api . '/execution/' . $id);

        $executionInfo = json_decode($output);

        return new Model\ExecutionInfo($executionInfo);
    }

    /**
     * Get the output for an execution by ID. The execution can be currently running or may have already completed. Output can be filtered down to a specific node or workflow step.
     * 
     * @link http://rundeck.org/docs/api/#execution-output
     * @param string $project Job UUID
     * @param mixed $node
     * @param mixed $stepctx
     * @return void
     */
    public function output(string $id, $node = null, $step = null, array $options = [])
    {
        if (!empty($node)) {
            if (!empty($stepctx)) {
                $apiurl = $this->api. '/execution/' . $id . '/output/node/' . $node . '/step/'. $stepctx;
            } else {
                $apiurl = $this->api. '/execution/' . $id . '/output/node/' . $node;
            }
        } else {
            if (!empty($stepctx)) {
                $apiurl = $this->api. '/execution/' . $id . '/output/step/'. $stepctx;
            } else {
                // default
                $apiurl = $this->api. '/execution/' . $id . '/output';
            }
        }

        $output = $this->adapter->get($apiurl, $options);
       
        $executionOutput = json_decode($output);

        return new Model\ExecutionOutput($executionOutput);
    }
}
