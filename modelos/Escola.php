<?php

class Escola extends Database {
    private string $table = "escola";
    public function __construct() {
        parent::__construct();
    }

    public function adicionar(array $values): bool | string {
        $table = $this->table;
        
        try { // 
            $this->criar($table, $values); // o criar puxa a função do database para adicionar valores dentro da tabela.
            return false;
        } catch (Exception $e) {
            return true;
        }

    }
    public function listar(): array{
        $table = $this->table;
        $resultado = $this->query("SELECT * FROM $table;");
        $dados = array();
        while ($row = $resultado->fetch_assoc()) {
            $dados[] = $row;
        }
        return $dados;
    }

}