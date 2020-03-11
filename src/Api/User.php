<?php

namespace DarthSoup\Rundeck\Api;

use DarthSoup\Rundeck\Model;

/**
 * User Profile
 *
 * Min API Level 21
 */
class User extends AbstractApi
{
    /**
     * Get a list of all the users.
     *
     * @link http://rundeck.org/docs/api/#list-users
     * @return User[]
     */
    public function getUsers()
    {
        $output = $this->adapter->get($this->api . '/user/list');

        $users = json_decode($output, true);

        return array_map(function ($users) {
            return new Model\User($users);
        }, $users);
    }

    /**
     * Get current user profile data or a another profile.
     *
     * @link http://rundeck.org/docs/api/#get-user-profile
     * @link http://rundeck.org/docs/api/#get-another-user-profile
     * @param string $user
     * @return User
     */
    public function getUser(string $user = null)
    {
        if (null !== $user) {
            $apiurl = $this->api . '/user/info/' . $user;
        } else {
            $apiurl = $this->api . '/user/info';
        }

        $output = $this->adapter->get($apiurl);

        $user = json_decode($output, true);

        return new Model\User($user);
    }

    /**
     * Modify same user profile data or a another profile.
     *
     * @link http://rundeck.org/docs/api/#modify-user-profile
     * @link http://rundeck.org/docs/api/#modify-another-user-profile
     * @param string $user
     * @param array $options
     * @return User
     */
    public function modifyUser(string $user = null, array $options = null)
    {
        if (null !== $user) {
            $apiurl = $this->api . '/user/info/' . $user;
        } else {
            $apiurl = $this->api . '/user/info';
        }

        $output = $this->adapter->post($apiurl, $options);

        $user = json_decode($output, true);

        return new Model\User($user);
    }
}
