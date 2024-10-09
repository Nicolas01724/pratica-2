<?php

class Escola extends Database {
    private string $table = "escola";
    public function __construct() {
        parent::__construct();
    }

    public function adicionar(array $values) {
        $table = $this->table;
        
        $this->criar($table, $values);
    }
}