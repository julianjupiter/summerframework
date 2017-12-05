<?php

namespace Helper;

class Request
{
    public function isHttpMethod()
    {
        return isset($_SERVER['REQUEST_METHOD']);
    }

    public function isHttpGetMethod()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    public function isHttpPostMethod()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}