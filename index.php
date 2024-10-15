<?php

require_once "config.php";

require_once ROOT_PATH.CONTROLLER_PATH. "/escola.php";
$escola_controller = new Escola_controller();
Router::use("/escola", $escola_controller);


// criar uma instancia

// Router::use('/','listar-escolas');

// Router::use("/", $user_controller);

require_once ROOT_PATH.CONTROLLER_PATH. "/noticias.php";
$noticia_controller = new Noticia_controller();

Router::use("/noticias", $noticia_controller );

