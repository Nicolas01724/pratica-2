<?php
class Router {
    public static function GET($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === explode('?', $uri)[0] && $method === 'GET') {
            $handle();
        }
    }

    public static function POST($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'POST') {
            include ROOT_PATH . CONTROLLER_PATH . "/$handle.php";
        }
    }

    public static function DELETE($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'DELETE') {
            include ROOT_PATH . CONTROLLER_PATH . "/$handle.php";
        }
    }

    public static function PUT($path, $handle) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($path === $uri && $method === 'PUT') {
            include ROOT_PATH . CONTROLLER_PATH . "/$handle.php";
        }
    }

    public static function use(string $path, Controller $controller) {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if ($path !== explode('?', $uri)[0]) return;

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

    public static function privado() {
        if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
            echo $_SESSION["login"] ." - ". $_SESSION["senha"];
        } else {
            echo "Faça o seu login! 😒";
        }
        die();
    }

    public static function filtro(string $tipo) {
        $tipos = [
            "ensino_medio" => 3,
            "fundamental_2" => 2,
            "fundamental_1" => 1,
        ];

        // if (!isset($_SESSION["escolaridade"])) die("Acesso negado!");

        // $tipo_usuario = $_SESSION["escolaridade"];

        // if (!($tipo_usuario >= $tipos[$tipo])) die("Acesso negado!"); 
    }
}