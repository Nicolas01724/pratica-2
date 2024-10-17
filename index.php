<?php

require_once "config.php";

// Router::use('/', 'escola');

// criar uma instancia

// Router::use('/','listar-escolas');

// Router::use("/", $user_controller);

require_once ROOT_PATH . CONTROLLER_PATH. "/noticias.php";
$noticia_controller = new Noticia_controller();

Router::use("/noticias", $noticia_controller );

