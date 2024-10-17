<?php

require_once ROOT_PATH . MODEL_PATH . "/Grafico.php";

$grafico = new Graficos();

class Grafico_controller implements Controller {
  public function GET() { // ver os dados, logo é necessário colocá-los dentro de uma escolha
    if (!assert_array_keys(['id', 'metodo'], array: $_GET)){
      header('Status: 500 internal server error');
      die();
    } 

    global $grafico;
  
    $id = $_GET['id'];
    $metodo = $_GET['metodo'];

    $resposta = null;
    // return $grafico->ver_generos_por_escola($_GET['escola_id']);

    switch ($metodo) {
      case 'genero':
        $resposta = $grafico->ver_generos_por_escola($id);
        break;
      
      default:
        # code...
        break;
    }
   
    return $resposta;
    
  }
  
  public function POST() {}
  public function PUT() {}
  public function DELETE() {}
}