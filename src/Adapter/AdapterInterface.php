<?php

namespace DarthSoup\Rundeck\Adapter;

/**
 * AdapterInterface
 */
interface AdapterInterface
{
    /**
     * @param string $url
     * @param array $query
     * @return mixed
     */
    public function get(string $url, array $query = []);

    /**
     * @param string $url
     * @param array $content
     * @return mixed
     */
    public function post(string $url, array $content = []);
}
