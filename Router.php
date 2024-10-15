<?php
class Router {
    public static function GET($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'GET') {
            include ROOT_PATH . CONSTROLLER_PATH . "/$handle.php";
        }
    }

    public static function POST($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'POST') {
            include ROOT_PATH . CONSTROLLER_PATH . "/$handle.php";
        }
    }

    public static function DELETE($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'DELETE') {
            include ROOT_PATH . CONSTROLLER_PATH . "/$handle.php";
        }
    }

    public static function PUT($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'PUT') {
            include ROOT_PATH . CONSTROLLER_PATH . "/$handle.php";
        }
    }

    public static function use(string $path, Controller $controller) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($path !== $uri) return;

        switch ($method) {
            case 'GET':
                $controller->GET();
                break;
            case 'DELETE':
                $controller->DELETE();
                break;
            case 'PUT':
                $controller->PUT();
                break;
            case 'POST':
                $controller->POST();
                break;
            default:
                # code...
                break;
        }
    }
}