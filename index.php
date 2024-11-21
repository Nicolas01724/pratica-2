<?php

require_once "../htdocs/connection.php";

$conn = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Cadastro de cliente
    if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['telefone'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $conn->cadastrar_cliente($nome, $cpf, $email, $telefone);
    }

    // Criação de solicitação
    if (isset($_POST['id_cliente']) && isset($_POST['descricao']) && isset($_POST['urgencia'])) {
        $id_cliente = $_POST['id_cliente'];
        $descricao = $_POST['descricao'];
        $urgencia = $_POST['urgencia'];
        $conn->criar_solicitacao($id_cliente, $descricao, $urgencia);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/htmx.org@2.0.3" integrity="sha384-0895/pl2MU10Hqc6jd4RvrthNlDiE9U1tWmX7WRESftEDRosgxNsQG/Ze9YMRzHq" crossorigin="anonymous"></script>
    <title>Gerenciamento de Chamados</title>
</head>
<body>
    <div id="main"></div>

    <button hx-post="/clienteCadastro.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">Cadastrar Cliente</button>
    <button hx-post="/criarSolicitacoes.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">Criar Solicitação</button>
    <button hx-post="/verSolicitacoes.php" hx-trigger="click" hx-target="#main" hx-swap="innerHTML">Ver Solicitações</button>
</body>
</html>
