<?php

require "config/database.php";
require "models/Producto.php";
require "controllers/ProductoController.php";

$accion = $_GET["accion"] ?? "index";
$ctrl = new ProductoController();

if ($accion == "index") {
    $ctrl->index();
} elseif ($accion == "crear") {
    $ctrl->crear();
} elseif ($accion == "editar") {
    $ctrl->editar($_GET["id"]);
} elseif ($accion == "eliminar") {
    $ctrl->eliminar($_GET["id"]);
} else {
    http_response_code(404);
    echo "Página no encontrada";
}