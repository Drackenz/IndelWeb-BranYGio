<?php

$errores = [];

$enviado = false;

$nombre = "";
$email = "";
$asunto = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $asunto = htmlspecialchars(trim($_POST["asunto"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    if (strlen($nombre) < 2) {
        $errores[] = "El nombre debe tener al menos 2 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Correo electrónico inválido.";
    }

    if (empty($mensaje)) {
        $errores[] = "Debe escribir un mensaje.";
    }

    if (count($errores) == 0) {

        $texto =
        date("d/m/Y H:i:s") .
        " | " .
        $nombre .
        " | " .
        $email .
        " | " .
        $asunto .
        " | " .
        $mensaje .
        PHP_EOL;

        file_put_contents("mensajes.txt", $texto, FILE_APPEND);

        $enviado = true;

        $nombre = "";
        $email = "";
        $asunto = "";
        $mensaje = "";

    }

}

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Formulario de Contacto</title>

<style>

body{

font-family:Arial;

background:#f4f4f4;

display:flex;

justify-content:center;

padding:40px;

}

.contenedor{

background:white;

width:600px;

padding:30px;

border-radius:10px;

box-shadow:0 5px 15px rgba(0,0,0,.2);

}

input,select,textarea{

width:100%;

padding:10px;

margin-top:8px;

margin-bottom:18px;

}

button{

padding:12px;

background:#2563eb;

color:white;

border:none;

cursor:pointer;

}

.error{

background:#ffe6e6;

padding:10px;

color:red;

margin-bottom:20px;

}

.ok{

background:#d4edda;

padding:10px;

color:green;

margin-bottom:20px;

}

</style>

</head>

<body>

<div class="contenedor">

<h1>Contáctanos</h1>

<?php

if($enviado){

echo "<div class='ok'>Mensaje enviado correctamente.</div>";

}

if(count($errores)>0){

echo "<div class='error'>";

foreach($errores as $e){

echo $e."<br>";

}

echo "</div>";

}

?>

<form method="POST">

<label>Nombre</label>

<input
type="text"
name="nombre"
value="<?= $nombre ?>">

<label>Email</label>

<input
type="email"
name="email"
value="<?= $email ?>">

<label>Asunto</label>

<select name="asunto">

<option>Consulta</option>

<option>Información</option>

<option>Soporte</option>

</select>

<label>Mensaje</label>

<textarea
name="mensaje"><?= $mensaje ?></textarea>

<button>

Enviar

</button>

</form>

</div>

</body>

</html>