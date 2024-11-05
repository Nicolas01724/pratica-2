<?php

class Noticia extends Database{
    private $table = 'noticia';
    public function __construct(){
        parent::__construct();
    }

    public function adicionar(array $valores){
        
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
}

