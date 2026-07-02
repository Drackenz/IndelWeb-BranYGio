<?php
session_start();
require "db.php";

$db = getDB();
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($password, $usuario["password_hash"])) {

        $_SESSION["user_id"] = $usuario["id"];
        $_SESSION["nombre"] = $usuario["nombre"];

        $stmt = $db->prepare("UPDATE usuarios SET ultimo_login = NOW() WHERE id = ?");
        $stmt->execute([$usuario["id"]]);

        header("Location: panel.php");
        exit;

    } else {
        $error = "Email o contraseña incorrectos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar sesión</title>
<link rel="stylesheet" href="styles.css">
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

<form method="POST">

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Contraseña</label>
    <input type="password" name="password" required>

    <button type="submit" class="btn">Entrar</button>

</form>

<a href="registro.php">Crear cuenta nueva</a>

</div>

</body>
</html>