<?php

namespace DarthSoup\Rundeck\Model;

class SystemInfoStats extends AbstractModel
{
    public $uptime;

    public $cpu;

    public $memory;

    public $scheduler;

    public $threads;

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        parent::build($parameters);

        foreach ($parameters as $property => $value) {
            if (isset($this->$property)) {
                $this->$property = (array)$value;
            }
        }
    }
}