<?php

include "config.php";
define("VIEW_PATH", "/view/");

class Router {
    public static function GET($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'GET') {
            include VIEW_PATH . "$handle.php";
        }
    }

    public static function POST($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'GET') {
            include VIEW_PATH . "$handle.php";
        }
    }

    public static function DELETE($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'GET') {
            include VIEW_PATH . "$handle.php";
        }
    }

    public static function PUT($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'GET') {
            include VIEW_PATH . "$handle.php";
        }
    }
}