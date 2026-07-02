<?php

function getDB(){

    static $conexion = null;

    if ($conexion === null) {

        $conexion = new PDO(
            'mysql:host=127.0.0.1;port=3307;dbname=indel_inventario',
            'root',
            ''
        );

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }

    return $conexion;

}