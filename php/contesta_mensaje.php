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
   <li><a href="../index.html">Inicio</a></li>
   <li><a href="php/vermensajes.php">Mensajes</a></li>
   <li><a href="#">Eventos</a></li>
   <li><a href="#">Ligas</a></li>
   <li class="ml"><a href="http://www.Sisteqmas.html">Sistqmas</a></li>
   <li><a href="http://www.itq.edu.mx">ITQ</a></li>
   <li><a href="http://www.facebook.com/mensajes.itq">Facebook</a></li>
   <li><a href="http://www.titter.com/mensajes.itq">Twitter</a></li>
  </ul>
  <p class="t1">"La Tierra será como sean los hombres."</p>
  <a href="#" class="dl"></a>
  <hr />
  <div class="smallWrap first">
   <h2>Contesta Mensaje</h2>
   <?php
   validar();
   if(!isset($_POST['btn_contesta'])) {
		$id=$_GET['id_padre'];
		echo "<form name='contesta_mensaje' action='contesta_mensaje.php' method='post'>
		<input type='hidden' name='id_padre' value='".$id."'>
		<textarea name='form_mensaje_respuesta' col='50' rows='5'>Mensaje
		</textarea>
		<input type='submit' name='btn_contesta' value='Contestar'>
</form>"; ;
	}else {
		$id=$_POST['id_padre'];
		
		
		
		$query="INSERT INTO mensajes (id_mensaje, id_padre,asunto,id_usuario,descripcion,id_categoria,fecha_publicacion) 
		VALUES (NULL, '".$id."', 'REspuesta', '1', '".$_POST['form_mensaje_respuesta']."', '2', '2014-10-22');";
		if(!$resultado=mysqli_query($con, $query)) {echo "Error".mysqli_error($con);} else{
				
				header('Location: /mensajes/php/vermensajes.php');
				
			echo "<a href='vermensajes.php'>Regresar</a>";}	}?>
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
