<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mis apuntes</title>
<link rel="stylesheet" href="public/styles.css">
</head>
<body>

<div class="contenedor">

<div class="topbar">
<h1>👤 <?= htmlspecialchars($_SESSION["nombre"]) ?></h1>
<a href="index.php?accion=logout" class="btn eliminar">Cerrar sesión</a>
</div>

<p>Mis apuntes · <?= count($apuntes) ?> entradas</p>

<a href="index.php?accion=crear" class="btn">+ Nuevo apunte</a>

<input type="text" id="buscador" placeholder="🔎 Buscar en mis apuntes...">

<div id="lista-apuntes">

<?php foreach($apuntes as $apunte): ?>

<div class="apunte-card">
<h3><?= htmlspecialchars($apunte["titulo"]) ?></h3>
<p class="materia"><?= htmlspecialchars($apunte["materia"]) ?></p>
<p><?= nl2br(htmlspecialchars(substr($apunte["contenido"], 0, 150))) ?>...</p>
<a class="editar" href="index.php?accion=editar&id=<?= $apunte["id"] ?>">Editar</a>
<a class="eliminar" href="index.php?accion=eliminar&id=<?= $apunte["id"] ?>" onclick="return confirm('¿Eliminar este apunte?')">Eliminar</a>
</div>

<?php endforeach; ?>

</div>

</div>

<script src="public/app.js"></script>

</body>
</html>