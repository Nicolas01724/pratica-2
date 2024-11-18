

CREATE DATABASE pratica_nicolas;

USE pratica_nicolas;

CREATE TABLE usuario (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(120) NOT NULL,
    telefone VARCHAR(13) NOT NULL
);


CREATE TABLE responsavel (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(120) NOT NULL,
	telefone VARCHAR(13) NOT NULL
);

CREATE TABLE chamado (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT,
    criticidade varchar(5),
    andamento INT,
    abertura DATE,
    id_responsavel INT NOT NULL,
    foreign key (id_responsavel) REFERENCES responsavel(id)
);

select * FROM USUARIO;
select * from responsavel;
SELECT * FROM responsavel;

