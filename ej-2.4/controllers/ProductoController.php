<?php

class ProductoController {

    private $modelo;

    public function __construct() {
        $this->modelo = new Producto();
    }

    public function index() {
        $productos = $this->modelo->todos();
        require "views/productos/index.php";
    }

    public function crear() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $datos = [
                "nombre" => trim($_POST["nombre"]),
                "descripcion" => trim($_POST["descripcion"]),
                "precio" => $_POST["precio"],
                "stock" => $_POST["stock"]
            ];

            $this->modelo->crear($datos);

            header("Location: index.php?accion=index");
            exit;

        }

        $producto = null;
        require "views/productos/form.php";

    }

    public function editar($id) {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $datos = [
                "nombre" => trim($_POST["nombre"]),
                "descripcion" => trim($_POST["descripcion"]),
                "precio" => $_POST["precio"],
                "stock" => $_POST["stock"]
            ];

            $this->modelo->actualizar($id, $datos);

            header("Location: index.php?accion=index");
            exit;

        }

        $producto = $this->modelo->buscar($id);
        require "views/productos/form.php";

    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header("Location: index.php?accion=index");
        exit;
    }

}