<?php

class Producto {

    public function todos() {
        $db = getDB();
        $stmt = $db->query("SELECT * FROM productos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function buscar($id) {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear($datos) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $datos["nombre"],
            $datos["descripcion"],
            $datos["precio"],
            $datos["stock"]
        ]);
    }

    public function actualizar($id, $datos) {
        $db = getDB();
        $stmt = $db->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?");
        $stmt->execute([
            $datos["nombre"],
            $datos["descripcion"],
            $datos["precio"],
            $datos["stock"],
            $id
        ]);
    }

    public function eliminar($id) {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$id]);
    }

}