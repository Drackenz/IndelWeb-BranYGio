<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro</title>
<link rel="stylesheet" href="public/styles.css">
</head>
<body>

<div class="contenedor">

<h1>Crear cuenta</h1>

<?php if ($error != ""): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="index.php?accion=registro">

<label>Nombre</label>
<input type="text" name="nombre" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Contraseña</label>
<input type="password" name="password" required>

<button type="submit" class="btn">Registrarme</button>

</form>

<a href="index.php?accion=login">Ya tengo cuenta</a>

</div>

</body>
</html>