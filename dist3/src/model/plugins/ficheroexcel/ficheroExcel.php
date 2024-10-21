<?php
date_default_timezone_set('America/Bogota');
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: filename=".$_POST['nombre']."-".date("Y-m-d H:i:s").".xls");
header("Pragma: no-cache");
header("Expires: 0");

$cadena = str_replace("<a", "<", $_POST['datos_a_enviar']);
echo $cadena;
?>