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
			<p><img src="images/blankPic.png" alt="" />
			<?php 
				validar();
				if(validar_privilegios()){
					if(!isset($_POST['modificar'])){
						
						$select = update_tipo_usr($con,$_GET['id_modificar']);
						while($muestra = mysqli_fetch_array($select)){
							echo "<form name='formulario_modificar' action='modificar_tipo_usuario.php' method='post'>
								<input type='hidden' name='id_tipo' value='".$_GET['id_modificar']."'><br>
								Valor Anterior: ".$muestra['descripcion']." <br><br>
								Valor Nuevo: <input name='descripcion' type='text'><br>
								<input type='submit' name='modificar' value='Actualizar'>
								</form>"; ;
						}
					}
					else{
						$query = "update tipo_usuario set descripcion='".$_POST['descripcion']."' where id_tipo_usuario='".$_POST['id_tipo']."'";
						if(!$resultado=mysqli_query($con, $query)) {
							echo "Error".mysqli_error($con);
						} 
			
						else{
							header('Location: /mensajes/php/ver_tipo_usuario.php');
							echo "<a href='ver_tipo_usuario.php'>Regresar</a>";
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
