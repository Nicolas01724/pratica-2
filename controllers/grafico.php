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
    $id = 1;
    $id_escola = 1;
    $id_bairro = 1;
    $id_cidade = 1;
    $escolaridade_bool = false;
    $escolaridade = 'Séries Inicias';

    

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
    if (isset($_POST['escolaridade'])) {
      $escolaridade = $_POST['escolaridade'];
    }
    if (isset($_POST['id_bairro'])) {
      $id_bairro = $_POST['id_bairro'];
    }




    $resposta = null;

    $info_um = 0;
    $info_dois = 0;
    $info_tres = 0;

    // Notas para FrontEnd: Mudar de acordo com o requisitado no
    if($metodo_um == 'escola') {
      //visualizar usuários por escola.
      $resposta = $grafico->visualizar_usuarios_genero_escola($id_escola);
      
      foreach ($resposta as $resultado) {
        if ($resultado['Gênero'] === 'Feminino') {
          $info_dois = $resultado['Total'];
        } else if ($resultado['Gênero'] === 'Masculino') {
          $info_um = $resultado['Total'];
        }
      }
  
    } else if($metodo_um == 'genero') {
      $resposta = $grafico->visualizar_usuarios_genero();
      // print_r($resposta);
      foreach ($resposta as $resultado) {
        if ($resultado['Gênero'] === 'Feminino') {
          $info_dois = $resultado['Total'];
        } else if ($resultado['Gênero'] === 'Masculino') {
          $info_um = $resultado['Total'];
        }
      }
      
    } else if($metodo_um == 'bairro'){
      // visualizar usuários por escolaridade no bairro.
      $resposta = $grafico->visualizar_usuarios_escolaridade_bairro($id_bairro); // DÚVIDA: qual parâmetro colocar?
      
      $escolaridade_bool = true;

      foreach ($resposta as $info) {
        if ($info['escolaridade'] === 'Séries Iniciais') {
            $info_um = $info['Total'];
        } elseif ($info['escolaridade'] === 'Séries Finais') {
            $info_dois = $info['Total'];
        } elseif ($info['escolaridade'] === 'Ensino Médio') {
            $info_tres = $info['Total'];
        }
      }
      
    } else if($metodo_um == 'cidade'){
      //visualizar usuários por escolaridade na cidade
      $resposta = $grafico->visualizar_usuarios_escolaridade_cidade($id_cidade); // DÚVIDA: qual parâmetro colocar?
      
      $escolaridade_bool = true;

      foreach ($resposta as $info) {
        if ($info['escolaridade'] === 'Séries Iniciais') {
            $info_um = $info['Total'];
        } elseif ($info['escolaridade'] === 'Séries Finais') {
            $info_dois = $info['Total'];
        } elseif ($info['escolaridade'] === 'Ensino Médio') {
            $info_tres = $info['Total'];
        }
      }
    
    } else if($metodo_um == 'escolaridadePorEscola'){
      $resposta = $grafico->visualizar_usuarios_escolaridade_escola($id_escola); // DÚVIDA: qual parâmetro colocar?
      
      $escolaridade_bool = true;

      foreach ($resposta as $info) {
        if ($info['escolaridade'] === 'Séries Iniciais') {
            $info_um = $info['Total'];
        } else if ($info['escolaridade'] === 'Séries Finais') {
            $info_dois = $info['Total'];
        } else if ($info['escolaridade'] === 'Ensino Médio') {
            $info_tres = $info['Total'];
        }
      }

    } else if(($metodo_um == 'escolaridadeGenero')){
      $resposta = $grafico->visualizar_usuarios_escolaridade_genero($escolaridade); // DÚVIDA: qual parâmetro colocar?

      foreach ($resposta as $resultado) {
        if ($resultado['Gênero'] === 'Feminino') {
          $info_dois = $resultado['Total'];
        } else if ($resultado['Gênero'] === 'Masculino') {
          $info_um = $resultado['Total'];
        }
      }

    } else {
      print_r('Algo está errado'); // TIRAR ESSE PRINT E MODIFICAR NA REVISÃO!!!!!
    }
    
    if (!$escolaridade_bool) {
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