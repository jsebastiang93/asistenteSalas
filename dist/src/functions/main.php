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


function nombre_sala($id, $dbm)
{

	$dbm = $dbm;
	$id = $id;

	$respuesta = "";

	$sql = "SELECT * FROM salas WHERE id = '$id'";
	$query = $dbm->prepare($sql);
	$query->execute();
	$respuesta = array_asociativo($query)[0];

	return $respuesta;
}

function nombre_sede($id, $dbm)
{

	$dbm = $dbm;
	$id = $id;

	$respuesta = "";

	$sql = "SELECT * FROM sedes WHERE id = '$id'";
	$query = $dbm->prepare($sql);
	$query->execute();
	$respuesta = array_asociativo($query)[0];

	return $respuesta;
}

function nombre_usuarios($id, $dbm)
{

	$dbm = $dbm;
	$id = $id;

	$respuesta = "";

	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$query = $dbm->prepare($sql);
	$query->execute();
	$respuesta = array_asociativo($query)[0];

	return $respuesta;
}

function enviar_mail(
	$datos
) {
	$envio_correo =  enviar_mail_em($datos);
	if ($envio_correo == "") {
		// var_dump($envio_correo);
	} else {
		// var_dump("error " . $envio_correo);
	}
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
