<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model SystemInfo
 */
class SystemInfo extends AbstractModel
{
    /**
     * @var SystemInfoRundeck
     */
    public $rundeck;

    /**
     * @var SystemInfoOs
     */
    public $os;

    /**
     * @var SystemInfoStats
     */
    public $stats;

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        parent::build($parameters);

        foreach ($parameters as $property => $value) {
            if ('rundeck' === $property && is_object($value)) {
                $this->rundeck = new SystemInfoRundeck($value);
            }
            if ('os' === $property && is_object($value)) {
                $this->os = new SystemInfoOs($value);
            }
            if ('stats' === $property && is_object($value)) {
                $this->stats = new SystemInfoStats($value);
            }
        }
    }
}
