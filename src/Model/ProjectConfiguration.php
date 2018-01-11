<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model ProjectConfiguration
 */
class ProjectConfiguration extends AbstractModel
{
    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        foreach ($parameters as $property => $value) {
            if (is_numeric($value)) {
                $value = (int) $value;
            }
            $this->$property = $value;
        }
    }
}
