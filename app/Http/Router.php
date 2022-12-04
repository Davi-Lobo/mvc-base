<?php

namespace App\Http;

use \Closure;
use \Exception;

class Router {
    
    /**
     * Project base url
     * @var string
     */
    private $baseUrl = '';

    /**
     * Url prefix
     * @var string
     */
    private $prefix = '';

    /**
     * Routes index
     * @var array
     */
    private $routes = [];

    /**
     * @var Request
     */
    private $request;

    /**
     *
     * @param string $url
     */
    public function __construct($url) {
        $this->request = new Request();
        $this->baseUrl = $url; 
        $this->setPrefix();
    }

    /**
     *
     * @return void
     */
    private function setPrefix() {
        $parseUrl = parse_url($this->baseUrl);
        
        $this->prefix = $parseUrl['path'] ?? '';
    }

    /**
     *
     * @param string $method
     * @param string $route
     * @param array $params
     * @return void
     */
    private function addRoute($method, $route, $params = []) {
        foreach($params as $key => $value) {
            if($value instanceof Closure) {
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     *
     * @param string $route
     * @param array $params
     * @return void
     */
    public function get($route, $params = []) {
        return $this->addRoute('GET', $route, $params);
    }

    /**
     * 
     * @return string
     */
    private function getUri() {
        $uri = $this->request->getUri();

        $xUri = strlen($this->prefix) ? explode($this->prefix, $uri) : [$uri];

        return end($xUri);
    }

    /**
     * 
     * @return array
     */
    private function getRoute() {
        $uri = $this->getUri();
        
        $httpMethod = $this->request->getHttpMethod();

        foreach($this->routes as $patternRoute => $methods) {
            if(preg_match($patternRoute, $uri)) {
                if($methods[$httpMethod]) {
                    return $methods[$httpMethod];
                }

                throw new Exception("Método não permitido", 405);
            }
        }

        throw new Exception("Página não encontrada", 404);
    }

    /**
     *
     * @return Response
     */
    public function run() {
        try {
            $route = $this->getRoute();
            echo '<pre>';
            print_r($route);
            echo '</pre>';
            exit;
        } catch(Exception $e) {
            return new Response($e->getCode(), $e->getMessage());
        }
    }
}