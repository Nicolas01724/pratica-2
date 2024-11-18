CREATE DATABASE pratica_nicolas;

USE pratica_nicolas;

CREATE TABLE usuario (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(120) NOT NULL,
    senha VARCHAR(30) NOT NULL
);


CREATE TABLE responsavel (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(45) NOT NULL,
    email VARCHAR(120) NOT NULL,
    senha VARCHAR(30) NOT NULL
);

CREATE TABLE chamado (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao TEXT,
    criticidade VARCHAR(5),
    andamento INT,
    abertura DATE,
    id_usuario INT NOT NULL,
    id_responsavel INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_responsavel) REFERENCES responsavel(id)
);