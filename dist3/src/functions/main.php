<?php
function variable_exterior($nombre)
{
	$variable = "";

	if (isset($_POST["$nombre"]) && $_POST["$nombre"] != "") {
		$variable = $_POST["$nombre"];
	} else if (isset($_GET["$nombre"]) && $_GET["$nombre"] != "") {
		$variable = $_GET["$nombre"];
	}

	return trim($variable);
}


function validar_usuario_existente($usuario, $contraseña,$identificacion, $dbm)
{

	$dbm = $dbm;
	$usuario = $usuario;
	$contraseña = $contraseña;
	$identificacion = $identificacion;

	$respuesta = "";

	$sql = "SELECT COUNT(*) AS cont FROM `clientes` WHERE usuario = '$usuario' AND contraseña = '$contraseña' AND identificacion = '$identificacion'";
	$query = $dbm->prepare($sql);
	$query->execute();
	while ($fila = $query->fetch()) {
		$respuesta =  $fila[0];
	}

	return $respuesta;
}

function nombre_producto($id, $dbm)
{

	$dbm = $dbm;
	$id = $id;

	$respuesta = "";

	$sql = "SELECT * FROM `lavadoras` WHERE id = '$id'";
	$query = $dbm->prepare($sql);
	$query->execute();
	while ($fila = $query->fetch()) {
		$respuesta =  $fila[0];
	}

	return $respuesta;
}


function array_($resultado)
{
	$var = array();
	while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$var[] = $fila;
	}
	return $var;
}


function array_asociativo($resultado)
{
	$var = array();
	while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$var[] = $fila;
	}
	return $var;
}

