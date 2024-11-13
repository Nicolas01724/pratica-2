<?php

require_once ROOT_PATH . MODEL_PATH . "/Grafico.php";

$grafico = new Graficos();

class Grafico_controller implements Controller {
  public function GET() { // ver os dados, logo é necessário colocá-los dentro de uma escolha
    
    require_once ROOT_PATH . VIEW_PATH . '/adm/adm.html';
  
  }


  public function POST() {


    include ROOT_PATH . VIEW_PATH . '/adm/estatisticas.php';

    $metodo_um = 'genero';
    $metodo_dois = 'null';
    $id = 1;
    $id_escola = 1;
    $id_bairro = 1;
    $escolar_bool = false;

    // if (!assert_array_keys(['id','metodo_um', 'metodo_dois'], $_GET)){
    //   header('Status: 500 internal server error');
    //   die("Variaveis erradas!");
    // } 
    

    global $grafico;

    if (isset($_POST['id'])) {
      $id = $_POST['id']; 
    }
    if (isset($_POST['metodo_um'])) {
      $metodo_um = $_POST['metodo_um']; 
    }
    if (isset($_POST['metodo_dois'])) {
      $metodo_dois = $_POST['metodo_dois'];
    }
    if (isset($_POST['id_escola'])) {
      $id_escola = $_POST['id_escola'];
    }




    $resposta = null;

    $info_um = 0;
    $info_dois = 0;
    $info_tres = 0;

    // Notas para FrontEnd: Mudar de acordo com o requisitado no
    if(($metodo_um == 'escola') && ($metodo_dois == 'null')) {
      //visualizar usuários por escola.
      $resposta = $grafico->visualizar_usuarios_genero_escola($id_escola);
      
      if(isset($resposta[0])) {
        $info_um = $resposta[0];
      }
      // print_r($info_um);
      if (isset($resposta[1])) {
        $info_dois = $resposta[1];
      }
      
      if ($info_um != 0) {
        $info_um = $info_um["Total"];
      }
      if ($info_dois != 0) {
        $info_dois = $info_dois["Total"];
      }
  
    } else if(($metodo_um == 'genero') && ($metodo_dois == 'null')) {
      $resposta = $grafico->visualizar_usuarios_genero();
      // print_r($resposta);
      if(isset($resposta[0])) {
        $info_um = $resposta[0];
      }
      // print_r($info_um);
      if (isset($resposta[1])) {
        $info_dois = $resposta[1];
      }
      
      if ($info_um != 0) {
        $info_um = $info_um["Total"];
      }
      if ($info_dois != 0) {
        $info_dois = $info_dois["Total"];
      }
      
    } else if(($metodo_um == 'bairro') && ($metodo_dois == 'null')){
      // visualizar usuários por escolaridade no bairro.
      $resposta = $grafico->visualizar_usuarios_escolaridade_bairro($id_bairro); // DÚVIDA: qual parâmetro colocar?
      
      $escolar_bool = true;

      if(isset($resposta[0])) {
        $info_um = $resposta[0];
      }
      // print_r($info_um);
      if (isset($resposta[1])) {
        $info_dois = $resposta[1];
      }

      if (isset($resposta[2])) {
        $info_tres = $resposta[2];
      }
      
      if ($info_um != 0) {
        $info_um = $info_um["Total"];
      }

      if ($info_dois != 0) {
        $info_dois = $info_dois["Total"];
      }
      
      if ($info_tres != 0) {
        $info_tres = $info_tres["Total"];
      }
      
    } else if(($metodo_um == 'cidade') && ($metodo_dois == 'null')){
      //visualizar usuários por escolaridade na cidade
      $resposta = $grafico->visualizar_usuarios_escolaridade_cidade($cidade); // DÚVIDA: qual parâmetro colocar?
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
    
    if (!$escolar_bool) {
      include ROOT_PATH . VIEW_PATH . "/adm/gerar-grafico-genero.php";
    } else {
      include ROOT_PATH . VIEW_PATH . "/adm/gerar-grafico-escolaridade.php";
    }

  }
  public function PUT() {
    die('Error 404 page not found');
  }
  public function DELETE() {
    die('Error 404 page not found');
  }

}