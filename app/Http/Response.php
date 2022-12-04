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

    /**
     * Returned content type
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Response content
     * @var mixed
     */
    private $content;

    /**
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html') {
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->contentType = $contentType;
        $this->setContentType($contentType);
    }   

    /**
     * Changes the content type of the response
     * @param string $contentType
     * @return void
     */
    public function setContentType($contentType) {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * @param string $key
     * @param string $value
     * @return void
     */
    public function addHeader($key, $value) {
        $this->headers[$key] = $value;
    }

    /**
     * @return void
     */
    private function sendHeaders() {
        http_response_code($this->httpCode);

        foreach($this->headers as $key=>$value) {
            header($key.': '.$value);
        }
    }

    /**
     * @return mixed
     */
    public function sendResponse() {
        $this->sendHeaders();
        
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
        }
    }

}