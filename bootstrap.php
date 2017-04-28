<?php
/**
 * Created by PhpStorm.
 * User: smykruslanal
 */

spl_autoload_register(
    function ($className) {
        $className = str_replace('\\', '/', $className);
        $path = __DIR__ . '/' . $className . '.php';
        if (!file_exists($path)) {
            die('error path: ' . $path);
        }

        require_once $path;
    }
);
