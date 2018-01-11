<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * API Execution
 */
class Execution extends AbstractApi
{
    /**
     * Get the list of executions for a Job.
     *
     * @link http://rundeck.org/docs/api/#getting-executions-for-a-job
     * @param string $id Job UUID
     * @param array $options Query Options
     * @return stdClass
     */
    public function get(string $id, array $options = [])
    {
        $output = $this->adapter->get($this->api . '/job/' . $id . '/executions', $options);

        $output = json_decode($output);

        $paging = $output->paging;
        $executions = array_map(function ($output) {
            return new Model\ExecutionInfo($output);
        }, $output->executions);

        $obj = new \stdClass();
        $obj->paging = $paging;
        $obj->executions = $executions;

        return $obj;
    }

    /**
     * List the currently running executions for a project
     *
     * @link http://rundeck.org/docs/api/#listing-running-executions
     * @param string $project Project Name
     * @param array $options Query Options
     * @return stdClass
     */
    public function getRunning(string $project, array $options = [])
    {        
        $output = $this->adapter->get($this->api. '/project/' . $project . '/executions/running');

        $output = json_decode($output);

        $paging = $output->paging;
        $executions = array_map(function ($output) {
            return new Model\ExecutionInfo($output);
        }, $output->executions);

        $obj = new \stdClass();
        $obj->paging = $paging;
        $obj->executions = $executions;

        return $obj;
    }

    /**
     * Get the status for an execution by ID.
     * 
     * @link http://rundeck.org/docs/api/#execution-info
     * @param int $id Execution Id
     * @return Model\ExecutionInfo
     */
    public function info(int $id)
    {
        $output = $this->adapter->get($this->api . '/execution/' . $id);

        $executionInfo = json_decode($output);

        return new Model\ExecutionInfo($executionInfo);
    }

    /**
     * Get the output for an execution by ID. The execution can be currently running or may have already completed. 
     * Output can be filtered down to a specific node or workflow step.
     * 
     * @link http://rundeck.org/docs/api/#execution-output
     * @param string $id Execution Id
     * @param mixed $node
     * @param mixed $stepctx
     * @return Model\ExecutionOutput
     */
    public function output(string $id, $node = null, $step = null, array $options = [])
    {
        if (!empty($node)) {
            if (!empty($stepctx)) {
                $apiurl = $this->api . '/execution/' . $id . '/output/node/' . $node . '/step/' . $stepctx;
            } else {
                $apiurl = $this->api . '/execution/' . $id . '/output/node/' . $node;
            }
        } else {
            if (!empty($stepctx)) {
                $apiurl = $this->api . '/execution/' . $id . '/output/step/' . $stepctx;
            } else {
                // default
                $apiurl = $this->api . '/execution/' . $id . '/output';
            }
        }

        $output = $this->adapter->get($apiurl, $options);

        $executionOutput = json_decode($output);

        return new Model\ExecutionOutput($executionOutput);
    }

    /**
     * Get the metadata associated with workflow step state changes along with the log output, optionally excluding log output.
     * 
     * @link http://rundeck.org/docs/api/#execution-output-with-state
     * @param string $id Execution Id
     * @param array $options Query Options
     * @return Model\ExecutionOutput
     */
    public function outputState(string $id, array $options = [])
    {
        $output = $this->adapter->get($this->api . '/execution/' . $id . '/output/state', $options);

        $executionOutput = json_decode($output);

        return new Model\ExecutionOutput($executionOutput);
    }

    /**
     * Abort a running execution by ID.
     * 
     * @link http://rundeck.org/docs/api/#aborting-executions
     * @param string $id Execution Id
     * @return Model\ExecutionOutput
     */
    public function abort(string $id, string $asUser = null)
    {
        $options = [];
        if (!empty($asUser)) {
            $options['asUser'] = $asUser;
        }

        $output = $this->adapter->get($this->api . '/execution/' . $id . '/abort', $options);

        $executionAbort = json_decode($output);

        return new Model\ExecutionAbort($executionAbort);
    }
}
