<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model SystemInfoRundeck
 */
class SystemInfoRundeck extends AbstractModel
{
    /**
     * @var string
     */
    public $rundeck;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $build;

    /**
     * @var string
     */
    public $node;

    /**
     * @var string
     */
    public $base;

    /**
     * @var string
     */
    public $apiversion;

    /**
     * @var string
     */
    public $serverUUID;
}
