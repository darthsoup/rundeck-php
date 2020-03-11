<?php

namespace DarthSoup\Rundeck\Model;

/**
 * AbstractModel
 */
abstract class AbstractModel
{
    /**
     * @param \stdClass|array|null $parameters
     */
    public function __construct($parameters = null)
    {
        if (!$parameters) {
            return;
        }
        if ($parameters instanceof \stdClass) {
            $parameters = get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    /**
     * @param array $parameters
     */
    public function build(array $parameters)
    {
        foreach ($parameters as $property => $value) {
            $property = static::camelCase($property);
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    /**
     * @param string $str
     * @return string Camelcase string
     */
    protected static function camelCase($str): string
    {
        return lcfirst(preg_replace_callback('/(^|_)([a-z])/', function ($match) {
            return strtoupper($match[2]);
        }, $str));
    }

    /**
     * @param $timestamp
     * @return \DateTime
     * @throws \Exception
     */
    protected static function timestampToDateTime($timestamp): \DateTime
    {
        // Rundeck use Java Timestamp which includes unixtimestamps with milliseconds
        $timestamp = (int)($timestamp / 1000);

        return (new \DateTime())->setTimestamp($timestamp);
    }

    /**
     * @param string $date
     * @return \DateTime
     */
    protected static function atomToDateTime(string $date): \DateTime
    {
        return \DateTime::createFromFormat(\DateTime::ATOM, $date);
    }
}
