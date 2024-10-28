<?php

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');
// $tags_page = strftime("%A, %d de %B de %Y %H:%M ") . '<br/>';

$error_personal = "";
$fecha_hoy = date("Y-m-d");
$fecha_hora_hoy = date("Y-m-d H:i:s");
// $dbm_sicuso = conectar_sicuso();
$dbm = conectar_mysql();

$formulario = variable_exterior("formulario");

$sql = "SELECT * FROM sedes WHERE estado = 1";
$query = $dbm->prepare($sql);
$query->execute();
$sedes = array_asociativo($query);


$sql = "SELECT * FROM usuarios WHERE estado = 1";
$query = $dbm->prepare($sql);
$query->execute();
$usuarios = array_asociativo($query);


$disponibilidad_profesional = '{}';

//FILTRO
if ($formulario == "filtrar" || $formulario == "") {
	$sql = "SELECT 
			CONCAT('Reserva exitosa #', reservas.id) as title,
			CONCAT(salas.nombre, '. Bloque: ', salas.bloque,'. Capacidad de estudiantes: ', salas.capacidad_estudiantes, '. Aire: ', salas.aire_acondicionado, '. Video Beam: ', salas.video_beam, '. Asignatura: ', reservas.asignatura) as description,
			CONCAT(sedes.nombre, '. Docente: ', usuarios.nombres,' ', usuarios.apellidos )as location,
			CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_inicio) as start,
			CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_fin) as end
			FROM 
			reservas, salas, sedes, usuarios
			WHERE reservas.id_sala = salas.id
			AND reservas.id_sede = sedes.id
			AND reservas.id_usuario = usuarios.id";

	$disponibilidad_prof = $dbm->prepare($sql);
	$disponibilidad_prof->execute();

	$agendas_sede = array(); // Arreglo para almacenar las agendas de una sede específica

	while ($fila = $disponibilidad_prof->fetch(PDO::FETCH_ASSOC)) {
		$agendas_sede[] = $fila; // Agregar cada fila (agenda) al arreglo de la sede
	}

	$array_total = array(); // Arreglo para almacenar las agendas de todas las sedes
	foreach ($agendas_sede as $key => $value) {
		if ($value['start'] || $value['end']) {
			$value['start'] = validarfecha_hora($value['start'], 'solo_hora');
			$value['end'] = validarfecha_hora($value['end'], 'solo_hora');
			$value['end'] = validarfecha_hora($value['end'], 'solo_hora');
			$array_total[] = $value;
		}
	}
	$disponibilidad_profesional = json_encode($array_total);
	// var_dump($disponibilidad_profesional);
	// die;
}


function validarfecha_hora($fecha, $horario)
{

	$fecha_inicial = str_replace(' ', 'T', $fecha);

	$fecha_separada =  explode('T', $fecha_inicial);
	if ($horario == 'minimo') {

		$fecha_configurada = $fecha_separada[0] . 'T06:00';
	} else if ($horario == 'solo_hora') {
		$fecha_configurada = $fecha_inicial;
	} else {
		$fecha_configurada = $fecha_separada[0] . 'T18:00';
	}

	return $fecha_configurada;
}
