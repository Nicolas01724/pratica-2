<?php

require_once "config.php";


require_once ROOT_PATH . CONSTROLLER_PATH . "\quiz.php";
$quiz_controller = new Quiz_controller();
Router::use('/', $quiz_controller);

// Router::POST('/', 'escola');

// Router::GET('/','listar-escolas');

// Router::use("/", $user_controller);



