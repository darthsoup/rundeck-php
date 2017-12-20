<?php

namespace DarthSoup\Rundeck\Adapter;

/**
 * AdapterInterface
 */
interface AdapterInterface
{
    /**
     * @param string $url
     * @return mixed
     */
    public function get(string $url, array $query = []);

    /**
     * @param string $url
     * @return mixed
     */
    public function post(string $url, array $content = []);
}