<?php

require "db.php";

$db = getDB();
$id = $_GET["id"];

$stmt = $db->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$producto = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    $stmt = $db->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?");
    $stmt->execute([$nombre, $descripcion, $precio, $stock, $id]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Editar producto</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

<h1>Editar producto</h1>

<form method="POST">

    <label>Nombre</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($producto["nombre"]) ?>" required>

    <label>Descripción</label>
    <textarea name="descripcion"><?= htmlspecialchars($producto["descripcion"]) ?></textarea>

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" value="<?= $producto["precio"] ?>" required>

    <label>Stock</label>
    <input type="number" name="stock" value="<?= $producto["stock"] ?>" required>

    <button type="submit" class="btn">Actualizar</button>

</form>

<a href="index.php">Volver</a>

</div>

</body>
</html>