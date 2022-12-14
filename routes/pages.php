<?php

use \App\Http\Response;
use \App\Controller\Pages;

// Rota Home
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home::getHome());
    }
]);

$obRouter->get('/sobre', [
    function() {
        return new Response(200, Pages\About::getAbout());
    }
]);

$obRouter->get('/page/{pageId}', [
    function($pageId) {
        return new Response(200, 'Página '. $pageId);
    }
]);