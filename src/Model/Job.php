<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model Job
 */
class Job extends AbstractModel
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var boolean
     */
    public $scheduled;

    /**
     * @var boolean
     */
    public $scheduleEnabled;

    /**
     * @var boolean
     */
    public $href;

    /**
     * @var boolean
     */
    public $enabled;

    /**
     * @var string
     */
    public $permalink;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $group;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $project;

    /**
     * @var string
     */
    public $serverNodeUUID;

    /**
     * @var boolean
     */
    public $serverOwner;

}
