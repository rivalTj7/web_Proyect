<?php
    require_once "../pages/database.php";

    $mensaje = trim(htmlentities($_POST['mensaje']));
    $nombre = trim(htmlentities($_POST['nombre']));
    $fecha = date("Y/m/d H:i");

    $addMensaje->execute(array('Mensaje' => $mensaje, 'Nombre' => $nombre, 'Fecha' => $fecha, 'Confirmar' => "No"));

    header("Location: ../pages/ult.php");