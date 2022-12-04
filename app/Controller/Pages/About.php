<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class About extends Page {
    
    /**
     * Returns the view content for the about page
     * @return string
     */
    public static function getAbout() {
        $organization = new Organization;

        $content =  View::render('pages/about', [
            'name' => $organization->name,
            'description' => $organization->description
        ]);

        return parent::getPage('About page', $content);
    }
}