<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $producto ? "Editar producto" : "Nuevo producto" ?></title>
<link rel="stylesheet" href="public/styles.css">
</head>
<body>

<div class="contenedor">

<h1><?= $producto ? "Editar producto" : "Nuevo producto" ?></h1>

<form method="POST">

<label>Nombre</label>
<input type="text" name="nombre" value="<?= $producto ? htmlspecialchars($producto["nombre"]) : "" ?>" required>

<label>Descripción</label>
<textarea name="descripcion"><?= $producto ? htmlspecialchars($producto["descripcion"]) : "" ?></textarea>

<label>Precio</label>
<input type="number" step="0.01" name="precio" value="<?= $producto ? $producto["precio"] : "" ?>" required>

<label>Stock</label>
<input type="number" name="stock" value="<?= $producto ? $producto["stock"] : "" ?>" required>

<button type="submit" class="btn"><?= $producto ? "Actualizar" : "Guardar" ?></button>

</form>

<a href="index.php?accion=index">Volver</a>

</div>

</body>
</html>