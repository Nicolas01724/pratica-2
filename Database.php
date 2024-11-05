<?php
class Database {
    private ?mysqli $conn;
    public function __construct() {
        try {
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        } catch(Exception $e) {
            die("Erro na conexão com banco" . $e);
        }
    }
    
    public function query(string $query): mysqli_result|bool {
        return $this->conn->query($query); //precisa fazer uma variavel para evitar injection sanitaze
    }
    public function criar(string $table, array $values): void { 
        $campos = array_keys($values); // cria um array dos campos, esses campos são os campos das tabelas
        $valores = array_values($values); // coloca os valores da tabela dentro de valores
        
        $campos = implode(", ", $campos);  // implode concatena os campos para "id, nome"
        $valor = implode("', '", $valores); // implode concatena, separando de "1", "oi", para "'1' , 'oi'" 

        $query = "INSERT INTO $table ($campos) VALUES ('$valor');";

        $this->query($query); // vai mandar pro banco de dados chamando a função
    }

    public function visualizar_um(string $table, array $campos, int $id ):array|bool|null  {
        $campos = implode(", ", $campos);
        
        $query = "SELECT $campos FROM $table WHERE '$id' = id" ;
        $dados = $this->query($query);
        return $dados->fetch_assoc();
    }

}