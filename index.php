<?php
    require "/php/funciones.php";
	$con=conectar();
	session_start();
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>ITQ Comunica</title>
	<link href="estilos/otro.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="centerAlign">
		<a href="#" class="logo"></a>
		
		<div class="smallWrap2">
			<form class='form1' method='post' action='php/salir.php'>
				<input name='btnS' type='submit' value='Cerrar Sesión' />
			</form>
		</div>
		<div class="smallWrap2">
			<form class='form1' method='post' action='php/salir.php'>
				<input name='btnS' type='submit' value='Perfil' />
			</form>
		</div>
		
		<ul id="menu">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="php/vermensajes.php">Mensajes</a></li>
			<li><a href="eventos.html">Eventos</a></li>
			<li><a href="ligas.html">Ligas</a></li>
			<li class="ml"><a href="http://www.Sisteqmas.html">Sistqmas</a></li>
			<li><a href="http://www.itq.edu.mx">ITQ</a></li>
			<li><a href="http://www.facebook.com/mensajes.itq">Facebook</a></li>
			<li><a href="http://www.titter.com/mensajes.itq">Twitter</a></li>
		</ul>
		<p class="t1">"La Tierra será como sean los hombres."</p>
		<h1>Avisos.</h1>
		<p class="cnt">El sitio se encuentra en construcción. Porfavor sea paciente si no encuentra resolución a algunas páginas.<br>Gracias!!</p>
		<a href="#" class="dl"></a>
		<hr />
		<div class="smallWrap first">
			<h2>Mensajes Recientes</h2>
			<p><img src="images/iconmsg.png" alt="" />
			
			<?php
				
				validar_index();
				mostrar_mensajes_inicio($con);
			?>
			<a href="php/vermensajes.php" class="view">Ver más</a>
		</div>
		<!--
		<div class="smallWrap">	
						<h2>Entrar</h2>
						<p><img src="images/blankPic.png" alt="" />
						<form class="form1" method="post" action="php/entrar.php">
							<p><i>Los Campos son obligados</i></p>
							Usuario<input name="name" type="text" /><br>
							Contraseña<input name="id" type="text" />
							<input name="" type="submit" value="Entrar" />
						</form>
		</div>-->
		
		<?php 
			/*if(!(($_SESSION['login']==true) and ($_SESSION['id_usuario']!=null))){
				echo "<div class=smallWrap>	
						<h2>Entrar</h2>
						<p><img src=images/blankPic.png alt=icono />
						<form class=form1 method=post action=entrar.php?origen=../index.php>
							<p><i>Los Campos son obligados</i></p>
							Usuario<input name=name type=text /><br>
							Contraseña<input name=id type=text />
							<input name=btnEn type=submit value=Entrar />
						</form>
					</div>";
				}
			else{
				echo "<div class=smallWrap>	
						<h2>Salir</h2>
						<p><img src=images/blankPic.png alt=icono />
						<form class=form1 method=post action=php/salir.php>
							<input name=btnS type=submit value=Salir />
						</form>
					</div>";
				
				}*/
			
			
			echo"<div class=smallWrap>
				<h2>Administración de la base de datos</h2>
				<p><img src=images/blankPic.png alt=blanc /></p>
				<p></p>
				<a href=php/administrarbd.php class=view> Más </a>
			</div>";
		?>
		
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
