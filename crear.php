<?php

include("conexion.php");
include("funciones.php");

if ($_POST["operacion"] == "Crear") {
  $imagen = '';
  if ($_FILES["imagen_usuario"]["name"] != ''){
    $imagen = subir_imagen();

  }
  $stmt = $conexion->prepare("INSERT INTO usuarios(nombre, apellido, area, imagen, telefono, email)VALUES(:nombre, :apellido, :area, :imagen, :telefono, :email)");

  $resultado = $stmt->execute(
    array(
      ':nombre'        => $_POST["nombre"],
      ':apellido'      => $_POST["apellido"],
      ':area'          => $_POST["area"],
      ':telefono'      => $_POST["telefono"],
      ':email'         => $_POST["email"],
      ':imagen'        => $imagen
    )
    );

    if (!empty($resultado)) {
       echo 'Registro Creado';
    }

}

?>