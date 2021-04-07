<?php
    require_once "../pages/database.php";

    $codigo = $_POST["codigo"];
    
    $eliminar -> execute(array('codigo' => $codigo));

    header("Location: ../pages/ult.php");

