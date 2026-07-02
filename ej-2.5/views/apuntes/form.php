<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $apunte ? "Editar apunte" : "Nuevo apunte" ?></title>
<link rel="stylesheet" href="public/styles.css">
</head>
<body>

<div class="contenedor">

<h1><?= $apunte ? "Editar apunte" : "Nuevo apunte" ?></h1>

<form method="POST">

<label>Título</label>
<input type="text" name="titulo" value="<?= $apunte ? htmlspecialchars($apunte["titulo"]) : "" ?>" required>

<label>Materia</label>
<input type="text" name="materia" value="<?= $apunte ? htmlspecialchars($apunte["materia"]) : "" ?>">

<label>Contenido</label>
<textarea name="contenido" id="contenido" rows="8"><?= $apunte ? htmlspecialchars($apunte["contenido"]) : "" ?></textarea>
<p id="contador">0 caracteres</p>

<button type="submit" class="btn"><?= $apunte ? "Actualizar" : "Guardar" ?></button>

</form>

<a href="index.php?accion=apuntes">Volver</a>

</div>

<script src="public/app.js"></script>

</body>
</html>