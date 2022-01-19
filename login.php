<?php

include ("conexion.php");

$bd= new BaseDatos();
$conexion= $bd->conectar();

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $query = 'Select password From empleados where login = "' . $_GET['login'] .'"';

    $res = $bd->seleccionar($query);

    if($row = $res -> fetch_assoc()){

        if (password_verify($_GET['password'],$row['password'])) {

            $mensaje = "login correcto";

        } else {

            $mensaje = "Contraseña incorrecta";
        }

    } else {

        $mensaje = "El usuario no existe";
    }

    echo json_encode($mensaje);  
}

?>