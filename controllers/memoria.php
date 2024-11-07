<?php 

require_once( ROOT_PATH . "\controller.php");
require_once( ROOT_PATH . MODEL_PATH . "\Memoria.php");

$memoria = new Memoria();

class Memoria_controller implements Controller {
    public function GET () {
        include ROOT_PATH . VIEW_PATH . "/memoria.html";
    }
    public function PUT () {}
    public function POST () {

        global $memoria;
        $time = $_POST['tempo'];

        $hour = 00;
        $minute = 00;
        $second = $time;
        while ($second >= 60) {
            $second -= 60;
            $minute += 1;
        }

        print_r($_POST);

        $time = sprintf('%02d:%02d:%02d', $hour, $minute, $second);

        if (is_null($_POST['usuario']) || empty($_POST['usuario']) || $_POST['usuario'] == 'null') {
            print_r("Nenhum usuario informado");
            $memoria->insertOrUpdateTime($hour, $minute, $second);
            return;
        }
        $usuario = $_POST['usuario'];   
        $memoria->updateTime($hour, $minute, $second, $usuario);
        return;

    }
    public function DELETE () {}
}