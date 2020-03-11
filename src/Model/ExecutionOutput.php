<?php

namespace DarthSoup\Rundeck\Model;

use DateTime;

/**
 * Class ExecutionOutput
 */
class ExecutionOutput extends AbstractModel
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $offset;

    /**
     * @var boolean
     */
    public $completed;

    /**
     * @var boolean
     */
    public $execCompleted;

    /**
     * @var boolean
     */
    public $hasFailedNodes;

    /**
     * @var string
     */
    public $execState;

    /**
     * @var integer
     */
    public $lastModified;

    /**
     * @var integer
     */
    public $execDuration;

    /**
     * @var float
     */
    public $percentLoaded;

    /**
     * @var integer
     */
    public $totalSize;

    /**
     * @var integer
     */
    public $retryBackoff;

    /**
     * @var boolean
     */
    public $clusterExec;

    /**
     * @var boolean
     */
    public $compacted;

    /**
     * @var Entry[]
     */
    public $entries;

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        parent::build($parameters);

        foreach ($parameters as $property => $value) {
            if ('entries' === $property) {
                $entries = [];

                foreach ($value as $entry) {
                    if (is_object($entry)) {
                        $entries[] = new ExecutionEntry($entry);
                    } else {
                        $entries[] = $entry;
                    }
                }

                $this->entries = $entries;
            }
        }
    }
}
