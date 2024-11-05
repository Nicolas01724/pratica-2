<?php 
require_once ROOT_PATH . MODEL_PATH . "/Escola.php";
$escola = new Escola();


class Escola_controller extends Controller {
    
    public function POST() {
        if (!assert_array_keys(["nome", "cidade", "bairro", "rua", "numero_escola"], $_POST)){
            header('Status: 500 internal server error');
            die();
           
        }
        global $escola;
        foreach ($_POST as $key => $value) {
            $name = "_$key";
            global $$name;
            $$name = $value;
        }
        $inclui = $escola->adicionar([
        "nome" => $_nome,
        "cidade" => $_cidade,
        "bairro" => $_bairro,
        "rua" => $_rua,
        "numero_escola" => $_numero_escola
        ]);

        if(!$inclui === true){
            header('Status: 500 internal server error');
            die("Dados invalidos");
        }
        echo"Sucesso";
    }
    
    public function DELETE() {
        $id = $_GET['id'];
        global $escola;
        $sucesso = $escola->deletar($id);

        if ($sucesso === "sucesso") {
            echo "Sucesso ao deletar escola $id";
        } else {
            header('Status: 500 internal server error');
            die("Erro ao deletar");
        }
    }

    public function PUT(){
        $id = $_GET["id"];
        global $escola;
        foreach ($_GET as $key => $value) {
            $name = "_$key";
            global $$name;
            $$name = $value;
        }



        $escola->atualizar($_GET, $id);
        
    }

    public function GET(){
        global $escola;
        print_r($escola->listar());
    }
}   

