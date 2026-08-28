CREATE DATABASE thigga;
USE thigga;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nome, email, senha)
VALUES (
    'Administrador',
    'admin@thigga.com',
    '123456'
);

CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    descricao TEXT
);

INSERT INTO categorias (nome, descricao) VALUES
('Roupas', 'Camisetas, shorts e moletons'),
('Calçados', 'Tênis esportivos'),
('Acessórios', 'Bonés, mochilas e meias'),
('Equipamentos', 'Bolas e itens esportivos');

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    imagem VARCHAR(255),
    categoria_id INT,
    FOREIGN KEY (categoria_id)
        REFERENCES categorias(id)
        ON DELETE SET NULL
);

INSERT INTO produtos
(nome, descricao, preco, estoque, imagem, categoria_id)
VALUES
('Camiseta Dragão', 'Camiseta esportiva premium', 89.90, 25, 'camiseta.jpg', 1),
('Tênis Phoenix', 'Tênis para corrida', 249.90, 12, 'tenis.jpg', 2),
('Boné THIGGA', 'Boné street esportivo', 59.90, 30, 'bone.jpg', 3);

-- =========================
-- TABELA DE CLIENTES
-- =========================
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    email VARCHAR(120),
    telefone VARCHAR(20),
    cidade VARCHAR(80)
);

INSERT INTO clientes
(nome, email, telefone, cidade)
VALUES
('Lucas Souza', 'lucas@email.com', '(11)99999-9999', 'Várzea Paulista'),
('Ana Lima', 'ana@email.com', '(11)98888-8888', 'Jundiaí');