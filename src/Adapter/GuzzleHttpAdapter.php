<?php

namespace DarthSoup\Rundeck\Adapter;

use DarthSoup\Rundeck\Exception\HttpException;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Response;

/**
 * Adapter for guzzlehttp/guzzle (Version 6)
 */
class GuzzleHttpAdapter implements AdapterInterface
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @param string $token
     * @param ClientInterface|null $client
     */
    public function __construct($token, ClientInterface $client = null)
    {
        $this->client = $client ?: new Client(['headers' => [
            'Accept' => 'application/json',
            'X-Rundeck-Auth-Token' => $token,
        ]]);
    }

    /**
     * GuzzleHttp GET
     *
     * @param string $url
     * @return void
     */
    public function get(string $url)
    {
        try {
            $this->response = $this->client->get($url);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * GuzzleHttp POST
     *
     * @param string $url
     * @param array $content
     * @return void
     */
    public function post(string $url, array $content = [])
    {
        $options = [];
        $options['json'] = $content;

        try {
            $this->response = $this->client->post($url, $options);
        } catch (RequestException $e) {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * @throws HttpException
     */
    protected function handleError(): HttpException
    {
        $body = (string)$this->response->getBody();
        $statuscode = (int)$this->response->getStatusCode();
        $content = json_decode($body);

        if (isset($content->message)) {
            throw new HttpException($content->message, $statuscode);
        }
        throw new HttpException('Cannot processing Request', $statuscode);
    }
}
