<?php

require_once "Database.php";


class Memoria extends Database {

    public function insertTime($hours, $minutes, $seconds) {
        $query = "INSERT INTO jogo_memoria (ultimo_tempo, id_usuario)
        VALUES  ('$hours:$minutes:$seconds', 1);";

        $this->query($query);

        $query = "UPDATE jogo_memoria jm1
        LEFT JOIN jogo_memoria jm2
        ON jm1.id = jm2.id + 1
        SET jm1.ultimo_tempo = jm1.ultimo_tempo, 
        jm1.melhor_tempo = verificar_tempo(jm1.ultimo_tempo, jm2.melhor_tempo)
        WHERE jm1.id_usuario = 1;";

        $this->query($query);
    }


}