<?php

class Login extends Database{
    private string $table = "usuario";
    public function __construct() {
        parent::__construct();
    }

    public function autenticar(string $email, string $senha): bool | string{
        $sql = "SELECT id FROM $this->table WHERE '$email' = email AND '$senha' = senha";
        $resposta = $this->query( $sql );
        if( $resposta->num_rows > 0){
            return $resposta->fetch_assoc()['id'];
        }
        return false;
    }

    function verificar_email ($email)  {
        $sql = "SELECT senha FROM $this->table WHERE email = '$email'";
        $resposta = $this->query( $sql );
        if ($resposta->num_rows > 0){
            return true;
        }
        return false;
    }

    function pegar_senha ($email): string|bool|null {

        $sql = "SELECT senha FROM $this->table WHERE email = '$email'";
        $resposta = $this->query($sql);
        if( $resposta->num_rows > 0){
            return $resposta->fetch_assoc()["senha"];
        }
        return false;
    }

}