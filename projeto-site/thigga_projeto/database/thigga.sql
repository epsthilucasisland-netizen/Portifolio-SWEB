CREATE DATABASE IF NOT EXISTS thigga
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE thigga;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT
);


CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    cidade VARCHAR(100),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL DEFAULT 0,
    imagem VARCHAR(255),
    categoria_id INT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias(id)
        ON DELETE SET NULL
);


INSERT INTO usuarios (nome,email,senha) VALUES
('Administrador','admin@thigga.com','123456');

INSERT INTO categorias (nome,descricao) VALUES
('Academia','Equipamentos e vestuário para treinos de alta performance.'),
('Basquete','Bolas, camisetas e acessórios para jogadores.'),
('Corrida','Artigos desenvolvidos para velocidade e resistência.'),
('Acessórios','Itens esportivos essenciais para qualquer modalidade.');

INSERT INTO clientes (nome,email,telefone,cidade) VALUES
('Lucas Souza','lucas@email.com','11999999999','Jundiaí'),
('Thiago Maia','thiago@email.com','11988888888','Jundiaí');

INSERT INTO produtos
(nome,descricao,preco,estoque,imagem,categoria_id)
VALUES
('Camiseta THIGGA Performance',
'Tecido dry-fit respirável para treinos intensos.',
89.90,20,'camiseta.jpeg',1),

('Boné THIGGA',
'Boné esportivo com ajuste traseiro.',
59.90,18,'boné.jpeg',4),

('Bolsa Esportiva Dragon',
'Bolsa resistente para academia e viagens.',
149.90,10,'borsa.jpeg',4),

('Luva Grip Pro',
'Luva com aderência para musculação.',
79.90,15,'luvagay.jpeg',1),

('Bola NGGA Basketball',
'Bola oficial para quadras indoor e outdoor.',
129.90,12,'nggaball.jpeg',2),

('Squeeze THIGGA',
'Garrafa de 750ml livre de BPA.',
39.90,30,'squeezito.jpeg',4);