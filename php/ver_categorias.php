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
		
		<div class="smallWrap">
			<form class='form1' method='post' action='administrarbd.php'>
				<input name='btnS' type='submit' value='Atrás' />
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
			<h2>Registros Actuales</h2>
			<p><img src="images/blankPic.png" alt="" />
			<?php 
				validar();
				if(validar_privilegios()){
					ver_categorias($con);
				}
				else{
					echo "<h1>No cuenta con los privilegios necesarios para ver este contenido</h1>";
				}
			?>
			
		</div>
		<div class="smallWrap">
			<h2>Agregar Nuevo Registro</h2>
			<p><img src="images/blankPic.png" alt="" /></p>
			
			
			<form name='nuevo_registro' method='post' action='nuevo_registro_catalogo.php?catalogo=categorias'>
				Descripcion: <input name='descripcion' type='text'><br>
				<input name='btn_crear' type='submit' value='Crear'>
			</form>
			
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
