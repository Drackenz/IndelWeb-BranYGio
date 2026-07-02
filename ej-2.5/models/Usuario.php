<?php

class Usuario {

    public function buscarPorEmail($email) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function registrar($nombre, $email, $password) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO usuarios (email, password_hash, nombre) VALUES (?, ?, ?)");
        $stmt->execute([$email, $hash, $nombre]);
    }

    public function actualizarUltimoLogin($id) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE usuarios SET ultimo_login = NOW() WHERE id = ?");
        $stmt->execute([$id]);
    }

}