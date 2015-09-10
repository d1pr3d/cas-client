<?php
namespace D1pr3d\CasClient\Http;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @param RequestInterface $request
     * @return Psr\Http\Message\ResponseInterface
     */
    public function handle(RequestInterface $request);
}