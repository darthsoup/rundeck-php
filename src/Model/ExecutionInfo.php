<?php

namespace DarthSoup\Rundeck\Model;

use DateTime;

/**
 * Class ExecutionInfo
 */
class ExecutionInfo extends AbstractModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $permalink;

    /**
     * @var status
     */
    public $status;

    /**
     * @var status
     */
    public $customStatus;

    /**
     * @var string
     */
    public $project;

    /**
     * @var string
     */
    public $user;

    /**
     * @var DateTime
     */
    public $date_started;

    /**
     * @var DateTime
     */
    public $date_ended;

    /**
     * @var JobMetadata
     */
    public $job;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $argstring;

    /**
     * @var string[]
     */
    public $successfulNodes;

    /**
     * @var string[]
     */
    public $failedNodes;
    
    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        parent::build($parameters);

        foreach ($parameters as $property => $value) {
            if ('date-started' === $property && is_object($value)) {
                $this->date_started = self::timestampToDateTime($value->unixtime);
            }
            if ('date-ended' === $property && is_object($value)) {
                $this->date_ended = self::timestampToDateTime($value->unixtime);
            }
            if ('job' === $property && is_object($value)) {
                $this->job = new JobMetadata($value);
            }
        }
    }
}
