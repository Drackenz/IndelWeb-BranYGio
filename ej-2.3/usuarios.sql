CREATE TABLE usuarios (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    email         VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    nombre        VARCHAR(100) NOT NULL,
    ultimo_login  DATETIME NULL,
    creado_en     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);