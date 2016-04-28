<?php

namespace Summer;

class Summer {

    private $routes = [];
    private $methods = [];

    public function get($pattern, $action, $name = null) {
        if ($name == null) {
            $this->routes[$pattern] = $action;
            $this->methods[$pattern] = RequestMethod::GET;
        }
    }

    public function post($pattern, callable $action, $name = null) {
        if ($name == null) {
            $this->routes[$pattern] = $action;
            $this->methods[$pattern] = RequestMethod::POST;
        }
    }

    private function hasRoute($route, $method) {
        if (array_key_exists($route, $this->routes) && $this->methods[$route] == $method) {
            return true;
        }
    }

    public function run($pageRequest = null) {
        if ($pageRequest == null) {
            $pageRequest = Request::getCurrentUri();
        }

        if ($this->hasRoute($pageRequest, Request::getCurrentMethod())) {
            if (is_callable($this->routes[$pageRequest]())) {
                call_user_func_array($this->routes[$pageRequest]);
            }
        }
    }

}
