<?php

require_once ROOT_PATH . MODEL_PATH . "/Grafico.php";

$grafico = new Graficos();

class Grafico_controller extends Controller {
    public function GET() {
        if (!assert_array_keys(['id_escola'], $_GET)){
            header('Status: 500 internal server error');
            die();
          }


    }


}