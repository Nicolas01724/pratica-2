<?php


class Quiz extends Database{

    private $table_pergunta = "pergunta_quiz";
    private $table_alternativa = "alternativa_quiz";
    private $table_ranking = "ranking";
    private $table_quiz = "quiz";
    private $table_usuario = "usuario";
    
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
            WHERE id_pergunta = '$question_id';
        ");
        
        $data = [];
        while($row = $resposta->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function pegar_uma_pergunta(string|int $id) {
        $table = $this->table_pergunta;
        $tipos = [
             3 => "Ensino Médio", 
             2 => "Séries Finais",
             1 =>"Séries Iniciais",
        ];
      
        $_SESSION['escolaridade'] = 3;
        $tipo_usuario = $_SESSION['escolaridade'];
        $tipo = $tipos[$tipo_usuario];
        
        $resposta = $this->query("SELECT pergunta_quiz.id as id, texto_pergunta from pergunta_quiz INNER JOIN quiz on quiz.id = id_quiz WHERE escolaridade = '$tipo' ;");

        $data = [];
        if ($resposta->num_rows > 1) {
            while($row = $resposta->fetch_assoc()) {
                $data[] = $row;
            }
        } else {
            $data = $resposta->fetch_assoc();
        }

        return $data;
    }

    public function pegar_uma_resposta(string|int $id) {
        $table = $this->table_alternativa;
        $resultado = $this->visualizar_um($table, ["id", "texto_alternativa", "eh_correta", "id_pergunta"], $id);
        return $resultado;
    }

    public function pegar_id_quiz($id){
        $table = $this->table_quiz;
        $id_quiz = $this->query("SELECT id 
        FROM $table
        WHERE id = '$id'");
        return $id_quiz;
    }

    public function pegar_id_usuario($id){
        $table = $this->table_usuario;
        $id_usuario = $this->query("SELECT id
        FROM $table
        WHERE id = '$id'");
        return $id_usuario;
    }

    public function inserir_ranking($pontuacao){
        $id_usuario = $this->pegar_id_usuario();
        $id_quiz = $this->pegar_id_quiz();
        

        $table = $this->table_ranking;
        $resultado = $this->query("INSERT INTO $table 
        (pontuacao, id_quiz, id_usuario)
        VALUES
        ($pontuacao, $id_quiz, $id_usuario)");
        return $resultado;
    }

    public function pegar_pontuacao(string|int $id) {
        $table = $this->table_ranking;
        $resultado = $this->query("SELECT * 
        FROM $table 
        INNER JOIN usuario 
        WHERE id_usuario = '$id'");
        return $resultado;
    }


}