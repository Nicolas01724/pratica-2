<?php
require_once(ROOT_PATH.MODEL_PATH."Noticias.php");
foreach ($_POST as $key => $value) {
  $name = "_$key";
  global $$name;
  $$name = $value;
}
$noticias = new Noticia();

class Noticia_controller extends Controller {
  
  public function POST() {
    if (!assert_array_keys(['titulo','conteudo','id_administrador'], $_POST)){
      header('Status: 500 internal server error');
      die();
    }
    
    $tipos_aceitos = [
      'image/png', 
      'image/jpg', 
      'image/jpeg', 
      'image/webp', 
      'image/jfif', 
      'image/gif',
    ];
    
    
    $tamanho_maximo = 500000;
    $arquivo = $_FILES['file'];
    
    $esta_certo = $arquivo['size'] <= $tamanho_maximo && in_array($arquivo['type'], $tipos_aceitos);
    
    // resolver erro
    if (!$esta_certo) {
      header('Status: 500 Internal Server Error');
      die();        
    };
    $nome = time().$arquivo['name'];
    $caminho = ROOT_PATH.'/uploads/'.$nome;

    $sucesso = move_uploaded_file($arquivo['tmp_name'],$caminho);
    
    if (!$sucesso) {
      header('Status: 500 Internal Server Error');
      die();  
    }

    global $noticias;

    $sucesso = $noticias->adicionar($_POST);

    if (!$sucesso) {
      header('Status: 500 Internal Server Error');
      die();  
    }

    echo "Sucesso 😁";
  }

  public function GET() {
    $informacoes = ['titulo','conteudo','criado_em','url_imagem']
    if (!assert_array_keys($informacoes, $_GET) || !assert_array_keys('id', $_GET)){
      header('Status: 500 Internal Server Error');
      die();
    }

    global $noticias;

    $noticias->visualizar_noticia($informacoes, $_GET['id']);

  }

  public function DELETE() {

    if (!assert_array_keys('id', $_DELETE)) {
      header('Status: 500 Internal Server Error');
      die();
    }


    global $noticias;
    $noticias->deletar($_DELETE['id']);
  }

  public function PUT() {
    global $noticias;

    if (!assert_array_keys(['titulo','conteudo','criado_em','url_imagem'], $_PUT)){
      header('Status: 500 Internal Server Error');
      die();
    }

    $noticias->editar($_PUT);
  }
  
}


