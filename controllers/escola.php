<?php 
require_once ROOT_PATH . MODEL_PATH . "/Escola.php";
foreach ($_POST as $key => $value) {
    $name = "_$key";
    $$name = $value;
}

if (assert_array_keys(["nome", "cidade", "bairro", "rua", "numero_escola"], $_POST)) {
    $escola = new Escola();

    $err = $escola->adicionar([
        "nome" => $_nome,
        "cidade" => $_cidade,
        "bairro" => $_bairro,
        "rua" => $_rua,
        "numero_escola" => $_numero_escola
    ]);
    
    if ($err === true) {
        header("Status: 500 Internal Server Error");
        die("Dados invalidos");
    }

    echo "Sucesso 😊";
}
