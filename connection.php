<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'nicolassolicitacoes');
define('DB_PASS', 'root');
define('DB_USER', 'root');

class Database {

    private $conn = null;

    public function __construct() {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch (Exception $e) {
            print_r($e);
            die();
        }
    }

    public function cadastrar_cliente(string $nome, string $cpf, string $email, string $telefone) {
        $query = "INSERT INTO Clientes (Nome, CPF, Email, Telefone) VALUES ('" . $nome . "', '" . $cpf . "', '" . $email . "', '" . $telefone . "');";
        $this->query($query);
    }

    public function criar_solicitacao(int $id_cliente, string $descricao, string $urgencia) {
        $query = "INSERT INTO Solicitacoes (IDCliente, Descricao, Urgencia) VALUES (" . $id_cliente . ", '" . $descricao . "', '" . $urgencia . "');";
        $this->query($query);
    }

    public function mostrar_solicitacoes(): array {
        $query = "SELECT * FROM Solicitacoes;";
        $result = $this->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function mostrar_clientes(): array {
        $query = "SELECT * FROM Clientes;";
        $result = $this->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;;
        }
        return $data;
    }


    public function query($raw): bool|mysqli_result {
        return mysqli_query($this->conn, $raw);
    }

    public function close() {
        $this->conn->close();
    }
}

?>
