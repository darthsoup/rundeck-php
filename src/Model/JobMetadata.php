<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model JobMetadata
 */
class JobMetadata extends Job
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var int
     */
    public $averageDuration;

    /**
     * @var string
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
     * @var int
     */
    public $serverOwner;

    /**
     * @var array
     */
    public $options;

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        parent::build($parameters);

        foreach ($parameters as $property => $value) {
            if ('options' === $property && is_object($value)) {
                $this->options = (array)$value;
            }
        }
    }
}
