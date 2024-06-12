<?php

require_once("constantes.php"); 
require_once(ROOT_DIR . "/class/database_class.php");

session_start(); // Recupera la sesión o la crea

$databaseConnection = new Database(); // Single handler que se pasa a los controladores

// Comprobar si ha iniciado sesión, en caso negativo cargar login
if (!isset($_SESSION["username"])) { 

    $action = "login";
    require_once(ROOT_DIR . "/controllers/" . $action . "_controller.php"); 
    exit();
}

$username = $_SESSION["username"];

// Comprueba si hay que ejecutar algun controlador
if (isset($_GET["action"])) {

	$action = $_GET["action"];
	require_once(ROOT_DIR . "/controllers/" . $action . "_controller.php");	
	exit();
}

// Una vez la sesión esta iniciada se carga el foro
header("Location: /index.php?action=foro");

?>

