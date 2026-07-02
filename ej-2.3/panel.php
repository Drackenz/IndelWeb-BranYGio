<?php

require "auth.php";
requireLogin();

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

<h1>Bienvenido, <?= htmlspecialchars($_SESSION["nombre"]) ?></h1>

<p>Esta es tu zona privada.</p>

<a href="logout.php" class="btn">Cerrar sesión</a>

</div>

</body>
</html>