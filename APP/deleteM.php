<?php

require_once "../pages/database.php";

$codigo = $_POST["men"];

$eliminarM -> execute(array('Mensaje' => $codigo));

header("Location: ../pages/ult.php");



