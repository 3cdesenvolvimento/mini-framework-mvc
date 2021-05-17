<?php

namespace app\core;

class Routers
{
    private $method;
    private $uri;
    private $routers = [];

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $this->normalizeURI($_SERVER['REQUEST_URI']);
    }

    private function normalizeURI($uri)
    {
        if( URI_PREFIX )
        {
            $uri_escape = addcslashes(URI_PREFIX, '/');
            return preg_replace("/^$uri_escape/", '', $uri);
        }

        return $uri;
    }

    public function get($router, $callback)
    {
        if( $this->verifyRouter($router, 'GET') )
            $this->routers[] = ['method' => 'GET', 'router' => $router, 'callback' => $callback];
    }

    public function post($router, $callback)
    {
        if( $this->verifyRouter($router, 'POST') )
            $this->routers[] = ['method' => 'POST', 'router' => $router, 'callback' => $callback];
    }

    public function delete($router, $callback)
    {
        if( $this->verifyRouter($router, 'DELETE') )
            $this->routers[] = ['method' => 'DELETE', 'router' => $router, 'callback' => $callback];
    }

    public function put($router, $callback)
    {
        if( $this->verifyRouter($router, 'PUT') )
            $this->routers[] = ['method' => 'PUT', 'router' => $router, 'callback' => $callback];
    }

    public function patch($router, $callback)
    {
        if( $this->verifyRouter($router, 'PATCH') )
            $this->routers[] = ['method' => 'PATCH', 'router' => $router, 'callback' => $callback];
    }

    private function verifyRouter($router, $method)
    {
        foreach($this->routers as $routers)
        {
            if( $routers['method'] == $method )
            {
                if( $routers['router'] == $router )
                    return false;
            }
        }
        return true;
    }

}// Routers