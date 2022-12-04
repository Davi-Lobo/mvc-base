<?php

namespace App\Http;

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

    private function setPrefix() {
        $parseUrl = parse_url($this->baseUrl);
        
        $this->prefix = $parseUrl['path'] ?? '';
    }
}