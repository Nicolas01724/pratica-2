<?php


class Quiz extends Database{

    private $table_pergunta = "pergunta_quiz";
    private $table_alternativa = "alternativa_quiz";
    
    public function listar_perguntas(int $escolaridade): array{
        $table = $this->table_pergunta;
        $resultado = $this->query( 
            "SELECT texto_pergunta AS 'pergunta', id
            FROM $table
            WHERE id_quiz = $escolaridade
            ORDER BY RAND();
        ");
        
        // $resposta = $this->query($resultado);
        $data = array();
        
        while($row = $resultado->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
    public function listar_alternativas(string|int $question_id): array{
        $table = $this->table_alternativa;
        $resposta = $this->query(
            "SELECT *
            FROM $table
            WHERE id_pergunta = '$question_id'
            ORDER BY RAND();
        ");
        
        $data = [];
        while($row = $resposta->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function pegar_uma_pergunta(string|int $id) {
        $table = $this->table_pergunta;
        $resultado = $this->visualizar_um($table, ["id", "texto_pergunta", "codigo_imagem", "id_quiz"], $id);
        return $resultado;
    }

    public function pegar_uma_resposta(string|int $id) {
        $table = $this->table_alternativa;
        $resultado = $this->visualizar_um($table, ["id", "texto_alternativa", "eh_correta", "id_pergunta"], $id);
        return $resultado;
    }
}