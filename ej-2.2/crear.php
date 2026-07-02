<?php

require "db.php";

$db = getDB();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];

    if ($nombre == "" || $precio == "" || $stock == "") {
        $error = "Llena todos los campos obligatorios";
    } else {
        $stmt = $db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $descripcion, $precio, $stock]);

        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nuevo producto</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

<h1>Nuevo producto</h1>

<?php if ($error != ""): ?>
    <p class="error"><?= $error ?></p>
<?php endif; ?>

<form method="POST">

    <label>Nombre</label>
    <input type="text" name="nombre" required>

    <label>Descripción</label>
    <textarea name="descripcion"></textarea>

    <label>Precio</label>
    <input type="number" step="0.01" name="precio" required>

    <label>Stock</label>
    <input type="number" name="stock" required>

    <button type="submit" class="btn">Guardar</button>

</form>

<a href="index.php">Volver</a>

</div>

</body>
</html>