<?php

    require_once( ROOT_PATH . MODEL_PATH . "\quiz.php");
    require_once( ROOT_PATH . "\controller.php");

    $quiz = new Quiz();

    session_start();

    class Quiz_controller implements Controller{
        public function GET(){
            global $quiz;

            if (!assert_array_keys(['id', 'r'], $_GET)) {
                die('ooops');
            }

            $id = $_GET['id'];
            $resposta = $_GET['r'];
            
            if ($resposta !== 'null') {

            }

            [$pergunta, $alternativas] = get_quiz($id);
            ?>

            <h1>
                <?= $pergunta["texto_pergunta"] ?>
            </h1>

            <ul>
                <?php foreach($alternativas as $alternativa): ?>
                <li> <?= $alternativa["texto_alternativa"] ?> </li>    
                <?php endforeach ?>
            </ul>

            <?php
        }

        public function POST(){}
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