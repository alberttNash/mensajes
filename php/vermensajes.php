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
		<p class="t1">"La Tierra será como sean los hombres."</p>
  
		<div class="smallWrap first">
			<h2>Mensajes Recientes</h2>
			<p><img src="images/blankPic.png" alt="" />
   
			<?php 
				validar();
				mostrar_mensajes($con);
			?>
   
		</div>
  
		<div class="smallWrap2">
			<h2>Entrar</h2>
			<p><img src="images/blankPic.png" alt="" />
			<form class="form1" method="post" action="entrar.php">
				<p><i>Los Campos son obligados</i></p>
				Usuario<input name="name" type="text" /><br>
				Contraseña<input name="id" type="text" />
				<input name="" type="submit" value="Entrar" />
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
