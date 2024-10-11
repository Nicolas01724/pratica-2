<?php

class Escola extends Database {
    private string $table = "escola";
    public function __construct() {
        parent::__construct();
    }

    public function adicionar(array $values): bool | string {
        $table = $this->table;
        
        try {
            $this->criar($table, $values);
            return false;
        } catch (Exception $e) {
            return true;
        }

    }
}