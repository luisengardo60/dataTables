<?php
include("conexion.php");
include("funciones.php");

if (isset($_POST["id_usuario"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){
        $salida["nombre"] = $fila["nombre"];
        $salida["apellido"] = $fila["apellido"];
        $salida["area"] = $fila["area"];
        $salida["telefono"] = $fila["telefono"];
        $salida["email"] = $fila["email"];
        if ($fila["imagen"] != "") {
            $salida["nombre"] = '<img src="img/' . $fila["imagen"] . '" class="img-thumbnail" width="50" height="35" />';
        }
    }
}