<?php
namespace D1pr3d\CasClient\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     *
     */
    public function sendRequest(RequestInterface $request);
}