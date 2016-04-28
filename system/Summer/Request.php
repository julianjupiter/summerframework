<?php

namespace Summer;

class Request {

    public static function getCurrentUri() {
        return $_SERVER['REQUEST_URI'];
    }

    public static function getCurrentMethod() {
        return $_SERVER['REQUEST_METHOD'];
    }

}
