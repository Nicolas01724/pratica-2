<?php
require_once "config.php";
session_start();


require_once ROOT_PATH . CONTROLLER_PATH . "\quiz.php";
$quiz_controller = new Quiz_controller();
Router::use('/', $quiz_controller);

// Router::POST('/', 'escola');

// Router::use('/','listar-escolas');

// Router::use("/", $user_controller);

require_once ROOT_PATH . CONTROLLER_PATH. "/noticias.php";
$noticia_controller = new Noticia_controller();
Router::use("/noticias", $noticia_controller );

require_once ROOT_PATH.CONTROLLER_PATH. "/usuario.php";
$usuario_controller = new Usuario_controller();
Router::use("/usuario" , $usuario_controller);

require_once ROOT_PATH.CONTROLLER_PATH. "/login.php";
$login_controller = new Login_controller();
Router::use("/login", $login_controller);

Router::privado();
