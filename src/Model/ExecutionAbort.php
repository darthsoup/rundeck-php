<?php

namespace DarthSoup\Rundeck\Model;

use DateTime;

/**
 * Class ExecutionAbort
 */
class ExecutionAbort extends AbstractModel
{
    /**
     * @var \stdClass
     */
    public $abort;

    /**
     * @var \stdClass
     */
    public $execution;

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        $this->abort = (object) $parameters['abort'];
        $this->execution = (object) $parameters['execution'];
    }
}
