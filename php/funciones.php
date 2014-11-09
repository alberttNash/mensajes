<?php
function conectar(){
	$conecta=mysqli_connect("localhost", "red_itq", "10141786", "red_itq");
	if(!$conecta) {echo "Error".mysqli_connect_error($conecta). "no.".mysqli_connect_errno($conecta);}
	else {
		return $conecta;
	}
	
}

function mostrar_mensajes_inicio($con){
	$query="select * from mensajes where id_padre='0' order by id_mensaje desc limit 5";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".$muestra['descripcion']."<a href='php/contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a><br>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}}

function mostrar_mensajes($con){
	$query="select * from mensajes where id_usuario='".$_SESSION['id_usuario']."' order by id_mensaje desc";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<br>*******************************************************************************************************************************************<br>";
		echo "<span class='marker'>Tema:".$muestra['asunto']."<br/></span>";
		echo "".utf8_encode($muestra['descripcion']).
			 "<br><a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar </a>
			 <a href='ver_respuesta_mensaje.php?id=".$muestra['id_mensaje']."'> Ver respuestas </a>
			 <a href='#'> Eliminar </a>
			 <a href='#'> Modificar </a>";
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
