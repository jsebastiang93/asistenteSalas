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
	$servidor = '127.0.0.1:3306';
	$usuario = 'u954889421_admin';
	$clave = 'Hostinger.unicatolica2024';
	$baseDatos = 'u954889421_asistentesalas'; //Base de datos de SQL Server
	$dsn = $motor . ":host=" . $servidor . ";dbname=" . $baseDatos;

	try {
		$dbm = new PDO($dsn, $usuario, $clave);
	} catch (PDOException $e) {
		echo "Error en conexiones: " . $e->getMessage();
	}

	return $dbm;
}

?>
