<?php
    require_once "../pages/database.php";

    $nombre = trim(htmlentities($_POST["nombre"]));
    $fecha = date("Y/m/d H:i");   
    $insert->execute(array('Nombre' => $nombre, 'Confirmar' => "No", 'Fecha' => $fecha));

    header("Location: ../pages/ult.php");
    
