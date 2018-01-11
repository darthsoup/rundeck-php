<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model LogStorage
 */
class LogStorage extends AbstractModel
{
    /**
     * @var boolean
     */
    public $enabled;

    /**
     * @var string
     */
    public $pluginName;

    /**
     * @var integer
     */
    public $succeededCount;

    /**
     * @var integer
     */

    public $failedCount;
   
    /**
     * @var integer
     */
    public $queuedCount;

    /**
     * @var integer
     */
    public $totalCount;

    /**
     * @var integer
     */
    public $incompleteCount;

    /**
     * @var integer
     */
    public $missingCount;
}
