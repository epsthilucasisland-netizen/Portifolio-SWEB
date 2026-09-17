

CREATE DATABASE IF NOT EXISTS thigga
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE thigga;




CREATE TABLE IF NOT EXISTS usuarios (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    senha VARCHAR(255) NOT NULL

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;



CREATE TABLE IF NOT EXISTS categorias (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    descricao TEXT

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS produtos (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(150) NOT NULL,

    descricao TEXT,

    preco DECIMAL(10,2) NOT NULL DEFAULT 0.00,

    estoque INT NOT NULL DEFAULT 0,

    imagem VARCHAR(255),

    categoria_id INT,

    CONSTRAINT fk_produto_categoria
        FOREIGN KEY (categoria_id)
        REFERENCES categorias(id)
        ON DELETE SET NULL
        ON UPDATE CASCADE

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;



CREATE TABLE IF NOT EXISTS clientes (

    id INT AUTO_INCREMENT PRIMARY KEY,

    nome VARCHAR(100) NOT NULL,

    email VARCHAR(150) NOT NULL UNIQUE,

    senha VARCHAR(255) NOT NULL,

    telefone VARCHAR(30),

    cidade VARCHAR(100),

    endereco VARCHAR(255)

) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;




INSERT INTO usuarios
(
    nome,
    email,
    senha
)
VALUES
(
    'Administrador THIGGA',
    'admin@thigga.com',
    'admin123'
);


INSERT INTO categorias
(
    nome,
    descricao
)
VALUES

(
    'Roupas',
    'Roupas esportivas para treino, academia e atividades físicas.'
),

(
    'Calçados',
    'Calçados desenvolvidos para corrida, treino e prática esportiva.'
),

(
    'Acessórios',
    'Acessórios esportivos para complementar seus treinos.'
),

(
    'Equipamentos',
    'Equipamentos para diferentes modalidades esportivas.'
);




INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Camiseta THIGGA Performance',
    'Camiseta esportiva leve e confortável para treinos e atividades físicas.',
    79.90,
    20,
    'camiseta.jpeg',
    1
);




INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Tênis Phoenix',
    'Tênis esportivo desenvolvido para corrida, treino e atividades físicas.',
    249.90,
    10,
    'penis.jpeg',
    2
);



INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Boné THIGGA',
    'Boné esportivo com design moderno inspirado na identidade THIGGA.',
    59.90,
    15,
    'bone.jpeg',
    3
);



INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Squeeze THIGGA',
    'Garrafa esportiva ideal para academia, corrida e atividades físicas.',
    39.90,
    25,
    'squeezito.jpeg',
    3
);




INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Luva Esportiva THIGGA',
    'Luva esportiva para proporcionar conforto e proteção durante os treinos.',
    69.90,
    12,
    'luvagay.jpeg',
    3
);





INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Bolsa Esportiva THIGGA',
    'Bolsa esportiva para transportar roupas, acessórios e equipamentos.',
    119.90,
    8,
    'borsa.jpeg',
    3
);




INSERT INTO produtos
(
    nome,
    descricao,
    preco,
    estoque,
    imagem,
    categoria_id
)
VALUES
(
    'Bola de Basquete THIGGA',
    'Bola de basquete desenvolvida para treinos e partidas.',
    129.90,
    10,
    'nggaball.jpeg',
    4
);