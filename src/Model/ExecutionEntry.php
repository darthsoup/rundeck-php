<?php

namespace DarthSoup\Rundeck\Model;

use DateTime;

/**
 * Class ExecutionEntry
 */
class ExecutionEntry extends AbstractModel
{
   /**
    * @var string
    */
   public $time;

   /**
    * @var DateTime
    */
   public $absolute_time;

   /**
    * @var string
    */
   public $log;

   /**
    * @var string
    */
   public $level;
   
   /**
    * @var string
    */
   public $type;

   /**
    * @var string
    */
   public $user;

   /**
    * @var integer
    */
   public $step;

   /**
    * @var integer
    */
   public $stepctx;

   /**
    * @var string
    */
   public $node;

   /**
    * @param array $parameters
    */
   public function build(array $parameters)
   {
      parent::build($parameters);

      foreach ($parameters as $property => $value) {
         if ('absolute_time' === $property && is_string($value)) {
            $this->absolute_time = self::atomToDateTime($value);
         }
      }
   }
}
