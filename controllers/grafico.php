<?php

require_once ROOT_PATH . MODEL_PATH . "/Grafico.php";

$grafico = new Graficos();

class Grafico_controller implements Controller {
  public function GET() { // ver os dados, logo é necessário colocá-los dentro de uma escolha
    
    include ROOT_PATH . VIEW_PATH . '/adm/adm.html';
  
    
   

  }


  public function POST() {


    include ROOT_PATH . VIEW_PATH . '/adm/estatisticas.php';

    $metodo_um = 'genero';
    $metodo_dois = 'null';
    $id = 1;

    // if (!assert_array_keys(['id','metodo_um', 'metodo_dois'], $_GET)){
    //   header('Status: 500 internal server error');
    //   die("Variaveis erradas!");
    // } 
    

    global $grafico;


    if (isset($_POST['id'])) {
      $id = $POST['id'];
    }
      
    if (isset($_POST['metodo_um'])) {
      $metodo_um = $_POST['metodo_um']; 
    }
    if (isset($_POST['metodo_dois'])) {
      $metodo_dois = $_POST['metodo_dois'];
    }


    echo $metodo_um;
    echo $metodo_dois;


    $resposta = null;
    $info_um = null;
    $info_dois = null;
    

    // Notas para FrontEnd: Mudar de acordo com o requisitado no
    if(($metodo_um == 'escola') && ($metodo_dois == 'null')) {
      //visualizar usuários por escola.
      $resposta = $grafico->visualizar_usuarios_escola($id); // DÚVIDA: Ta certo esse parâmetro? 
      
      $info_um_a = $resposta[0];
      // print_r($info_um);
      $info_dois_a = $resposta[1];

      $info_um = $info_um_a["Total"];
      $info_dois = $info_dois_a["Total"];
  
    } else if(($metodo_um == 'genero') && ($metodo_dois == 'null')) {
      $resposta = $grafico->visualizar_usuarios_genero();
      // print_r($resposta);

      $info_um_a = $resposta[0];
      // print_r($info_um);
      $info_dois_a = $resposta[1];

      $info_um = $info_um_a["Total"];
      $info_dois = $info_dois_a["Total"];
      
      // echo json_encode(['info_um' => $info_um, 'info_dois' => $info_dois]);

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

    include ROOT_PATH . VIEW_PATH . '/adm/gerar-grafico.php';
  }
  public function PUT() {
    die('Error 404 page not found');
  }
  public function DELETE() {
    die('Error 404 page not found');
  }

  // public function mostrar_grafico() {

  //   $metodo_um = 'genero';
  //   $metodo_dois = 'null';
  //   $id = 1;

  //   // if (!assert_array_keys(['id','metodo_um', 'metodo_dois'], $_GET)){
  //   //   header('Status: 500 internal server error');
  //   //   die("Variaveis erradas!");
  //   // } 
    

  //   global $grafico;

  //   try {
  //     if (isset($_GET['id'])) $id = $_GET['id']; 
  //     if (isset($_GET['metodo_um'])) $metodo_um = $_GET['metodo_um']; 
  //     if (isset($_GET['metodo_dois'])) $metodo_dois = $_GET['metodo_dois'];
  //   } catch(Exception $e) {

  //   };


  //   $resposta = null;

  //   $info_um = null;
  //   $info_dois = null;
    

  //   // Notas para FrontEnd: Mudar de acordo com o requisitado no
  //   if(($metodo_um == 'escola') && ($metodo_dois == null)) {
  //     //visualizar usuários por escola.
  //     $resposta = $grafico->visualizar_usuarios_escola($id); // DÚVIDA: Ta certo esse parâmetro? 
  //     return $resposta;
  
  //   } else if(($metodo_um == 'genero') && ($metodo_dois == 'null')) {
  //     $resposta = $grafico->visualizar_usuarios_genero();
  //     // print_r($resposta);

  //     $info_um_a = $resposta[0];
  //     // print_r($info_um);
  //     $info_dois_a = $resposta[1];

  //     $info_um = $info_um_a["Total"];
  //     $info_dois = $info_dois_a["Total"];
      
  //     echo json_encode(['info_um' => $info_um, 'info_dois' => $info_dois]);

  //   } else if(($metodo_um == 'escola') && ($metodo_dois == 'genero') ){
  //     // visualizar usuaário por genero na escola.
  //     $resposta = $grafico->visualizar_usuarios_genero_escola( $id); // DÚVIDA: Ta certo esse parâmetro? 
  //     return $resposta;

  //   } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'bairro')){
  //     // visualizar usuários por escolaridade no bairro.
  //     $resposta = $grafico->visualizar_usuarios_escolaridade_bairro($escolaridade,  $bairro); // DÚVIDA: qual parâmetro colocar?
  //     return $resposta;

  //   } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'cidade')){
  //     //visualizar usuários por escolaridade na cidade
  //     $resposta = $grafico->visualizar_usuarios_escolaridade_cidade($escolaridade, $cidade); // DÚVIDA: qual parâmetro colocar?
  //     return $resposta;
    

  //   } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'escola')){
  //     $resposta = $grafico->visualizar_usuarios_escolaridade_escola($escolaridade, $id); // DÚVIDA: qual parâmetro colocar?
  //     return $resposta;

  //   } else if(($metodo_um == 'escolaridade') && ($metodo_dois == 'genero')){
  //     $resposta = $grafico->visualizar_usuarios_escolaridade_genero($escolaridade, $genero); // DÚVIDA: qual parâmetro colocar?
  //     return $resposta;

  //   } else {
  //     print_r('Algo está errado'); // TIRAR ESSE PRINT E MODIFICAR NA REVISÃO!!!!!
  //   }

  //   include ROOT_PATH . VIEW_PATH . '/adm/estatisticas.php';

  // }
}