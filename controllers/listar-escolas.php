<?php
require_once ROOT_PATH . MODEL_PATH . "/Escola.php";

$escola = new Escola();
$escolas = $escola->listar();

include ROOT_PATH . "/views/escolas.php";
    