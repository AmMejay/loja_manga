DROP DATABASE IF EXISTS loja_manga;
CREATE DATABASE loja_manga;
USE loja_manga;

CREATE TABLE manga (
    id_manga INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    volume INT NOT NULL,
    genero VARCHAR(60) NOT NULL,
    descricao VARCHAR(60) NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);

CREATE TABLE loja (
    id_loja INT AUTO_INCREMENT PRIMARY KEY,
    lugar VARCHAR(60) NOT NULL
);

CREATE TABLE pedido (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_manga INT NOT NULL,
    id_loja INT NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,

    FOREIGN KEY (id_manga) REFERENCES manga(id_manga),
    FOREIGN KEY (id_loja) REFERENCES loja(id_loja)
);

-- Mangás
INSERT INTO manga (nome, volume, genero, descricao, preco) VALUES
('One Piece', 1, 'Aventura', 'Inicio da jornada de Luffy', 39.90),
('Naruto', 1, 'Acao', 'Naruto busca ser Hokage', 34.90),
('Attack on Titan', 1, 'Acao', 'Humanidade contra os titas', 44.90),
('Death Note', 1, 'Suspense', 'Caderno com poder mortal', 42.50),
('Demon Slayer', 1, 'Fantasia', 'Cacadores de demonios', 37.90);

-- Lojas
INSERT INTO loja (lugar) VALUES
('Canoinhas - SC'),
('Rio do Sul - SC'),
('Joinville - SC');

-- Pedidos
INSERT INTO pedido (id_manga, id_loja, ativo) VALUES
(1, 1, TRUE),
(2, 1, FALSE),
(3, 2, TRUE),
(4, 3, TRUE),
(5, 2, FALSE);

-- Consultas para teste
SELECT * FROM manga;
SELECT * FROM loja;
SELECT * FROM pedido;

-- Join para visualizar os pedidos
SELECT
    p.id_pedido,
    m.nome AS manga,
    l.lugar AS loja,
    p.ativo
FROM pedido p
INNER JOIN manga m ON p.id_manga = m.id_manga
INNER JOIN loja l ON p.id_loja = l.id_loja;