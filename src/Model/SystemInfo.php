<?php

namespace DarthSoup\Rundeck\Model;

class SystemInfo extends AbstractModel
{
    public $rundeck;

    public $os;

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