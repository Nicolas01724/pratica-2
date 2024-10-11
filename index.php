<?php

require_once "config.php";

Router::POST('/', 'escola');

Router::GET('/','listar-escolas');
