<?php

namespace D1pr3d\CasClient;

use D1pr3d\CasClient\Http\ClientInterface;

class CasClient
{
    /**
     * @var string
     */
    private $casRoot;

    /**
     * @var
     */
    private $serviceUrlProvider;

    /**
     * @var D1pr3d\CasClient\Http\ClientInterface
     */
    private $httpClient;

    public function __construct($casRoot, ClientInterface $httpClient, $serviceUrlProvider)
    {

    }
}