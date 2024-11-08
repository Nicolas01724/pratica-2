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

<<<<<<< HEAD
    // function validar() {
    //     $resultado = $this->query("SELECT escolaridade FROM usuario WHERE id = $id;") // ver da onde vem esse id
       
    //     if ($resultado->num_rows > 0){
    //         $row = $resposta->fetch_assoc()
    //         return $row['escolaridade'];
    //     }
       
    //     return false; // caso não encontre nenhum usuario
=======
    function validar() {
        $resposta = $this->query("SELECT $escolaridade FROM usuario WHERE id = $id;"); // ver da onde vem esse id
        $categoria_um = 0;
        $categoria_dois = 0;
        $categoria_tres = 0;
>>>>>>> a6663f92195148dc5921029e0ef4c54721501929

    // }
    }
}