<?php

namespace D1pr3d\CasClient;

interface ServiceUrlProviderInterface
{
    /**
     * Returns raw service URL string
     *
     * @return string
     */
    public function getServiceUrl();
}