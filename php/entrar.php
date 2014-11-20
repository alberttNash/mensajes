<?php
    require "funciones.php";
	$con=conectar();
	session_start();
	
		if(isset($_POST['name'])){
			$autenticado;
			$query = "select * from usuarios where nombre_corto = '".$_POST['name']."' and contrasena = '".md5($_POST['id'])."'";
			$no_reg = mysqli_num_rows($resultado=mysqli_query($con,$query));
			if($no_reg != 0){
				if(!$resultado){
					echo "ERROR ".mysqli_error($con);
				}
				else{
					$muestra = mysqli_fetch_array($resultado);
					if($muestra['id_status']!=3){
						$_SESSION['login']=true;
						$_SESSION['nombre_largo']=$muestra['nombre_largo'];
						$_SESSION['nombre_corto']=$muestra['nombre_corto'];
						$_SESSION['tipo_usuario']=$muestra['id_tipo_usuario'];
						$_SESSION['id_usuario']=$muestra['id_usuario'];
						$autenticado = 1;
					}
					else{
						$_SESSION['login']=false;
						$_SESSION['id_usuario']=null;
						$_SESSION['nombre_corto']=null;
						$_SESSION['nombre_largo']=null;
						$_SESSION['tipo_usuario']=null;
						$autenticado=0;
					}
					//print_r($_SESSION);
					//echo "Bienvenido ".$_SESSION['nombre_largo'];
				}
			}
			else{
				//echo "Datos Erróneos";
				$_SESSION['login']=false;
				$_SESSION['id_usuario']=null;
				$_SESSION['nombre_corto']=null;
				$_SESSION['nombre_largo']=null;
				$_SESSION['tipo_usuario']=null;
				$autenticado=0;
			}
		}
		
		
		header("location: ".$_GET['origen']."?autenticado=".$autenticado);
?>
