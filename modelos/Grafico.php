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


    // SESSÃO POR ESCOLA 

    // visualizar usuários por escola.
    public function visualizar_usuarios_escola(int $escola_id): array {
        $query = "SELECT COUNT(usuario.id) AS 'Total', escola.nome AS 'Nome da escola', cidade.nome AS 'Cidade da escola', bairro.nome AS 'Bairro da escola' FROM usuario 
        INNER JOIN escola ON usuario.id_escola = escola.id INNER JOIN bairro ON escola.id_bairro = bairro.id INNER JOIN cidade ON bairro.id_cidade = cidade.id GROUP BY escola.nome, cidade.nome, bairro.nome;";
    
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        return $response;
    }


    // visualizar usuaário por genero na escola.
    public function visualizar_usuarios_genero_escola(int $id_escola){
        $query = "SELECT genero AS 'Gênero', COUNT(usuario.id) AS 'Total', escola.nome AS 'Nome da escola', escola.cidade AS 'Cidade da escola', escola.bairro AS 'Bairro da escola' FROM usuario 
        INNER JOIN escola ON usuario.id_escola = escola.id INNER JOIN bairro ON escola.id_bairro = bairro.id INNER JOIN cidade ON bairro.id_cidade = cidade.id GROUP BY escola.nome, cidade.nome, bairro.nome;";
       
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        return $response;
    } 

        // SESSÃO POR ESCOLARIDADE
        
    // visualizar usuários por escolaridade no bairro.
    function visualizar_usuarios_escolaridade_bairro(string $escolaridade, string $bairro){
        $query = "SELECT COUNT(usuario.id) AS Total FROM usuario INNER JOIN escola ON escola.id = usuario.id_escola INNER JOIN bairro ON bairro.id = usuario.id_bairro WHERE usuario.escolaridade = '$escolaridade' AND usuario.id_bairro = '$bairro';";
        
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        return $response;
    }

    // visualizar usuarios por escolaridade na escola
    function visualizar_usuarios_escolaridade_escola(string $escolaridade, int $escola_id){
        $query = "SELECT COUNT(usuario.id) AS 'Total',
        escola.nome AS 'Nome da escola',
        cidade.nome AS 'Cidade da escola',
        bairro.nome AS 'Bairro da escola'
        FROM usuario
        INNER JOIN escola ON usuario.id_escola = escola.id
        INNER JOIN bairro ON escola.id_bairro = bairro.id
        INNER JOIN cidade ON bairro.id_cidade = cidade.id
        WHERE usuario.escolaridade = '$escolaridade' AND usuario.id_escola = $escola_id
        GROUP BY escola.nome, cidade.nome, bairro.nome;
        ";
       
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        return $response;
    }
    
    // visualizar usuarios por escolaridade e genero
    function visualizar_usuarios_escolaridade_genero(string $escolaridade, string $genero){
        $query = "SELECT genero AS 'Gênero', COUNT(usuario.id) AS 'Total' FROM usuario WHERE usuario.escolaridade = '$escolaridade' AND usuario.genero = '$genero'";
       
        $result = $this->query($query);
        
        $response = [];

        while ($row = $result->fetch_assoc()){
            $response[] = $row;
        }
        return $response;
    }

}
