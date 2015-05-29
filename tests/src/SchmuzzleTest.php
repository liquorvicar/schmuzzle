<?php

namespace test\Liquorvicar\Schmuzzle;

use GuzzleHttp\ClientInterface;
use Liquorvicar\Schmuzzle\Schmuzzle;
use Mockery as m;

class SchmuzzleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Schmuzzle
     */
    protected $schmuzzle;
    /**
     * @var m\MockInterface|ClientInterface
     */
    protected $client;

    protected function setUp()
    {
        parent::setUp();

        $this->client = m::mock('\GuzzleHttp\ClientInterface');

        $this->schmuzzle = new Schmuzzle($this->client);
    }

    public function testIsConstructedWithAGuzzleClient()
    {
        $this->assertInstanceOf('\Liquorvicar\Schmuzzle\Schmuzzle', $this->schmuzzle);
    }

    public function testSchmurlDelegatesToRequest()
    {
        $requestMethod = 'GET';
        $url = 'http://www.example.com';
        $options = [];
        $this->client->shouldReceive('request')->once()->withArgs([$requestMethod, $url, $options]);

        $this->schmuzzle->schmurl($requestMethod, $url, $options);
    }

    public function testSchmyncDelegatesToRequestAsync()
    {
        $requestMethod = 'GET';
        $url = 'http://www.example.com';
        $options = [];
        $this->client->shouldReceive('requestAsync')->once()->withArgs([$requestMethod, $url, $options]);

        $this->schmuzzle->schmync($requestMethod, $url, $options);
    }
}
