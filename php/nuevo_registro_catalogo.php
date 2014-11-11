<?php 
	 require "funciones.php";
	$con=conectar();
	session_start();
	
	validar();
	if(validar_privilegios()){
		if($_GET['catalogo']=='usrtype'){
			
			if($_POST['descripcion']!=null){
				$catalogo="tipo_usuario";
				update_catalogo($con,$catalogo,$_POST['descripcion']);
				
			}
			header("location: ver_tipo_usuario.php");
		}
		if($_GET['catalogo']=='categorias'){
			if($_POST['descripcion']!=null){
				$catalogo="categorias";
				update_catalogo($con,$catalogo,$_POST['descripcion']);
			}
			header("location: ver_categorias.php");
		}
		if($_GET['catalogo']=='status'){
			if($_POST['descripcion']!=null){
				$catalogo="status";
				update_catalogo($con,$catalogo,$_POST['descripcion']);
			}
			header("location: ver_status.php");
		}
		if($_GET['catalogo']=='statusm'){
			if($_POST['descripcion']!=null){
				$catalogo="status_mensaje";
				update_catalogo($con,$catalogo,$_POST['descripcion']);
			}
			header("location: ver_status_mensaje.php");
		}
		
	}
	else{
		"No Tiene los privilegios necesarios";
	}
?>
