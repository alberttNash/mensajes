<?php
function conectar(){
	$conecta=mysqli_connect("localhost", "red_itq", "10141786", "red_itq");
	if(!$conecta) {echo "Error".mysqli_connect_error($conecta). "no.".mysqli_connect_errno($conecta);}
	else {
		return $conecta;
	}
	
}

function mostrar_mensajes_inicio($con){
	$query="select * from mensajes where id_padre='0' and id_status_msg!='2' order by id_mensaje desc limit 5";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".$muestra['descripcion']."<a href='php/contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}}

function mostrar_mensajes($con){
	$query="select * from mensajes where id_usuario='".$_SESSION['id_usuario']."' and id_status_msg!='2' order by id_mensaje desc";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<br>*******************************************************************************************************************************************<br>";
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".utf8_encode($muestra['descripcion']).
			 "<br><a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar </a>
			 <a href='ver_respuesta_mensaje.php?id=".$muestra['id_mensaje']."'> Ver respuestas </a>
			 <a href='eliminar_mensaje.php?id_msg=".$muestra['id_mensaje']."&id_usuario=".$muestra['id_usuario']."&origen=vermensajes'> Eliminar</a>
			 <a href='modificar_mensaje.php?id_msg=".$muestra['id_mensaje']."&id_usuario=".$muestra['id_usuario']."&origen=vermensajes'> Modificar</a>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}
	
	
}
function mensajes_respuesta($padre,$link){
	
	$query="select m.descripcion, m.id_mensaje, u.nombre_corto from mensajes as m, usuarios as u 
			where m.id_padre='".$padre."' and m.id_usuario = u.id_usuario";
	
	if (!$resultado=mysqli_query($link,$query)) {
		echo "Error". mysqli_error($link);
	}
	
	else{
	
		while($muestra=mysqli_fetch_array($resultado)){
			echo "<br>*******************************************************************************************************************************************<br>";
			echo "".utf8_encode($muestra['descripcion'])."<br>escrito por: ".$muestra['nombre_corto'].
				" <br><a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a></br></span>";
				
		}

	}
}

function administrar_usuarios($con){

	if(validar_privilegios()){

		$query="select u.id_usuario, u.nombre_largo, s.descripcion from usuarios as u, status as s
				where u.id_status=s.id_status";
		if (!$resultado=mysqli_query($con,$query)) {
			echo "Error". mysqli_error($link);
		}
		else{
		
			while($muestra=mysqli_fetch_array($resultado)){
				echo "<br>*******************************************************************************************************************************************<br>";
				echo "".utf8_encode($muestra['nombre_largo'])."<br>Status: ".$muestra['descripcion'].
					"<br><a href='eliminar_usuario.php?id_usuario=".$muestra['id_usuario']."&origen=ver_usuarios'> Eliminar</a>
					<br><a href='modificar_usuario.php?id_usuario=".$muestra['id_usuario']."&origen=ver_usuarios'> Modificar</a>";
					
			}

		}
	}
	else{
		echo "<h1>Necesita más privilegios para ver este contenido</h1>";
	}

}

function update_usuario($con,$id_usuario){
	$query = "select * from usuarios where id_usuario='".$id_usuario."'";
	$resultado = mysqli_query($con,$query);
	return $resultado;
}

function administrar_mensajes($con){

	if(validar_privilegios()){

		$query="select m.id_usuario, m.asunto, m.descripcion, m.id_mensaje, u.nombre_corto, s.descripcion as status from mensajes as m, usuarios as u, status_mensaje as s 
				where m.id_status_msg=s.id_status_msg and m.id_usuario = u.id_usuario";
		if (!$resultado=mysqli_query($con,$query)) {
			echo "Error". mysqli_error($link);
		}
		else{
		
			while($muestra=mysqli_fetch_array($resultado)){
				echo "<br>*******************************************************************************************************************************************<br>";
				echo "".utf8_encode($muestra['asunto'])."<br> Mensaje: ".$muestra['descripcion']."<br>Status: ".$muestra['status'].
					"<br>escrito por: ".$muestra['nombre_corto'].
					"<br><a href='eliminar_mensaje.php?id_msg=".$muestra['id_mensaje']."&id_usuario=".$muestra['id_usuario']."&origen=admin_mensajes'> Eliminar</a>
					<br><a href='modificar_mensaje.php?id_msg=".$muestra['id_mensaje']."&id_usuario=".$muestra['id_usuario']."&origen=admin_mensajes'> Modificar</a>";
					
			}

		}
	}
	else{
		echo "<h1>Necesita más privilegios para ver este contenido</h1>";
	}

}

function update_mensaje($con,$id_mensaje){
	$query = "select * from mensajes where id_mensaje='".$id_mensaje."'";
	$resultado = mysqli_query($con,$query);
	return $resultado;
}

function ver_tipo_usuario($con){
	
	$query="select * from tipo_usuario";
	if (!$resultado=mysqli_query($con,$query)) {
		echo "Error". mysqli_error($con);
	}
	else{
	
		while($muestra=mysqli_fetch_array($resultado)){
			echo "".utf8_encode($muestra['descripcion'])."
			<br><a href='eliminar_tipo_usuario.php?id_eliminar=".$muestra['id_tipo_usuario']."'>eliminar</a>
			<a href='modificar_tipo_usuario.php?id_modificar=".$muestra['id_tipo_usuario']."'>modificar</a><br>";
		}

	}

}

function update_tipo_usr($con, $id_tipo_usuario){
	$query = "select * from tipo_usuario where id_tipo_usuario='".$id_tipo_usuario."'";
	$resultado = mysqli_query($con, $query);
	return $resultado;
}

function ver_status($con){
	
	$query="select * from status";
	if (!$resultado=mysqli_query($con,$query)) {
		echo "Error". mysqli_error($con);
	}
	else{
	
		while($muestra=mysqli_fetch_array($resultado)){
			echo "".utf8_encode($muestra['descripcion'])."
			<br><a href='eliminar_status.php?id_eliminar=".$muestra['id_status']."'>eliminar</a>
			<a href='modificar_status.php?id_modificar=".$muestra['id_status']."'>modificar</a><br>";
		}

	}

}

function update_status($con, $id_status){
	$query = "select * from status where id_status='".$id_status."'";
	$resultado = mysqli_query($con, $query);
	return $resultado;
}

function ver_categorias($con){
	
	$query="select * from categorias";
	if (!$resultado=mysqli_query($con,$query)) {
		echo "Error". mysqli_error($con);
	}
	else{
	
		while($muestra=mysqli_fetch_array($resultado)){
			echo "".utf8_encode($muestra['descripcion'])."
			<br><a href='eliminar_categoria.php?id_eliminar=".$muestra['id_categoria']."'>eliminar</a>
			<a href='modificar_categoria.php?id_modificar=".$muestra['id_categoria']."'>modificar</a><br>";
		}

	}

}

function update_categoria($con, $id_categoria){
	$query = "select * from categorias where id_categoria='".$id_categoria."'";
	$resultado = mysqli_query($con, $query);
	return $resultado;
}

function ver_status_mensaje($con){
	
	$query="select * from status_mensaje";
	if (!$resultado=mysqli_query($con,$query)) {
		echo "Error". mysqli_error($con);
	}
	else{
	
		while($muestra=mysqli_fetch_array($resultado)){
			echo "".utf8_encode($muestra['descripcion'])."
			<br><a href='eliminar_status_msg.php?id_eliminar=".$muestra['id_status_msg']."'>eliminar</a>
			<a href='modificar_status_msg.php?id_modificar=".$muestra['id_status_msg']."'>modificar</a><br>";
		}

	}

}

function update_statusm($con, $id_status_msg){
	$query = "select * from status_mensaje where id_status_msg='".$id_status_msg."'";
	$resultado = mysqli_query($con, $query);
	return $resultado;
}

function validar(){
	//print_r($_SESSION['login']);
	echo "<br>";
	if(!$_SESSION['login']){
		header("location:sinacceso.php");
	}
	else{
		return true;
	}
}

function validar_index(){
	//print_r($_SESSION['login']);
	echo "<br>";
	if(!$_SESSION['login']){
		header("location:php/sinacceso.php");
	}
	else{
		return true;
	}
}

function validar_privilegios(){
	if($_SESSION['id_usuario']==1){
		return true;
	}
}

function salir(){
	session_destroy();	
}

function update_catalogo($con,$catalogo,$valor){
	if($catalogo=='tipo_usuario'){
		echo $query="insert into ".$catalogo." (id_tipo_usuario,descripcion) values (NULL,'".$valor."')";
	}
	else{
		if($catalogo=='categorias'){
			echo $query="insert into ".$catalogo." (id_categoria,descripcion) values (NULL,'".$valor."')";
		}
		else{
			if($catalogo=='status'){
				echo $query="insert into ".$catalogo." (id_status,descripcion) values (NULL,'".$valor."')";
			}
			else{
				echo $query="insert into ".$catalogo." (id_status_msg,descripcion) values (NULL,'".$valor."')";
			}
		}
	}
	
	if(!$resultado=mysqli_query($con, $query)) {
		echo "Error".mysqli_error($con);
	}
}

function redireccion($origen){

	header("'Location: ".$origen.".php'");
}
