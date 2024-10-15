<?php

class Noticia extends Database{
  private $table = 'noticia';
  public function __construct(){
    parent::__construct();
  }
  
  public function adicionar(array $valores) {
    
    try {
      $this->criar($this->table, [
        'titulo'=> $valores["titulo"],
        'conteudo'=> $valores["conteudo"],
        'url_imagem'=> $valores["url_imagem"],
        'id_administrador'=> $valores["id_administrador"],
      ]);
    } catch (Exception $e) {
      return false;
    }            
    return true;
  }
  
  public function editar(string $table, array $valores, $id) {
    
    $kao = [];
    
    foreach ($valor as $key => $value) {
      array_push($kao, "$key = $value"); 
    }

    $editar_valores = implode(", ", $kao);

    $raw = "UPDATE $this->table SET $editar_valores WHERE id = $id"

    $this->
  }
}

