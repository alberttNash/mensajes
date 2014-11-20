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
			<h2>Datos de Perfil</h2>
			
			<?php 
				validar();
						
							$select = update_usuario($con,$_SESSION['id_usuario']);
							
							while($muestra = mysqli_fetch_array($select)){
								echo "<div class=smallWrap>
									
										<br>Nombre Corto: ".$muestra['nombre_corto']."
										<br>Nombre Largo: ".$muestra['nombre_largo']."
										
										<br>Correo: ".$muestra['correo_e']."
									</div>";
							}
							
				echo "<div class=smallWrap>
						<h2>Editar Perfil</h2>
						<form name='nuevo_registro' method='post' action='modificar_usuario.php?id_usuario=".$_SESSION['id_usuario']."&origen=perfil'>
							<input name='editar' type='submit' value='Editar'>
						</form></div>";
						
				echo "<div class=smallWrap>
						<h2>Darme de Baja</h2>
						<form name='nuevo_registro' method='post' action='eliminar_usuario.php?id_usuario=".$_SESSION['id_usuario']."&origen=perfil'>
							<input name='Eliminar' type='submit' value='Eliminar'>
						</form></div>";
						

				
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
