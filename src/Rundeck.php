<?php

namespace DarthSoup\Rundeck;

use DarthSoup\Rundeck\Adapter\AdapterInterface;
use DarthSoup\Rundeck\Api\Execution;
use DarthSoup\Rundeck\Api\Job;
use DarthSoup\Rundeck\Api\Project;
use DarthSoup\Rundeck\Api\System;
use DarthSoup\Rundeck\Api\User;
use DarthSoup\Rundeck\Api\LogStorage;

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
    public function system(): System
    {
        return new System($this->adapter, $this->api);
    }

    /**
     * @return Job
     */
    public function job(): Job
    {
        return new Job($this->adapter, $this->api);
    }

    /**
     * @return Execution
     */
    public function execution(): Execution
    {
        return new Execution($this->adapter, $this->api);
    }

    /*
     * @return Project
     */
    public function project(): Project
    {
        return new Project($this->adapter, $this->api);
    }

    /*
     * @return User
     */
    public function user(): User
    {
        return new User($this->adapter, $this->api);
    }

    /*
     * @return LogStorage
     */
    public function logstorage(): LogStorage
    {
        return new LogStorage($this->adapter, $this->api);
    }
}
