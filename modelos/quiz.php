<?php


class Quiz extends Database{

    private $table_pergunta = "pergunta_quiz";
    private $table_alternativa = "alternativa_quiz";
    
    public function listar_perguntas(int $id): array{
        $table = $this->table_pergunta;
        $resultado = $this->query( 
            "SELECT texto_pergunta AS 'Pergunta'
            FROM $table
            WHERE id_quiz = $id
            ORDER BY RAND();
        ");
        
        $resposta = $this->query($resultado);
        $data = array();
        
        while($row = $resposta->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
    public function listar_alternativas(): array{
        $table = $this->table_alternativa;
        $resultado = $this->query("SELECT *
        FROM $table
        ORDER BY RAND();");
        $resposta = $this->query($resultado);
        $data = array();
        while($row = $resposta->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
}