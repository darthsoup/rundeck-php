<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Adapter\AdapterInterface;

abstract class AbstractApi
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
}