<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Page {

    /**
     * Returns header layout
     *
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/header');
    }

    /**
     * Returns footer layout
     *
     * @return string
     */
    private static function getFooter() {
        return View::render('pages/footer');
    }
    
    
    /**
     * Returns the default page content
     * @return string
     */
    public static function getPage($title, $content) {
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);
    }
}