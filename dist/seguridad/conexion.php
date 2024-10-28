<?php

error_reporting(E_ALL);
ini_set("display_errors", "1");
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");
setlocale(LC_TIME, "spanish");
date_default_timezone_set("America/Bogota");

function conectar_mysql() 
{
	$dbm = "";
	$motor = "mysql";
	$servidor = 'localhost:3306';
	$usuario = 'root';
	$clave = '';
	$baseDatos = 'asistentesalas'; //Base de datos de SQL Server
	$dsn = $motor . ":host=" . $servidor . ";dbname=" . $baseDatos;

	try {
		$dbm = new PDO($dsn, $usuario, $clave);
	} catch (PDOException $e) {
		echo "Error en conexiones: " . $e->getMessage();
	}

	return $dbm;
}

?>