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
		<div class="smallWrap2">
			<form class='form1' method='post' action='salir.php'>
				<input name='btnS' type='submit' value='Cerrar Sesión' />
			</form>
		</div>
		
  
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
			<p><img src="images/blankPic.png" alt="" />
			<?php 
				validar();
				
					if(!isset($_POST['modificar'])){
						if( $_GET['id_usuario']==$_SESSION['id_usuario'] or $_SESSION['id_usuario']==1){
							$select = update_usuario($con,$_GET['id_usuario']);
							if ($_SESSION['id_usuario']==1){
								while($muestra = mysqli_fetch_array($select)){
									echo "<div class=smallWrap>
										<h2>Valores Anteriores</h2>
											<br>Nombre Corto: ".$muestra['nombre_corto']."
											<br>Nombre Largo: ".$muestra['nombre_largo']."
											<br>Contraseña: ".md5($muestra['contrasena'])."
											<br>Id tipo usuario: ".$muestra['id_tipo_usuario']."
											<br>Id Status: ".$muestra['id_status']."
											<br>Correo: ".$muestra['correo_e']."
										</div>";
									echo "<div class=smallWrap>
										<h2>Valores Nuevos</h2>";
									echo "<form name='formulario_modificar' action='modificar_usuario.php' method='post'>
											Todos Los Campos Son obligatorios<br>
											<input type='hidden' name='id_user' value='".$_GET['id_usuario']."'><br>
											<input type='hidden' name='origen' value='".$_GET['origen']."'><br>
											<input type='hidden' name='alterX' value='1'><br>
											Nombre Largo Nuevo: <input name='nombre_largo' type='text'><br><br>
											Contraseña Nueva: <input name='contrasena' type='text'><br><br>
											ID Tipo Usuario Nuevo: <input name='id_tipo_usuario' type='text'><br><br>
											ID Status Nuevo: <input name='id_status' type='text'><br><br>
											Correo Nuevo: <input name='correo_e' type='text'><br><br>
											<input type='submit' name='modificar' value='Actualizar'>
										</form>"; 
									echo "</div>";
								}
							}
							else{
								while($muestra = mysqli_fetch_array($select)){
									echo "<div class=smallWrap>
										<h2>Valores Anteriores</h2>
											
											<br>Nombre Largo: ".$muestra['nombre_largo']."
											<br>Contraseña: ".md5($muestra['contrasena'])."
											
											<br>Correo: ".$muestra['correo_e']."
										</div>";
									echo "<div class=smallWrap>
										<h2>Valores Nuevos</h2>";
									echo "<form name='formulario_modificar' action='modificar_usuario.php' method='post'>
											Todos Los Campos Son obligatorios<br>
											<input type='hidden' name='id_user' value='".$_GET['id_usuario']."'><br>
											<input type='hidden' name='origen' value='".$_GET['origen']."'><br>
											<input type='hidden' name='alterX' value='2'><br>
											Nombre Largo Nuevo: <input name='nombre_largo' type='text'><br><br>
											Contraseña Nueva: <input name='contrasena' type='text'><br><br>
											Correo Nuevo: <input name='correo_e' type='text'><br><br>
											<input type='submit' name='modificar' value='Actualizar'>
										</form>"; 
									echo "</div>";
								}
							
							}
						}
						else{
							echo "<h1>Necesita Provilegios para modiicar este contenido</h1>";
						}
					}
					else{
						if( $_POST['id_user']==$_SESSION['id_usuario'] or $_SESSION['id_usuario']==1){
							if($_POST['alterX']==1){
								$query = "update usuarios set nombre_largo='".$_POST['nombre_largo']."', contrasena='".md5($_POST['contrasena'])."',
											id_tipo_usuario='".$_POST['id_tipo_usuario']."',id_status='".$_POST['id_status']."', correo_e='".$_POST['correo_e']."' where id_usuario='".$_POST['id_user']."'";
								if(!$resultado=mysqli_query($con, $query)) {
									echo "Error".mysqli_error($con);
								} 
					
								else{
									header('Location: '.$_POST['origen'].".php");
									echo "<a href='".$_POST['origen'].".php'>Regresar</a>";
								}
								
							}
							else{
								$query = "update usuarios set nombre_largo='".$_POST['nombre_largo']."', contrasena='".md5($_POST['contrasena'])."',
											correo_e='".$_POST['correo_e']."' where id_usuario='".$_POST['id_user']."'";
								if(!$resultado=mysqli_query($con, $query)) {
									echo "Error".mysqli_error($con);
								} 
					
								else{
									header('Location: '.$_POST['origen'].".php");
									echo "<a href='".$_POST['origen'].".php'>Regresar</a>";
								}
							
							}
						}
						else{
							echo "<h1>Necesita Provilegios para modiicar este contenido</h1>";
									echo "<a href='".$_POST['origen'].".php'>Regresar</a>";
						}
					}
					
				
				
				
			?>
			
		</div>
		<div class="smallWrap">
			<h2>Notas externas</h2>
			<p><img src="images/blankPic.png" alt="" />Pellentesque nibh tortor, tempor ut congue at, sodales eu nibh. Mauris consectetur luctus ligula, in molestie felis feugiat id. Phasellus iaculis....</p>
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
