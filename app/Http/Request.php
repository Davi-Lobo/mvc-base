<?php

namespace App\Http;

class Request {
    
    /**
     * Http request method
     * @var string
     */
    private $httpMethod;

    /**
     * Page URI
     * @var string
     */
    private $uri;

    /**
     * URL params ($_GET)
     * @var array
     */
    private $queryParams = [];

    /**
     * Post variables ($_POST)
     * @var array
     */
    private $postVars = [];

    /**
     * Request Headers
     * @var array
     */
    private $headers = [];

    public function __construct() {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    /**
     * Returns the HTTP method of the request
     * @return string
     */
    public function getHttpMethod() {
        return $this->httpMethod;
    }

    /**
     * Returns the URI of the request
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * Returns the HEADERS of the request
     * @return array
     */
    public function getHeaders() {
        return $this->headers;
    }

    /**
     * Returns the QUERY PARAMS of the request
     * @return array
     */
    public function getQueryParams() {
        return $this->queryParams;
    }

    /**
     * Returns the POST variables of the request
     * @return array
     */
    public function getPostVars() {
        return $this->postVars;
    }
}