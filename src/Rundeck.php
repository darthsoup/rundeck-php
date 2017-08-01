<?php

namespace DarthSoup\Rundeck;

use DarthSoup\Rundeck\Adapter\AdapterInterface;
use DarthSoup\Rundeck\Api\System;

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
}
