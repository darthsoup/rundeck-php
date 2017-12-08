<?php

namespace DarthSoup\Rundeck\Model;

/**
 * Model User
 */
class User extends AbstractModel
{
    /**
     * @var string
     */
    public $login;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $email;
}
