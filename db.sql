CREATE DATABASE nicolassolicitacoes;
USE nicolassolicitacoes;


CREATE TABLE Clientes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(150) NOT NULL,
    CPF CHAR(11) UNIQUE NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Telefone VARCHAR(15) NOT NULL
);





CREATE TABLE Funcionarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(150) NOT NULL,
    Cargo VARCHAR(50),
    Email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE Solicitacoes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    IDcliente INT NOT NULL,
    Descricao TEXT NOT NULL,
    Urgencia ENUM('baixa', 'média', 'alta') NOT NULL,
    pendencia ENUM('pendente', 'em andamento', 'finalizada') NOT NULL DEFAULT 'pendente',
    DataAbertura DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    IDfuncionario INT DEFAULT NULL,
    FOREIGN KEY (IDCliente) REFERENCES Clientes(ID),
    FOREIGN KEY (IDfuncionario) REFERENCES Funcionarios(ID)
);
