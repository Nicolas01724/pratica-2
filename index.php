<?php
require_once "config.php";
session_start();


// Router::POST('/', 'escola');

// Router::use('/','listar-escolas');

// Router::use("/", $user_controller);

require_once ROOT_PATH . CONTROLLER_PATH. "/noticias.php";
$noticia_controller = new Noticia_controller();
Router::use("/noticias", $noticia_controller );

require_once ROOT_PATH.CONTROLLER_PATH. "/grafico.php";
$grafico_controller = new Grafico_controller();
Router::use("/grafico", $grafico_controller );

require_once ROOT_PATH.CONTROLLER_PATH. "/usuario.php";
$usuario_controller = new Usuario_controller();
Router::use("/usuario" , $usuario_controller);

require_once ROOT_PATH.CONTROLLER_PATH. "/login.php";
$login_controller = new Login_controller();
Router::use("/login", $login_controller);



// series iniciais 
require_once ROOT_PATH.CONTROLLER_PATH. "/memoria.php";
Router::use("/jogodamemoria", new Memoria_controller() );
//jogo 7 erros
//quiz


Router::filtro('fundamental_2');
// series finais
// quiz
// caça palavras
// forca


// ensino médio
// Router::privado();
Router::filtro('ensino_medio');
require_once ROOT_PATH . CONTROLLER_PATH . "\quiz.php";

$quiz_controller = new Quiz_controller();
Router::use('/', $quiz_controller);
Router::GET('/quiz/botao_proximo', fn () => $quiz_controller->proximo());
Router::GET('/quiz/gerar', fn () => $quiz_controller->gerarQuiz());
Router::GET('/quiz/responder', fn () => $quiz_controller->responder());
Router::GET('/quiz/zerou', fn() => $quiz_controller->zerou());

// router adm

require_once ROOT_PATH.CONTROLLER_PATH. "/grafico.php";
Router::use("/admin/estatistica", new Grafico_controller() );

// Router::privado();