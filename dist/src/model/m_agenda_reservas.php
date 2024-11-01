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


$sql = "SELECT * FROM salas WHERE estado = 1";
$query3 = $dbm->prepare($sql);
$query3->execute();
$salas = array_asociativo($query3);


$sql = "SELECT * FROM usuarios WHERE estado = 1 AND id_rol = 2";
$query2 = $dbm->prepare($sql);
$query2->execute();
$usuarios_lista = array_asociativo($query2);

$disponibilidad_profesional = '{}';

//FILTRO
if ($formulario == "filtrar" || $formulario == "") {
	$comodin = "";
	if ($_SESSION['id_rol'] == 2) {
		$comodin .= " AND id_usuario = '" . $_SESSION['id_usuario'] . "'";
	}
	$sql = "SELECT 
				CASE
					WHEN reservas.estado = '0' THEN 'CANCELADA' -- CANCELADA
					WHEN reservas.estado = '1' THEN 'RESERVADO' -- RESERVADO
					WHEN reservas.estado = '2' THEN 'CONFIRMADA' -- CONFIRMADA
					ELSE 'RESERVADO'
				END AS estado_reserva,
				CONCAT('Reserva exitosa #', reservas.id, ' - ', 
					CASE
						WHEN reservas.estado = '0' THEN 'CANCELADA'
						WHEN reservas.estado = '1' THEN 'RESERVADO'
						WHEN reservas.estado = '2' THEN 'CONFIRMADA'
						ELSE 'RESERVADO'
					END) AS title,
				CONCAT(salas.nombre, '. Bloque: ', salas.bloque, 
					'. Capacidad de estudiantes: ', salas.capacidad_estudiantes, 
					'. Aire: ', salas.aire_acondicionado, 
					'. Video Beam: ', salas.video_beam, 
					'. Asignatura: ', reservas.asignatura) AS description,
				CONCAT(sedes.nombre, '. Docente: ', usuarios.nombres, ' ', usuarios.apellidos) AS location,
				CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_inicio) AS start,
				CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_fin) AS end,
				CASE
					WHEN reservas.estado = '0' THEN '#ff3333' -- CANCELADA
					WHEN reservas.estado = '1' THEN '#33beff' -- RESERVADO
					WHEN reservas.estado = '2' THEN '#29c300' -- CONFIRMADA
					ELSE '#33beff'
				END AS backgroundColor
			FROM 
				reservas
			JOIN salas ON reservas.id_sala = salas.id
			JOIN sedes ON reservas.id_sede = sedes.id
			JOIN usuarios ON reservas.id_usuario = usuarios.id
			$comodin
			";

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

if ($formulario == "crear_reserva_masiva") {

	$inicio_reserva = variable_exterior("inicio_reserva");
	$fin_reserva = variable_exterior("fin_reserva");
	$hora_inicio_reserva = variable_exterior("hora_inicio_reserva");
	$hora_fin_reserva = variable_exterior("hora_fin_reserva");
	$sede_masivo = variable_exterior("sede_masivo");
	$sala_masivo = variable_exterior("sala_masivo");
	$id_docente = variable_exterior("id_docente_masivo");
	$nombre_asignatura = variable_exterior("nombre_asignatura_masivo");
	$nombre_dia = variable_exterior("nombre_dia");
	$id_usuario = $_SESSION['id_usuario'];
	// Definir el rango de fechas
	$startDate = new DateTime($inicio_reserva); // Fecha de inicio
	$endDate = new DateTime($fin_reserva);   // Fecha de fin

	// Añadir un día extra al final para incluir el 31 de diciembre
	$endDate->modify('+1 day');

	// Array para almacenar los lunes
	$errores = [];
	$completado = 0;
	$lunesReservas = [];

	// Iterar sobre el rango de fechas
	while ($startDate < $endDate) {
		// Verificar si el día es lunes (1 = Lunes en PHP)
		if ($startDate->format('N') == $nombre_dia) {
			// Guardar la fecha de lunes
			$lunesReservas[] = $startDate->format('Y-m-d');
		}
		// Avanzar un día
		$startDate->modify('+1 day');
	}

	$nombre_dia_semana = "";
	switch ($nombre_dia) {
		case '1':
			$nombre_dia_semana = 'LUNES';
			break;
		case '2':
			$nombre_dia_semana = 'MARTES';
			break;
		case '3':
			$nombre_dia_semana = 'MIÉRCOLES';
			break;
		case '4':
			$nombre_dia_semana = 'JUEVES';
			break;
		case '5':
			$nombre_dia_semana = 'VIERNES';
			break;
		case '6':
			$nombre_dia_semana = 'SABADO';
			break;

		default:
			# code...
			break;
	}

	// Imprimir los lunes del rango
	foreach ($lunesReservas as $fecha_dia) {
		// echo "Reserva para el lunes: $fecha_dia\n";

		$sql = "SELECT 
                    COUNT(*) AS cont
                FROM 
                    salas
                LEFT JOIN reservas
                    ON salas.id = reservas.id_sala
                    AND reservas.fecha_reserva = '$fecha_dia'
                    AND reservas.hora_reserva_inicio BETWEEN '$hora_inicio_reserva' AND '$hora_fin_reserva'
                    AND reservas.hora_reserva_fin BETWEEN '$hora_inicio_reserva' AND '$hora_fin_reserva'
                WHERE salas.id_sede = '$sede_masivo' 
				AND reservas.id_sala = '$sala_masivo' ";

		$query = $dbm->prepare($sql);
		$query->execute();
		$cont_registro = array_asociativo($query);
		if ($cont_registro[0]['cont'] == 0) {
			// PUEDE AGENDAR 
			$nombre_sala = nombre_sala($sala_masivo, $dbm)['nombre'];
			$nombre_sede = nombre_sede($sede_masivo, $dbm)['nombre'];
			$nombredocente = nombre_usuarios($id_docente, $dbm)['nombres'] . nombre_usuarios($id_docente, $dbm)['apellidos'];
			$datos['email_enviar'] = nombre_usuarios($id_docente, $dbm)['email'];

			$detalle = "La reserva ha sido generada de manera exitosa, los datos de la reserva son los siguientes: 
			$nombre_sala
			Sede: $nombre_sede 
			Fecha inicio: $fecha_dia $hora_inicio_reserva - Fecha Fin: $fecha_dia $hora_fin_reserva
			Docente: $nombredocente ";
			$sql = "INSERT INTO 
					reservas
						( estado, id_sede, id_usuario_creacion, id_sala, fecha_reserva, hora_reserva_inicio, hora_reserva_fin, observacion_reserva, asignatura, id_usuario) 
					VALUES 
						('1','$sede_masivo','$id_usuario','$sala_masivo','$fecha_dia','$hora_inicio_reserva','$hora_fin_reserva','Observacion: $detalle','$nombre_asignatura',$id_docente)";
			$query = $dbm->prepare($sql);
			if ($query->execute()) {
				$completado++;
			} else {
				var_dump("errorrrrrrrrrrrrrrrrr");
				die;
			}
		} else {
			$errores[] = " Para el dia $fecha_dia no se pudo agendar en el horario de $hora_inicio_reserva - $hora_fin_reserva debido a que se encuentra ocupada";
		}
	}
	if (empty($errores)) {
		$mensaje = "Se generaron $completado reservas para el día seleccionado";
?>
		<script>
			alert("<?php echo $mensaje ?>");
		</script>
	<?php } else {

		$errores_string = implode(", ", $errores);
		$mensaje = "Se generaron  $completado reservas para el día seleccionado, sin embargo se tuvieron los siguientes inconvenientes: " . $errores_string;
	?>
		<script>
			alert("<?php echo $mensaje ?>");
		</script>
<?php };
	$datos['libreria'] = 'src/plugins/PHPMailer-master/PHPMailerAutoload.php';
	$datos['asunto'] = 'Reserva de sala Unicatólica masiva exitosa';

	$datos['detalle'] = "
	  El personal administrativo realizó con éxito la reserva de la sala $nombre_sede - $nombre_sala  para los días $nombre_dia_semana en el rango de fechas $inicio_reserva a $fin_reserva y en el horario $hora_inicio_reserva a $hora_fin_reserva.
	<br>
	¡Recuerde! Debe presentarse en el horario establecido para realizar la confirmación de la misma, ya que puede realizarse una cancelación automática después de 30 minutos.
	<br>
	Favor no responder a este correo ya que fue generado automáticamente por el sistema";

	enviar_mail_rese($datos);
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

$comodin = "";
if ($_SESSION['id_rol'] == 2) {
	$comodin .= " AND id_usuario = '" . $_SESSION['id_usuario'] . "'";
}

$sql = "SELECT 
				CASE
					WHEN reservas.estado = '0' THEN 'CANCELADA' -- CANCELADA
					WHEN reservas.estado = '1' THEN 'RESERVADO' -- RESERVADO
					WHEN reservas.estado = '2' THEN 'CONFIRMADA' -- CONFIRMADA
					ELSE 'RESERVADO'
				END AS estado_reserva,
				CONCAT('Reserva exitosa #', reservas.id, ' - ', 
					CASE
						WHEN reservas.estado = '0' THEN 'CANCELADA'
						WHEN reservas.estado = '1' THEN 'RESERVADO'
						WHEN reservas.estado = '2' THEN 'CONFIRMADA'
						ELSE 'RESERVADO'
					END) AS title,
				CONCAT(salas.nombre, '. Bloque: ', salas.bloque, 
					'. Capacidad de estudiantes: ', salas.capacidad_estudiantes, 
					'. Aire: ', salas.aire_acondicionado, 
					'. Video Beam: ', salas.video_beam, 
					'. Asignatura: ', reservas.asignatura) AS description,
				CONCAT(sedes.nombre, '. Docente: ', usuarios.nombres, ' ', usuarios.apellidos) AS location,
				CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_inicio) AS start,
				CONCAT(reservas.fecha_reserva, ' ', reservas.hora_reserva_fin) AS end,
				CASE
					WHEN reservas.estado = '0' THEN '#ff3333' -- CANCELADA
					WHEN reservas.estado = '1' THEN '#33beff' -- RESERVADO
					WHEN reservas.estado = '2' THEN '#29c300' -- CONFIRMADA
					ELSE '#33beff'
				END AS backgroundColor
			FROM 
				reservas
			JOIN salas ON reservas.id_sala = salas.id
			JOIN sedes ON reservas.id_sede = sedes.id
			JOIN usuarios ON reservas.id_usuario = usuarios.id
			$comodin
			";

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
