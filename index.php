<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;

define('BASE_URL', 'http://localhost/');

View::init([
    'BASE_URL' => BASE_URL
]);

$obRouter = new Router(BASE_URL);

include __DIR__.'/routes/pages.php';

$obRouter->run()->sendResponse();