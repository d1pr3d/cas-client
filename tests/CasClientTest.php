<?php
namespace CasClient\Tests;

use \D1pr3d\CasClient\CasClient;
use Prophecy\Prophet;

class CasClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Prophet
     */
    private $prophet;

    public function setup()
    {
        $this->prophet = new Prophet();
    }

    public function tearDown()
    {
        $this->prophet->checkPredictions();
    }

    public function testItCreatesLoginResponse()
    {
        $httpClient = $this->prophet->prophesize('D1pr3d\CasClient\Http\ClientInterface');
        $serviceUrlProvider = $this->prophet->prophesize('D1pr3d\CasClient\ServiceUrlProviderInterface');

        $serviceUrlProvider->getServiceUrl()->willReturn('http://service.com');

        $client = new CasClient('https://auth.com/', $httpClient->reveal(), $serviceUrlProvider->reveal());
        $response = $client->login();

        $this->assertInstanceOf('Psr\Http\Message\ResponseInterface', $response);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('https://auth.com/login?service=http%3A%2F%2Fservice.com', $response->getHeaderLine('Location'));
    }
}