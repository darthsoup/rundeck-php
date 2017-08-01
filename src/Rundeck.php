<?php

namespace DarthSoup\Rundeck;

use DarthSoup\Rundeck\Adapter\AdapterInterface;
use DarthSoup\Rundeck\Api\Execution;
use DarthSoup\Rundeck\Api\Job;
use DarthSoup\Rundeck\Api\Project;
use DarthSoup\Rundeck\Api\System;

/**
 * Rundeck API Manager
 */
class Rundeck
{
    /**
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * @var string
     */
    protected $api;

    /**
     * @param AdapterInterface $adapter
     * @param string $api
     */
    public function __construct(AdapterInterface $adapter, string $api)
    {
        $this->adapter = $adapter;
        $this->api = $api;
    }

    /**
     * @return System
     */
    public function system()
    {
        return new System($this->adapter, $this->api);
    }

    /**
     * @return Job
     */
    public function job()
    {
        return new Job($this->adapter, $this->api);
    }

    /**
     * @return Execution
     */
    public function execution()
    {
        return new Execution($this->adapter, $this->api);
    }

    /*
     * @return Project
     */
    public function project()
    {
        return new Project($this->adapter, $this->api);
    }
}
