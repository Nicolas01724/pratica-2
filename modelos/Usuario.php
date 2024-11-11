<?php

class Usuario extends Database{
    private $table = 'usuario';
    public function __construct(){
        parent::__construct();
    }

    public function adicionar(array $valores){

        try{
            $this->criar($this->table,[
                'nome' => $valores["nome"],
                'email' => $valores["email"],
                'senha' => $valores["senha"],
                'escolaridade' => $valores["escolaridade"],
                'cidade' => $valores["cidade"],
                'bairro' => $valores["bairro"],
                'genero' => $valores["genero"],
                'data_nascimento' => $valores["data_nascimento"],
                'telefone' => $valores['telefone'],
                'id_escola' => $valores['id_escola'],
            ]);
        }catch(Exception $e){
            echo ''.$e->getMessage().'';
            return false;
        }
        return true;
    }
    
    function selecionar_por_email ($email)  {
        $sql = "SELECT id FROM $this->table WHERE email = '$email'";
        $resposta = $this->query( $sql );
        if ($resposta->num_rows > 0){
            return $resposta->fetch_assoc()['id'];
        }
        return false;
    }

    function setar(array $values, int $id) {
        try {
            $this->editar($this->table, $values, $id);
            return "sucesso";
        } catch (Exception $e){
            print_r( $e->getMessage() );
            return "erro";
        }
    }

    function visualizar() {
        $table = $this->table;

        $resposta = $this->query("SELECT * FROM $table");
        $data = [];
        while ($row = $resposta->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}