<?php
require_once ROOT_PATH . MODEL_PATH . "/Login.php";




class Login_controller extends Controller{
    public function POST(): void{

        $login = new Login();
        $existe = $login->verificar_email($_POST['email']);

       if($existe == false){
           header('HTTP/1.1 201 Created');
           die("Usuario invalido");
       }

        if(!assert_array_keys(['email','senha'], $_POST)){
            header('HTTP/1.1 400 Bad Request');
            die("Falta dados!");
        }
    }
}