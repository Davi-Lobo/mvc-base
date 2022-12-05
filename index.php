<?php

require __DIR__.'/vendor/autoload.php';

use \App\Http\Router;
use \App\Utils\View;
use \App\Common\Environment;

Environment::load(__DIR__);

View::init([
    'BASE_URL' => getenv('BASE_URL')
]);

$obRouter = new Router(getenv('BASE_URL'));

include __DIR__.'/routes/pages.php';

$obRouter->run()->sendResponse();