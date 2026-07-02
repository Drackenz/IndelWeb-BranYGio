CREATE TABLE usuarios (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    email         VARCHAR(120) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    nombre        VARCHAR(100) NOT NULL,
    ultimo_login  DATETIME NULL,
    creado_en     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE apuntes (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id  INT NOT NULL,
    titulo      VARCHAR(200) NOT NULL,
    materia     VARCHAR(100),
    contenido   TEXT NOT NULL,
    creado_en   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE INDEX idx_apuntes_usuario ON apuntes(usuario_id);


INSERT INTO usuarios (email, password_hash, nombre) VALUES
('maria@indel.edu.sv', '$2y$10$pkVu5UMlCo8WBp2YuQyhxOmTr3KqB.M.SqUWk7VYZyZsHwxhfDQGe', 'María José Hernández');

INSERT INTO apuntes (usuario_id, titulo, materia, contenido) VALUES
(1, 'Repaso Estructura de Datos — Pilas y Colas', 'Programación II', 'Una pila funciona bajo el principio LIFO (último en entrar, primero en salir). Una cola funciona bajo FIFO (primero en entrar, primero en salir).'),
(1, 'SQL — JOINs y subconsultas', 'Bases de Datos I', 'INNER JOIN solo trae las filas que coinciden en ambas tablas. LEFT JOIN trae todas las filas de la tabla izquierda aunque no haya coincidencia.'),
(1, 'CSS Grid — grid-template-areas', 'Diseño Web', 'Permite nombrar las zonas del layout y ubicar los elementos por nombre en vez de por números de columna/fila.');