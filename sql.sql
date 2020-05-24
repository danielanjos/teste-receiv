CREATE DATABASE newDatabase;
use newDatabase;

CREATE TABLE colaboradores(
	id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    login VARCHAR(30) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    fl_administrador BIT  NOT NULL
);

INSERT INTO colaboradores (nome, login, email, senha, fl_administrador) VALUES ('Administrador', 'admin', 'admin@email.com', '123', 1);

CREATE TABLE tipos_pessoa(
	id INT PRIMARY KEY,
    descricao VARCHAR(10) NOT NULL
);

INSERT INTO tipos_pessoa (id, descricao) VALUES (1, 'Física'), (2, 'Jurídica');

CREATE TABLE clientes(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_tipo_pessoa INT,
    cpf_cnpj VARCHAR(14) NOT NULL,
    nome VARCHAR(255) NOT NULL,
    dt_nascimento DATE NOT NULL,
    CONSTRAINT fk_clientes_tipo_pessoa FOREIGN KEY (id_tipo_pessoa) REFERENCES tipos_pessoa(id)
);

CREATE TABLE tipos_enderecos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(30) NOT NULL
);

INSERT INTO tipos_enderecos (id, descricao) VALUES (1, 'Residencial'), (2, 'Comercial'), (3, 'Outro');

CREATE TABLE enderecos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_tipo_endereco INT NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    numero INT NOT NULL,
    id_cliente INT NOT NULL,
    fl_principal BIT NOT NULL,
    CONSTRAINT fk_endereco_tipo FOREIGN KEY (id_tipo_endereco) REFERENCES tipos_enderecos(id),
    CONSTRAINT fk_endereco_cliente FOREIGN KEY (id_cliente) REFERENCES clientes(id)
);


CREATE TABLE tipos_titulos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(255) NOT NULL
);

INSERT INTO tipos_titulos (id, descricao) VALUES (1, 'Prefixado'), (2, 'Pós-fixado'), (3, 'Híbrido');

CREATE TABLE moedas(
	id INT PRIMARY KEY AUTO_INCREMENT,
    codigo VARCHAR(10) NOT NULL
);

INSERT INTO moedas VALUES (1, 'BRL');

CREATE TABLE status_titulos(
	id INT PRIMARY KEY,
    descricao VARCHAR(50)
);

INSERT INTO status_titulos (id, descricao) VALUES (1, 'Quitado'), (2, 'Vigente');

CREATE TABLE titulos(
	id INT PRIMARY KEY AUTO_INCREMENT,
    id_tipo_titulo INT NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    valor DOUBLE(10,2) NOT NULL,
    dt_criacao DATE NOT NULL,
    dt_vencimento DATE NOT NULL,
    id_cliente INT NOT NULL,
    id_status INT NOT NULL,
    dt_quitacao DATETIME,
    valor_pago DOUBLE(10,2) DEFAULT 0,
    saldo_devedor DOUBLE(10,2) NOT NULL,
    updated DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_moeda INT NOT NULL,
    CONSTRAINT fk_titulo_tipo FOREIGN KEY (id_tipo_titulo) REFERENCES tipos_titulos(id),
    CONSTRAINT fk_titulo_cliente FOREIGN KEY (id_cliente) REFERENCES clientes(id),
    CONSTRAINT fk_titulo_moeda FOREIGN KEY (id_moeda) REFERENCES moedas(id),
    CONSTRAINT fk_titulo_status FOREIGN KEY (id_status) REFERENCES status_titulos(id)
);

#drop database newDatabase;