<?php
 require_once "../pages/database.php";
  
 $dato = $_POST['modificar'];
 $nuevo = trim(htmlspecialchars($_POST['nuevo']));

 $proceso = "UPDATE users SET ".$dato."='".$nuevo."'";
 $update = $conn->prepare($proceso);
 $update->execute();
 
 header("Location: ../pages/ult.php");