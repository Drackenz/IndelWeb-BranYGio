<?php

require "db.php";

$db = getDB();

$productos = $db->query("SELECT * FROM productos ORDER BY id DESC")->fetchAll();

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Inventario</title>

<link rel="stylesheet" href="styles.css">

</head>

<body>

<div class="contenedor">

<h1>Inventario de Productos</h1>

<a href="crear.php" class="btn">

+ Nuevo Producto

</a>

<table>

<thead>

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Descripción</th>

<th>Precio</th>

<th>Stock</th>

<th>Editar</th>

<th>Eliminar</th>

</tr>

</thead>

<tbody>

<?php foreach($productos as $producto): ?>

<tr>

<td><?= $producto["id"] ?></td>

<td><?= htmlspecialchars($producto["nombre"]) ?></td>

<td><?= htmlspecialchars($producto["descripcion"]) ?></td>

<td>$<?= number_format($producto["precio"],2) ?></td>

<td><?= $producto["stock"] ?></td>

<td>

<a

class="editar"

href="editar.php?id=<?= $producto["id"] ?>">

Editar

</a>

</td>

<td>

<a

class="eliminar"

href="eliminar.php?id=<?= $producto["id"] ?>"

onclick="return confirm('¿Eliminar este producto?')">

Eliminar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</body>

</html>