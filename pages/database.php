<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
}catch(PDOException $e){
die('conexion failed: ' .$e->getMessage());
}

	$readInformacion = $conn->prepare("SELECT * FROM users WHERE id = :id");
	

	$insert = $conn->prepare("INSERT INTO lista(Nombre, Fecha, Confirmar) VALUES(:Nombre, :Fecha, :Confirmar)");
	$read = $conn->prepare("SELECT * FROM lista ORDER BY codigo ASC");
	$read->execute();

	$eliminar = $conn->prepare("DELETE FROM lista WHERE codigo = :codigo");
	$update = $conn->prepare("UPDATE lista SET Confirmar = :Confirmar WHERE codigo = :codigo");
	

	$addMensaje = $conn->prepare("INSERT INTO mensajes(Nombre, Mensaje, Fecha, Confirmar) VALUES(:Nombre, :Mensaje, :Fecha, :Confirmar)");
	$readMensaje = $conn->prepare("SELECT * FROM mensajes ORDER BY id ASC");
	$readMensaje->execute();

	$eliminarM = $conn->prepare("DELETE FROM mensajes WHERE Mensaje = :Mensaje");