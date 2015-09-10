<?php

namespace D1pr3d\CasClient;

use D1pr3d\CasClient\Http\ClientInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CasClient
{
    /**
     * @var string
     */
    private $casRoot;

    /**
     * @var ServiceUrlProviderInterface
     */
    private $serviceUrlProvider;

    /**
     * @var D1pr3d\CasClient\Http\ClientInterface
     */
    private $httpClient;

    /**
     * @param $casRoot
     * @param ClientInterface $httpClient
     * @param ServiceUrlProviderInterface $serviceUrlProvider
     */
    public function __construct($casRoot, ClientInterface $httpClient, ServiceUrlProviderInterface $serviceUrlProvider)
    {
        $this->casRoot = $this->normalizeRoot($casRoot);
        $this->httpClient = $httpClient;
        $this->serviceUrlProvider = $serviceUrlProvider;
    }

    /**
     * @param string $casRoot
     * @return string
     */
    private function normalizeRoot($casRoot)
    {
        if (substr($casRoot, -1, 1) != '/') {
            $casRoot.= '/';
        }

        return $casRoot;
    }

    /**
     * @return string
     */
    private function getLoginUrl()
    {
        return $this->casRoot . 'login';
    }

    /**
     * @returns ResponseInterface
     */
    public function login()
    {
        $targetUrl = new Uri($this->getLoginUrl());

        return new Response(302, array(
            'Location' => (string)Uri::withQueryValue($targetUrl,
                'service', rawurlencode($this->serviceUrlProvider->getServiceUrl())
            )
        ));
    }

    /**
     * @param ServerRequestInterface $serverRequest
     */
    public function serviceValidate(ServerRequestInterface $serverRequest)
    {

    }
}