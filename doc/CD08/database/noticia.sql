CREATE TABLE noticia(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    texto TEXT,
    data TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    autor VARCHAR(255),
    imagem BLOB
);
INSERT INTO noticia(titulo, descricao, texto, autor, imagem)
VALUES ('Copa do Brasil', 'São Paulo', 'São Paulo', 'Pablo', 'C:\Users\pablo\Downloads\sao-paulo.png');

select * from noticia
