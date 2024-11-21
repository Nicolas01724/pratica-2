<?php

require_once "../htdocs/connection.php";

$conn = new Database();


?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>ID Cliente</th>
        <th>Descrição</th>
        <th>Urgência</th>
        <th>Status</th>
        <th>Data de Abertura</th>
    </tr>
    <?php foreach ($solicitacoes as $solicitacao): ?>
        <tr>
            <td><?= $solicitacao['ID'] ?></td>
            <td><?= $solicitacao['IDCliente'] ?></td>
            <td><?= $solicitacao['Descricao'] ?></td>
            <td><?= $solicitacao['Urgencia'] ?></td>
            <td><?= $solicitacao['Status'] ?></td>
            <td><?= $solicitacao['DataAbertura'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
