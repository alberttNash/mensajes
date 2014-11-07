<?php
    require "funciones.php";
	$con=conectar();
	session_start();
	
	$_SESSION['login']=false;
	$_SESSION['id_usuario']=null;
	$_SESSION['nombre_largo']=null;
	$_SESSION['nombre_corto']=null;
	$_SESSION['tipo_usuario']=null;
	
	header("location: ../index.php");
	
?>
