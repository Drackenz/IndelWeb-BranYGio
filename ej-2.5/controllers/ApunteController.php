<?php

class ApunteController {

    private $modelo;

    public function __construct() {
        $this->modelo = new Apunte();
    }

    public function index() {
        $usuario_id = $_SESSION["user_id"];
        $apuntes = $this->modelo->deUsuario($usuario_id);
        require "views/apuntes/index.php";
    }

    public function crear() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $datos = [
                "titulo" => trim($_POST["titulo"]),
                "materia" => trim($_POST["materia"]),
                "contenido" => trim($_POST["contenido"])
            ];

            $this->modelo->crear($datos, $_SESSION["user_id"]);

            header("Location: index.php?accion=apuntes");
            exit;

        }

        $apunte = null;
        require "views/apuntes/form.php";

    }

    public function editar($id) {

        $usuario_id = $_SESSION["user_id"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $datos = [
                "titulo" => trim($_POST["titulo"]),
                "materia" => trim($_POST["materia"]),
                "contenido" => trim($_POST["contenido"])
            ];

            $this->modelo->actualizar($id, $datos, $usuario_id);

            header("Location: index.php?accion=apuntes");
            exit;

        }

        $apunte = $this->modelo->buscar($id, $usuario_id);
        require "views/apuntes/form.php";

    }

    public function eliminar($id) {
        $usuario_id = $_SESSION["user_id"];
        $this->modelo->eliminar($id, $usuario_id);
        header("Location: index.php?accion=apuntes");
        exit;
    }

}