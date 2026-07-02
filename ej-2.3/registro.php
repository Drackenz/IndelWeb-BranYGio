<?php

require "db.php";

$db = getDB();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $nombre = trim($_POST["nombre"]);

    if (strlen($password) < 8) {
        $error = "La contraseña debe tener al menos 8 caracteres";
    } else {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $db->prepare("INSERT INTO usuarios (email, password_hash, nombre) VALUES (?, ?, ?)");
            $stmt->execute([$email, $hash, $nombre]);

            header("Location: login.php?registrado=1");
            exit;

        } catch (PDOException $e) {
            $error = "Ese email ya está registrado";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="contenedor">

<h1>Crear cuenta</h1>

<?php if ($error != ""): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">

    <label>Nombre</label>
    <input type="text" name="nombre" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn">Registrarme</button>

</form>

<a href="login.php">Ya tengo cuenta</a>

</div>

</body>
</html>