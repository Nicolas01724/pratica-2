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
}