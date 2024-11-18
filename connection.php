<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'pratica_nicolas');
define('DB_PASS', 'root');
define('DB_USER', 'root');

class Database {

    private $conn = null;

    public function __construct() {


        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch(Exception $e) {
            print_r($e);
            die();
        }
    }

    public function cadastrar_usuario(string $nome, string $email, string $telefone) {

        $query = "INSERT INTO usuario (nome, email, telefone) VALUES ('" . $nome . "', '" . $email . "', '" . $telefone . "');";

        
        $this->query($query);

    }

    public function cadastrar_colaborador(string $nome, string $email, string $telefone) {

        $query = "INSERT INTO responsavel (nome, email, telefone) VALUES ('" . $nome . "', '" . $email . "', '" . $telefone . "');";

        
        $this->query($query);

    }

    public function cadastrar_chamado(string $descricao, string $criticidade,  INT $andamento, string $abertura, INT $id_usuario, INT $id_colaborador) {
        $query = "INSERT INTO chamado (descricao, criticidade, andamento, abertura, id_colaborador) VALUES ('" . $descricao . "', '" . $criticidade . "', " . $andamento . " '" . $abertura . "' " . $id_colaborador . ");";

        
        $this->query($query);
    }

    public function mostrar_colaboradores(): array {
        $query = "SELECT * FROM responsavel;";

        $result = $this->query($query);

        $data = [];

        while($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        print_r($data);
        return $data;
    }

    public function query($raw) : bool|mysqli_result {
        return mysqli_query($this->conn, $raw);
    }

    public function close()  {
        $this->conn->close();
    }
}


?>