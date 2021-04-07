<?php 

session_start();

require_once 'database.php';

if(isset($_POST['enviar'])){

    $user = $_SESSION['NAME'];
    $mensaje = $_POST['mensaje'];
    $insert = "INSERT INTO chat (usuario,mensaje)";
    $insert.= "VALUES ('".$user."','".$mensaje."')";
    
    header("Location: ult.php");
                            
}else{
    echo "error";
}