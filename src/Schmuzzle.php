<?php

namespace Liquorvicar\Schmuzzle;

use GuzzleHttp\ClientInterface;

class Schmuzzle
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * Schmuzzle constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $method
     * @param null $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function schmurl($method, $uri = null, array $options = [])
    {
        return $this->client->request($method, $uri, $options);
    }

    /**
     * @param $method
     * @param null $uri
     * @param array $options
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function schmync($method, $uri = null, array $options = [])
    {
        return $this->client->requestAsync($method, $uri, $options);
    }
}
