<?php
include "../../seguridad/conexion.php";

$accion = $_POST["accion"];


$dbm = conectar_mysql();

$elegido = $_POST["elegido"];
$id_usuario = $_POST["id_usuario"];
echo "hola";