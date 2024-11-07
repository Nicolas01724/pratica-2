<?php

require_once "Database.php";


class Memoria extends Database {

    public function insertTime($hours, $minutes, $seconds) {
        $query = "INSERT INTO jogo_memoria (ultimo_tempo, melhor_tempo, id_usuario)
        VALUES  ('$hours:$minutes:$seconds', '$hours:$minutes:$seconds', 1);";

        $this->query($query);
    }

    public function selectUsers(): array {
        $query = "Select * from jogo_memoria;";

        $response = $this->query($query);

        $data = array();

        while ($row = $response->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;

    }

    public function updateTime($hours, $minutes, $seconds) {
        $query = "UPDATE jogo_memoria SET ultimo_tempo = '$hours:$minutes:$seconds' WHERE id_usuario = 1;";

        $this->query($query);

        $query = "UPDATE jogo_memoria SET melhor_tempo = verificar_tempo(ultimo_tempo, melhor_tempo)
        WHERE id_usuario = 1;";

        $this->query($query);
    
    }
}