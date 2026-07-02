<?php

class AuthController {

    private $modelo;

    public function __construct() {
        $this->modelo = new Usuario();
    }

    public function mostrarLogin() {
        $error = "";
        require "views/auth/login.php";
    }

    public function login() {

        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        $usuario = $this->modelo->buscarPorEmail($email);

        if ($usuario && password_verify($password, $usuario["password_hash"])) {

            $_SESSION["user_id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];

            $this->modelo->actualizarUltimoLogin($usuario["id"]);

            header("Location: index.php?accion=apuntes");
            exit;

        } else {
            $error = "Email o contraseña incorrectos";
            require "views/auth/login.php";
        }
    }

    public function mostrarRegistro() {
        $error = "";
        require "views/auth/registro.php";
    }

    public function registro() {

        $nombre = trim($_POST["nombre"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        if (strlen($password) < 8) {
            $error = "La contraseña debe tener al menos 8 caracteres";
            require "views/auth/registro.php";
            return;
        }

        try {
            $this->modelo->registrar($nombre, $email, $password);
            header("Location: index.php?accion=login&registrado=1");
            exit;

        } catch (PDOException $e) {
            $error = "Ese email ya está registrado";
            require "views/auth/registro.php";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?accion=login");
        exit;
    }

}