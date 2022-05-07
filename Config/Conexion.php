<?php 
require_once "Global.php";

$conexion=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

//muestra posible error en la conexion
if (mysqli_connect_errno()) {
	printf("Falló en la conexion con la base de datos: %s\n",mysqli_connect_error());
	exit();
}else{
	//echo "Conexión Exitosa"; //Esto agregué de prueba
}


function consulta($sql){
	global $conexion;
	$query=$conexion->query($sql);
	$retorno = [];
	$i=0;
	while($fila = $query->fetch_assoc()){
		$retorno[$i] = $fila;
		$i++;
	}
	
	return $retorno;
}

	
function insertarConsulta($sql,$sql2){ 
	global $conexion;
	$query=$conexion->query($sql);

	$query2 = $conexion->query($sql2);
	$retorno = [];
	$i=0;
	while($fila = $query2->fetch_assoc()){
		$retorno[$i] = $fila;
		$i++;
	}
	
	return $retorno;
	
}


function limpiarCadena($str){
	global $conexion;
	$str=mysqli_real_escape_string($conexion,trim($str));
	return htmlspecialchars($str);
}



 ?>