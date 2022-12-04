<?php

namespace App\Utils;

class View {

    /**
     *
     * @var array
     */
    private static $vars = [];

    /**
     *
     * @param array $vars
     * @return void
     */
    public static function init($vars = []) {
        self::$vars = $vars;
    }

    /**
     * Return view content
     *
     * @param string $view
     * @return string
     */
    private static function getViewContent($view) {
        $file = __DIR__.'/../../resources/view/'.$view.'.html';

        return file_exists($file) ? file_get_contents($file) : 'n achou';
    }
    
    /**
     * Return rendered content from view
     *
     * @param string $view
     * @param array $vars (string/numeric)
     * @return string
     */
    public static function render($view, $vars = []) {
        $viewContent = self::getViewContent($view);

        $vars = array_merge(self::$vars, $vars);

        $keys = array_keys($vars);
        $keys = array_map(function($item) {
            return '{{'.$item.'}}';
        }, $keys);

        return str_replace($keys, array_values($vars), $viewContent);
    }
}