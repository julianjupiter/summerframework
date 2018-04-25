<?php

namespace Core;

use Helper\HttpMethod;

class Application
{
    private $routes = [];
    private $paramPatterns = [
        'alpha' => '[a-zA-Z]+',
        'word' => '[a-zA-Z\-]+',
        'num' => '[0-9]+',
        'any' => '[^/]+',
        'all' => '.*',
        'year' => '[0-9]{4}+',
        'day' => '([1,2]|0[1-9]|[1-2][0-9]|3[0-1])+',
        'month' => '([1,2]|0[1-9]|1[0-2])+',
        'hour12' => '(0[1-9]|1[0-2])+',
        'hour24' => '[1,2]|0[1-9]|1[0-9]|2[0-4]+',
        'second' => '[1,2]|0[1-9]|[1-5][0-9]|6[0]+',
        'category' => '[a-zA-Z\-]+',
        'slug' => '[a-zA-Z\-]+'
    ];
    
    public function addRoute($method, $path, $handler)
    {
        list($controller, $action) =explode('@', $handler);
        $this->routes[] = [$method, $path, $controller, $action];
    }

    public function get($path, $handler) 
    {
        $this->addRoute(HttpMethod::GET, $path, $handler);
    }

    public function post($path, $handler) 
    {
        $this->addRoute(HttpMethod::POST, $path, $handler);
    }
    
    private function compileRoute($path) {
            $route = str_replace(['{', '}'], '', $path);
            $routeSegments = explode('/', $route);
            $newRouteSegments = [];
            $sameSubpatterns = [];
            for ($i = 0; $i < count($routeSegments); $i++) 
            {
                if (array_key_exists($routeSegments[$i], $this->paramPatterns)) 
                {
                    if (in_array($routeSegments[$i], $sameSubpatterns)) 
                    {
                        $counter = count($sameSubpatterns);
                        $newRouteSegments[$i] = '(?P<' . $routeSegments[$i] . $counter . '>' . $this->paramPatterns[$routeSegments[$i]] . ')';
                        array_push($sameSubpatterns, $routeSegments[$i] . $counter);
                    } 
                    else 
                    {
                        $newRouteSegments[$i] = '(?P<' . $routeSegments[$i] . '>' . $this->paramPatterns[$routeSegments[$i]] . ')';
                        array_push($sameSubpatterns, $routeSegments[$i]);
                    }
                } 
                else 
                {
                    $newRouteSegments[$i] = $routeSegments[$i];
                }
            }

            $newRoute = '~^' . implode('/', $newRouteSegments) . '$~';
            return $newRoute;
    }
    
    public function match($requestUri = null, $requestMethod = null)
    {
        $isMatched = false;
        $params = [];
        
        if($requestUri === null) 
        {
            $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
            
            if ($uri != '/') 
            {
                $uri = rtrim($uri, '/');
            }     
                   
			$requestUri = $uri;
		}
        
        if($requestMethod === null) {
			$requestMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
		}
        
        $controller = '';
        $matches = [];
        foreach ($this->routes as $route) 
        {
            list($method, $path, $_controller, $action) = $route;
            
            $isMethodMatched = false;          
            if (strcasecmp($requestMethod, $method) === 0) 
            {
				$isMethodMatched = true;
			}
            
            if($isMethodMatched) 
            {
                if ($path === $requestUri) 
                {
                    $isMatched = true;
                    $controller = $_controller;
                    break;
                } 
                else 
                {
                    $newRoute = $this->compileRoute($path);
                    
                    if (preg_match($newRoute, $requestUri, $_matches))
                    {
                        $controller = $_controller;
                        $matches = $_matches;
                        $isMatched = true;
                        break;
                    }
                }
            } 
        }
        
        if ($isMatched == true) 
        {
            $paramCount = (count($matches) - 1) / 2;
            $params = [];
            for ($i = 1; $i <= $paramCount; $i++) 
            {
                array_push($params, $matches[$i]);
            }
            
            return ['controller' => $controller, 'action' => $action, 'params' => $params];
        }
        
        return false;
    }
    
    public function run()
    {
        $match = $this->match();        
        $controller = $match['controller'];
        $action = $match['action'];
        if($match && is_callable($controller, $action))
        {
            $controller = new $controller();
            call_user_func_array([$controller, $action], $match['params'] ); 
        } 
        else 
        {
            header("HTTP/1.0 404 Not Found");
            include_once PATH_VIEW . 'errors/pageNotFound.php';
        }
    }
}