<?php
require_once(ROOT_PATH.MODEL_PATH."\Usuario.php");

class Usuario_controller extends Controller{
    public function POST(){
        if(!assert_array_keys(['nome','email','senha','escolaridade','cidade','bairro','genero','data_nascimento','telefone','id_escola'], $_POST)){
            header('HTTP/1.1 400 Bad Request');
            die("Falta dados!");
        }
       $usuario = new Usuario();
       $existe = $usuario->selecionar_por_email($_POST['email']);

       if($existe !== false){
           header('HTTP/1.1 201 Created');
           die("Usuário já existe");
       }

       foreach ($_POST as $key => $value) {
            $name = "_$key";
            $$name = $value;
        }

        $sucesso = $usuario->adicionar([
            "nome" => $_nome,
            "email" => $_email,
            "senha" => password_hash($_senha, PASSWORD_DEFAULT),
            "escolaridade" => $_escolaridade,
            "cidade" => $_cidade,
            "bairro" => $_bairro,
            "genero" => $_genero,
            "data_nascimento" => $_data_nascimento,
            "telefone" => $_telefone,
            "id_escola" => $_id_escola
        ]);

        if($sucesso) {
            header('HTTP/1.1 201 Created');
            echo "Usuario cadastrado com sucesso 😊";
        } else {
            header('HTTP/1.1 500 Internal Server Error');
            die("Erro ao cadastrar o usuario");
        }
    }

    public function PUT(){
        if (!assert_array_keys(['nome', 'email', 'senha', 'escolaridade', 'bairro', 'genero', 'data_nascimento', 'telefone', 'id_escola', 'id'], $_GET)){
            header('HTTP/1.1 400 Bad Request');
            die("Falta dados!");  
        }
        
        $usuario = new Usuario();

        foreach ($_GET as $key => $value) {
            $name = "_$key";
            $$name = $value;
        }
        
        $sucesso = $usuario->setar([
            "nome" => $_nome,
            "email" => $_email,
            "senha" => password_hash($_senha, PASSWORD_DEFAULT),
            "escolaridade" => $_escolaridade,
            "cidade" => $_cidade,
            "bairro" => $_bairro,
            "genero" => $_genero,
            "data_nascimento" => $_data_nascimento,
            "telefone" => $_telefone,
            "id_escola" => $_id_escola,
        ], $_id);

        if ($sucesso === "sucesso") {
            echo "sucesso ao editar usuario 😁";
        } else {
            header('HTTP/1.1 404 Not Found');
            die("Usuario não encontrado!");
        }
    } 
}