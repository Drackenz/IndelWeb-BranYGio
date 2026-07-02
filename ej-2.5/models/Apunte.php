<?php

class Apunte {

    public function deUsuario($usuario_id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM apuntes WHERE usuario_id = ? ORDER BY actualizado DESC");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll();
    }

    public function buscar($id, $usuario_id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM apuntes WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
        return $stmt->fetch();
    }

    public function crear($datos, $usuario_id) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO apuntes (usuario_id, titulo, materia, contenido) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $usuario_id,
            $datos["titulo"],
            $datos["materia"],
            $datos["contenido"]
        ]);
    }

    public function actualizar($id, $datos, $usuario_id) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE apuntes SET titulo=?, materia=?, contenido=? WHERE id=? AND usuario_id=?");
        $stmt->execute([
            $datos["titulo"],
            $datos["materia"],
            $datos["contenido"],
            $id,
            $usuario_id
        ]);
    }

    public function eliminar($id, $usuario_id) {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM apuntes WHERE id = ? AND usuario_id = ?");
        $stmt->execute([$id, $usuario_id]);
    }

}