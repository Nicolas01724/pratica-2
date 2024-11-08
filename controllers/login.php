<?php
require_once ROOT_PATH . MODEL_PATH . "/Login.php";




class Login_controller implements Controller{
    public function POST(): void {
        $login = new Login();

        if(!assert_array_keys(['email','senha'], $_POST)){
            header('HTTP/1.1 400 Bad Request');
            die("Falta dados!");
        }

        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $existe = $login->verificar_email($email);
        if (!$existe){
            header('HTTP/1.1 201 Created');
            die("Email ou senha invalido");
        }

        $senha_hash = $login->pegar_senha($email);

        password_verify($senha, $senha_hash);

        $user = $login->autenticar($senha_hash, $email);

        $_SESSION["login"] = $email;
        $_SESSION["senha"] = $senha;
        $_SESSION["escolaridade"] = $escolaridade;

        echo "sucesso!";
    }

    public function DELETE() {
        unset($_SESSION["login"]);
        unset($_SESSION["senha"]);
        unset($_SESSION["escolaridade"]);
    }
    
    public function PUT() {}
    public function GET() {}
}
