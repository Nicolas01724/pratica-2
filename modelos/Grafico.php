<?php

// quais sao os gráficos necessários para criação?

// Gráficos necessários:

// Usuário: escolaridade por bairro
// Usuário: escolaridade por cidade
// Usuário: escolaridade por escola

// Usuário: escolaridade e gênero 
// Usuário: escola e gênero -> model/escola(visualizar_usuarios_genero_escola)
// Usuário: escola e idade;

class Graficos extends Database {
    public function __construct() {
        parent::__construct();  // contruct já exise na database então estamos criando uma classe filha de conexão com o banco
    }

    // visualizar usuários por gênero na escola
    public function ver_generos_por_escola(int $escola_id){
        $query = "SELECT genero AS 'Gênero', COUNT(usuario.id) AS 'Total', escola.nome AS 'Nome da escola', escola.cidade AS 'Cidade da escola', escola.bairro AS 'Bairro da escola' FROM escola INNER JOIN usuario ON escola.id = id_escola WHERE id_escola = '$escola_id' GROUP BY genero;";
        
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }

        print_r($response);
    } 

    // adicionar demais formas de gráfico

}
