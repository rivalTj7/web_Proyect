<?php
require_once "../pages/database.php";

    $codigo = $_POST["codigo"];
    $confirmar = $_POST["confirmar"];

    if($confirmar == "on"){
        $confirmar = "Si";
    }else{
        $confirmar = "No";
    }

    $update -> execute(array('codigo' => $codigo,'Confirmar' => $confirmar));
    
    header("Location: ../pages/ult.php");