<?php

require_once "../htdocs/connection.php";

$conn = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['oque']) && isset($_POST['telefone'])) {
        $nome = $_POST['name'];
        $email = $_POST['email'];
        $oque = $_POST['oque'];
        $telefone = $_POST['telefone'];
        if ($oque == 1) {
            $conn->cadastrar_usuario($nome, $email, $telefone);
        } else {
            $conn->cadastrar_colaborador($nome, $email, $telefone);
        }
    }
        

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@2.0.3" integrity="sha384-0895/pl2MU10Hqc6jd4RvrthNlDiE9U1tWmX7WRESftEDRosgxNsQG/Ze9YMRzHq" crossorigin="anonymous"></script>
    <title>Chamados</title>
</head>
<body>
    <div id="main">

    </div>
    <button hx-post="/cadastrar.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">Cadastrar</button>
    <button hx-post="/chamado-cadastro.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">Criar chamado</button>
    <button hx-post="/logar.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">ver chamados</button>

</body>
</html>