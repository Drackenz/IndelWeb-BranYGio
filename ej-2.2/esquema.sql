CREATE DATABASE IF NOT EXISTS indel_inventario
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE indel_inventario;

CREATE TABLE productos(

id INT AUTO_INCREMENT PRIMARY KEY,

nombre VARCHAR(100) NOT NULL,

descripcion TEXT,

precio DECIMAL(10,2) NOT NULL,

stock INT NOT NULL,

creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

INSERT INTO productos(nombre,descripcion,precio,stock)

VALUES

('Cuaderno','100 hojas rayadas',2.50,120),

('Lapicero Azul','Tinta gel',0.75,340),

('Calculadora Científica','Casio FX-82',18.00,15);