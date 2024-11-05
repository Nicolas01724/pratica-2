<?php
require_once(ROOT_PATH.MODEL_PATH."\Noticias.php");
foreach ($_POST as $key => $value) {
  $name = "_$key";
  global $$name;
  $$name = $value;
}
$noticias = new Noticia();

class Noticia_controller implements Controller {
  public function PUT() {}
  public function POST(): void {
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
      'image/gif'
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
    $caminho = IMG_PATH . "/" . $nome;


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

  public function GET(): array|bool|null {
    $informacoes = ['titulo','conteudo','criado_em','codigo_imagem'];
    if (!assert_array_keys($informacoes, $_GET) || !assert_array_keys(['id'], $_GET)){
      header('Status: 500 Internal Server Error');
      die();
    }

    global $noticias;

    $resposta = $noticias->visualizar_noticia($informacoes, $_GET['id']);

    return $resposta;

  }

  public function DELETE():void {
    if (!assert_array_keys(['id'], $_GET)) {
      header('Status: 500 Internal Server Error');
      die('Id não esta presente! 🤔');
    }

    $id = $_GET['id'];

    global $noticias;

    $imagem = $noticias->visualizar_noticia(["codigo_imagem"], $id);
    $noticias->deletar($id);
    
    if (file_exists($imagem)) {
      if (unlink($imagem)) {
        echo "A imagem foi excluido com sucesso!";
      } else {
        echo "Ocorreu um erro a excluir a imagem!";
      }
    } else {
      echo "A imagem não existe!";
    }
  }
  
}


