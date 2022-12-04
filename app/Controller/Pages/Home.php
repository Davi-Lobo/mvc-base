<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {
    
    /**
     * Returns the view content for the home page
     * @return string
     */
    public static function getHome() {
        $organization = new Organization;

        $content =  View::render('pages/home', [
            'name' => $organization->name,
            'description' => $organization->description
        ]);

        return parent::getPage('Zleeb Commerce - Página Inicial', $content);
    }
}