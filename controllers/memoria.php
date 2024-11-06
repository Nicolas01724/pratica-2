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

        if (true){
            $memoria->updateTime($hour, $minute, $second);
        } else {
            $memoria->insertTime($hour, $minute, $second);
        }


    }
    public function DELETE () {}
}