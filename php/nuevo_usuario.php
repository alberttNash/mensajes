<?php
    require "funciones.php";
	$con=conectar();
	session_start();
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ITQ Comunica</title>
	<link href="../estilos/otro.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="centerAlign">
		<a href="#" class="logo"></a>
  
		<ul id="menu">
			<li><a href="../index.php">Inicio</a></li>
			<li><a href="vermensajes.php">Mensajes</a></li>
			<li><a href="#">Eventos</a></li>
			<li><a href="#">Ligas</a></li>
			<li class="ml"><a href="http://www.Sisteqmas.html">Sistqmas</a></li>
			<li><a href="http://www.itq.edu.mx">ITQ</a></li>
			<li><a href="http://www.facebook.com/mensajes.itq">Facebook</a></li>
			<li><a href="http://www.titter.com/mensajes.itq">Twitter</a></li>
		</ul>
		<p class="t1">"La Tierra <span>será </span> como sean los hombres."</p>
  
		<a href="#" class="dl"></a>
		<hr />
		<div class="smallWrap first">
			<h2>Modificar Campo</h2>
			<p><img src="../images/blankPic.png" alt="" />
			<?php 
				validar();
				if(validar_privilegios()){
					if(!isset($_POST['registrar'])){
						if($_SESSION['id_usuario']!=2){
							
								echo "<div class=smallWrap>
									<h1>Nuevo Usuario</h1>";
								echo "<form name='formulario_nuevo_usuario' action='nuevo_usuario.php' method='post'>
										Todos Los Campos Son obligatorios<br>
										<input type='hidden' name='origen' value='".$_GET['origen']."'><br>
										Nombre Corto: <input name='nombre_corto' type='text'><br><br>
										Nombre Largo: <input name='nombre_largo' type='text'><br><br>
										Contraseña: <input name='contrasena' type='text'><br><br>
										Correo: <input name='correo_e' type='text'><br><br>
										<input type='submit' name='registrar' value='RegistrarUsuario'>
									</form>"; 
								echo "</div>";
							
							// else usuario registrado 
						}
						else{
							echo "<h1>Necesita Provilegios para modiicar este contenido</h1>";
						}
					}
					else{
						if( $_SESSION['id_usuario']!=2){
							
							$query = "insert into usuarios (id_usuario, nombre_corto,nombre_largo,contrasena,id_tipo_usuario,id_status,correo_e) 
							values (NULL,'".$_POST['nombre_corto']."','".$_POST['nombre_largo']."','".md5($_POST['contrasena'])."',2,1,'".$_POST['correo_e']."')";
							if(!$resultado=mysqli_query($con, $query)) {
								echo "Error".mysqli_error($con);
							} 
				
							else{
								header('Location: '.$_POST['origen'].".php");
								echo "<a href='".$_POST['origen'].".php'>Regresar</a>";
							}
							
						}
						else{
							echo "<h1>Necesita Provilegios para modiicar este contenido</h1>";
						}
					}
					
				}
				else{
					echo "<h2>No Cuenta con los privilegios suficientes</h2>";
				}
				
			?>
			
		</div>
		<div class="smallWrap">
			<h2>Notas externas</h2>
			<p><img src="../images/blankPic.png" alt="" />Pellentesque nibh tortor, tempor ut congue at, sodales eu nibh. Mauris consectetur luctus ligula, in molestie felis feugiat id. Phasellus iaculis....</p>
			<p>Pellentesque nibh tortor, tempor ut congue at, sodales eu nibh. Mauris consectetur luctus ligula, in molestie felis feugiat id. Phasellus iaculis....</p>
			
		</div>
		
		
		<hr />
		<p class="copy">© Copyright Información.<br /></p>
		<ul class="foot">
			<li><a href="#">Políticas de privacidad</a> |</li>
			<li><a href="#">Terminos de Uso </a>|</li>
			<li><a href="#">FAQ</a>|</li>
			<li><a href="#">Mapa del sitio</a></li>
		</ul>
		<hr />
	</div>
</body>
</html>
<?php
	mysqli_close($con);
?>
