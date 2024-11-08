<?php

require_once ROOT_PATH . MODEL_PATH . "/Grafico.php";

$grafico = new Graficos();

class Grafico_controller implements Controller {
  public function GET() { // ver os dados, logo é necessário colocá-los dentro de uma escolha
    if (!assert_array_keys(['id','metodo_um', 'metodo_dois'], $_GET)){
      header('Status: 500 internal server error');
      die("Variaveis erradas!");
    } 
    
    global $grafico;
  
    // $escolaridade = $_GET['escolaridade']; // DÚVIDA: como usamos os métodos em baixo, não são necessários esses 3, certo?
    // $bairro = $_GET['bairro'];
    // $cidade = $_GET['cidade'];
    // $genero = $_GET['genero'];
    // $id = $_GET['escola_id'];
    $id = $_GET['id'];

    $metodo_um = $_GET['metodo_um'];
    $metodo_dois = $_GET['metodo_dois'];

    $resposta = null;
    

    // Notas para FrontEnd: Mudar de acordo com o requisitado no
    if(($metodo_um == 'escola') && ($metodo_dois == null)) {
      //visualizar usuários por escola.
      $resposta = $grafico->visualizar_usuarios_escola($id); // DÚVIDA: Ta certo esse parâmetro? 
      return $resposta;
  
    } else if(($metodo_um == 'genero') && ($metodo_dois == null)) {
      $resposta = $grafico->visualizar_usuarios_genero();
      echo($resposta);
      return $resposta;
    } else if(($metodo_um == 'escola') && ($metodo_dois == 'genero') ){
      // visualizar usuaário por genero na escola.
      $resposta = $grafico->visualizar_usuarios_genero_escola( $id); // DÚVIDA: Ta certo esse parâmetro? 
      return $resposta;

    } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'bairro')){
      // visualizar usuários por escolaridade no bairro.
      $resposta = $grafico->visualizar_usuarios_escolaridade_bairro($escolaridade,  $bairro); // DÚVIDA: qual parâmetro colocar?
      return $resposta;

    } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'cidade')){
      //visualizar usuários por escolaridade na cidade
      $resposta = $grafico->visualizar_usuarios_escolaridade_cidade($escolaridade, $cidade); // DÚVIDA: qual parâmetro colocar?
      return $resposta;
    

    } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'escola')){
      $resposta = $grafico->visualizar_usuarios_escolaridade_escola($escolaridade, $id); // DÚVIDA: qual parâmetro colocar?
      return $resposta;

    } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'genero')){
      $resposta = $grafico->visualizar_usuarios_escolaridade_genero($escolaridade, $genero); // DÚVIDA: qual parâmetro colocar?
      return $resposta;

    } else {
      print_r('Algo está errado'); // TIRAR ESSE PRINT E MODIFICAR NA REVISÃO!!!!!
    }
  }


  public function POST() {
    die('Error 404 page not found');
  }
  public function PUT() {
    die('Error 404 page not found');
  }
  public function DELETE() {
    die('Error 404 page not found');
  }
}