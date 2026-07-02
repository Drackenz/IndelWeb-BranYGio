<?php

require "helpers/auth.php";
require "config/database.php";
require "models/Usuario.php";
require "models/Apunte.php";
require "controllers/AuthController.php";
require "controllers/ApunteController.php";

$accion = $_GET["accion"] ?? "home";

if ($accion == "home") {
    require "views/home.php";

} elseif ($accion == "login") {

    $auth = new AuthController();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $auth->login();
    } else {
        $auth->mostrarLogin();
    }

} elseif ($accion == "registro") {

    $auth = new AuthController();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $auth->registro();
    } else {
        $auth->mostrarRegistro();
    }

} elseif ($accion == "logout") {
    $auth = new AuthController();
    $auth->logout();

} elseif ($accion == "apuntes") {
    requireLogin();
    $ctrl = new ApunteController();
    $ctrl->index();

} elseif ($accion == "crear") {
    requireLogin();
    $ctrl = new ApunteController();
    $ctrl->crear();

} elseif ($accion == "editar") {
    requireLogin();
    $ctrl = new ApunteController();
    $ctrl->editar($_GET["id"]);

} elseif ($accion == "eliminar") {
    requireLogin();
    $ctrl = new ApunteController();
    $ctrl->eliminar($_GET["id"]);

} else {
    http_response_code(404);
    echo "Página no encontrada";
}