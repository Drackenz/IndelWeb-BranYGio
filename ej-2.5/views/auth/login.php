<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar sesión</title>
<link rel="stylesheet" href="public/styles.css">
</head>
<body>

<div class="contenedor">

<h1>Iniciar sesión</h1>

<?php if (isset($_GET["registrado"])): ?>
    <p style="color:green">Cuenta creada, ya puedes iniciar sesión</p>
<?php endif; ?>

<?php if ($error != ""): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST" action="index.php?accion=login">

<label>Email</label>
<input type="email" name="email" required>

<label>Contraseña</label>
<input type="password" name="password" required>

<button type="submit" class="btn">Entrar</button>

</form>

<a href="index.php?accion=registro">Crear cuenta nueva</a>

</div>

</body>
</html>