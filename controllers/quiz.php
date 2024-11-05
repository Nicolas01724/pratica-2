<?php

    require_once( ROOT_PATH . MODEL_PATH . "\quiz.php");
    require_once( ROOT_PATH . "\controller.php");

    $quiz = new Quiz();

    class Quiz_controller implements Controller{
        public function POST() {
            
        }

        public function GET(){
            global $quiz;
            if (!assert_array_keys(['id', 'questas', 'resposta', 'escolaridade'], $_GET)) {
                header('HTTP/1.1 500 Internal Server Error');
                die('Oooooops');
            }

            foreach ($_GET as $key => $value) {
                $name = "_$key";
                $$name = $value;
            }

            $perguntas = $quiz->listar_perguntas($_escolaridade);

            $pergunta_que_vai_voltar = [];
            foreach ($perguntas as $pergunta) {
                if (in_array($pergunta["id"], explode(",", $_questas))) continue;
                
                $pergunta_que_vai_voltar = $pergunta;
            }
            
            $index = 0;
            $letras = ['A', 'B', 'C'];
            $respostas = $quiz->listar_alternativas($pergunta_que_vai_voltar["id"]);
            
            foreach ($respostas as $key => $value) {
                $respostas[$index]["letra"] = $letras[$index];
                $index++;
            }

            include ROOT_PATH . VIEW_PATH . '\quiz.php';

        }
        public function PUT(){}
        public function DELETE(){}
    }

    function get_quiz($id){
        global $quiz;

        $pergunta_fetch = $quiz->query("SELECT * FROM pergunta_quiz WHERE id = $id");
        if (is_bool($pergunta_fetch)) return;

        $pergunta = $pergunta_fetch->fetch_assoc();
        $pergunta_id = $pergunta["id"];

        $alternativas_fetch = $quiz->query("SELECT * from alternativa_quiz WHERE id_pergunta = '$pergunta_id'");
        $alternativas = [];
        while ($row = $alternativas_fetch->fetch_assoc()) {
            $alternativas[] = $row;
        }

        return [$pergunta, $alternativas];
    }