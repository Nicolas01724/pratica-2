<?php

class Noticia extends Database{
  private $table = 'noticia';
  public function __construct(){
    parent::__construct();
  }
  
  public function adicionar(array $valores): bool {
    
    try {
      $this->criar($this->table, [
        'titulo'=> $valores["titulo"],
        'conteudo'=> $valores["conteudo"],
        'codigo_imagem'=> $valores["codigo_imagem"],
        'id_administrador'=> $valores["id_administrador"],
      ]);
    } catch (Exception $e) {
      return false;
    }            
    return true;
  }
  
  public function modificar(array $valores, int $id): void {
    
    $raw = [];
    
    foreach ($valores as $key => $value) {
      array_push($raw, "$key = '$value'"); 
    }

    $editar_valores = implode(", ", $raw);

    $query = "UPDATE $this->table SET $editar_valores WHERE id = $id";

    $this->query($query);
  }

  public function deletar(int $id): void {
    $query = "DELETE FROM $this->table WHERE id = $id";

    $this->query($query);
  }

  public function visualizar_noticia(array $informacoes, int $id): array|bool|null {

    $valores = implode(", ", $informacoes);

    $query = "SELECT $valores, administrador.nome
    FROM $this->table
    INNER JOIN administrador
    ON administrador.id = id_administrador
    WHERE noticia.id = $id";

    $dados = $this->query($query);
    return $dados->fetch_assoc();
  }


}

