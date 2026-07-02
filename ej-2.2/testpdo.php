<?php

echo "<h2>Prueba PDO</h2>";

echo "PHP: " . phpversion() . "<br><br>";

echo "PDO cargado: ";
var_dump(extension_loaded('pdo'));

echo "<br>";

echo "PDO MySQL cargado: ";
var_dump(extension_loaded('pdo_mysql'));

echo "<br><br>";

try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;port=3307;dbname=indel_inventario;charset=utf8mb4",
        "root",
        ""
    );

    echo "<h3 style='color:green'>Conexión exitosa</h3>";

} catch (PDOException $e) {

    echo "<h3 style='color:red'>Error:</h3>";
    echo $e->getMessage();

}