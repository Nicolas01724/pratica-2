<?php 

require_once "Database.php";

class Memoria extends Database {
    private $table = "jogo_memoria";
    private $user_table = "usuario";
    // Função para inserir ou atualizar o tempo
    public function insertOrUpdateTime($hour, $minute, $second) {
        
        $time = sprintf('%02d:%02d:%02d', $hour, $minute, $second);
        
        // Query de inserção ou atualização usando ON DUPLICATE KEY UPDATE
        $query = "
        INSERT INTO jogo_memoria (ultimo_tempo, melhor_tempo, id_usuario)
        VALUES ('$time', '$time', 1)
        ON DUPLICATE KEY UPDATE 
            ultimo_tempo = '$time',
            melhor_tempo = CASE
                WHEN melhor_tempo IS NULL THEN '$time'
                WHEN '$time' < melhor_tempo THEN '$time'
                ELSE melhor_tempo
            END;
        ";

        // Executar a query
        $this->query($query);
    }

    public function selectUsers(): array {
        $query = "SELECT * FROM jogo_memoria;";
        $response = $this->query($query);

        $data = array();
        while ($row = $response->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // Função de atualização de tempo (se necessário)
    public function updateTime($hours, $minutes, $seconds, $id) {
        $query = "UPDATE jogo_memoria SET ultimo_tempo = '$hours:$minutes:$seconds' WHERE id_usuario = $id;";
        $this->query($query);
    }
}
?>
