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
		
		<div class="smallWrap">	
			<form class='form1' method='post' action='../index.php'>
				<input name='back' type='submit' value='Regresar' />
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
		<p><h2>Administración de la base de datos</h2></p>
  
		<div class="smallWrap first">
			<!--<h2>Administrar la Base de Datos</h2>
			<p><img src="images/blankPic.png" alt="" />-->
		</div>
   
		<?php 
			validar();
			if(validar_privilegios()){
			
				echo "<div class=smallWrap>	
					<h2>Usuarios</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
	
				echo "<div class=smallWrap>	
					<h2>Tipo de usuarios</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
				
				echo "<div class=smallWrap>	
					<h2>Status</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
				
				echo "<div class=smallWrap>	
					<h2>Mensajes</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
				
				echo "<div class=smallWrap>	
					<h2>Categorias</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
				
				echo "<div class=smallWrap>	
					<h2>Status de mensaje</h2>
					<p><img src=../images/blankPic.png alt=icono />
					<form class=form1 method=post action=ver_tipo_usuario.php>
						<input name=tipousr type=submit value='Ver Tabla' />
					</form>
				</div>";
				
			}
			else{
				echo "<h1>Necesitas más privilegios para ver este contenido<h1>";
			}
			
		?>
		
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
