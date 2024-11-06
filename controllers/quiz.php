<?php

require_once( ROOT_PATH . MODEL_PATH . "\quiz.php");
require_once( ROOT_PATH . "\controller.php");

$quiz = new Quiz();

class Quiz_controller implements Controller{
    public function POST() {
        
    }
    
    public function GET(){
        include ROOT_PATH . VIEW_PATH . '\quiz\index.php';
        return;
    }
    
    public function PUT(){}
    public function DELETE(){}
    
    public function proximo(){
        if (!assert_array_keys(['questas'], $_GET)) {
            header('HTTP/1.1 500 Internal Server Error');
            die('Oooooops');
        }
        
        foreach ($_GET as $key => $value) {
            $name = "_$key";
            $$name = $value;
        }
        $_questas = explode(",", $_questas);

        
        $questas = $_questas;
        include ROOT_PATH . VIEW_PATH . '\quiz\proximo.php';
    }
    
    public function gerarQuiz() {
        global $quiz;
        if (!assert_array_keys(['id', 'questas', 'resposta', 'escolaridade'], $_GET)) {
            header('HTTP/1.1 500 Internal Server Error');
            die('Oooooops');
        }
        
        foreach ($_GET as $key => $value) {
            $name = "_$key";
            $$name = $value;
        }

        echo is_string($_questas); 

        $_questas = explode(",", $_questas);
        // print_r($_questas);
        // die();


        
        $perguntas = $quiz->listar_perguntas($_escolaridade);
        
        $pergunta_que_vai_voltar = [];
        foreach ($perguntas as $pergunta) {
            if (in_array($pergunta["id"], $_questas)) continue;
            
            $pergunta_que_vai_voltar = $pergunta;
        }
        
        $index = 0;
        $respostas = $quiz->listar_alternativas($pergunta_que_vai_voltar["id"]);
        $pergunta = $pergunta_que_vai_voltar;
        
        $letras = ['A', 'B', 'C'];
        foreach ($respostas as $key => $value) {
            $respostas[$index]["letra"] = $letras[$index];
            $index++;
        }


        array_push($_questas, $pergunta['id']);
        $questas = $_questas;
        
        include ROOT_PATH . VIEW_PATH . '\quiz\questao.php';
    }
    
    public function responder() {
        global $quiz;
        if (!assert_array_keys(['id', 'resposta', 'questas'], $_GET)) {
            header('HTTP/1.1 500 Internal Server Error');
            die('Oooooops');
        }
        foreach ($_GET as $key => $value) {
            $name = "_$key";
            $$name = $value;
        }

<<<<<<< HEAD
        $_questas = explode(",", $_questas);
        
        $pergunta = $quiz->pegar_uma_pergunta($_id);
        $respostas = $quiz->listar_alternativas($_id);
        $resposta = $quiz->pegar_uma_resposta($_resposta);
        $index = 0;
        
        foreach ($respostas as $resposta_unica) {
            $respostas[$index]['tipo'] = '';
            if ($resposta_unica['id'] == $_resposta) {
                if ($resposta_unica['eh_correta']) {
                    $respostas[$index]['tipo'] = 'correto';
                } else {
                    $respostas[$index]['tipo'] = 'errado';
=======
            $respostas = $quiz->listar_alternativas($_id);
            $resposta = $quiz->pegar_uma_resposta($_resposta);

            foreach ($respostas as $resposta_unica) {
                if ($resposta_unica['id'] == $resposta['id']) {
                    if ($resposta_unica['eh_certo']);
>>>>>>> dba5b7a9b9f66c31bbb1718e8da2da50939ff147
                }
            }
            $index++;
        }
        
        $letras = ['A', 'B', 'C'];
        $index = 0;
        foreach ($respostas as $key => $value) {
            $respostas[$index]["letra"] = $letras[$index];
            $index++;
        }
        
        $questas = $_questas;
        
        include ROOT_PATH . VIEW_PATH . '\quiz\resposta.php';
    }
}