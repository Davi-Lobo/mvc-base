<?php

namespace App\Http;

class Response {

    /**
     * HTTP status code
     * @var integer
     */
    private $httpCode = 200;
    
    /**
     * Response headers
     * @var array
     */
    private $headers = [];

    private $contentType = 'text/html';

}