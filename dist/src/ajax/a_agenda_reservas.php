<?php
include "../../seguridad/conexion.php";

session_start();
$hora_actual = date("H:i:s");
$dbm_mysql = conectar_mysql();
$response = [];
$fecha_hora_hoy = date("Y-m-d H:i:s");
$fecha_hoy = date("Y-m-d");

// Verificar si la solicitud es una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recibir los datos enviados por la solicitud POSenviar_emailT
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data['accion'] == "consulta_sala") {

        $id_sede = explode('/', $data['sede'])[0];
        $fecha_inicio = $data['fecha_inicio'];
        $fecha_fin = $data['fecha_inicio'];
        $hora_inicio = $data['hora_inicio'];
        $hora_fin = $data['hora_fin'];
        $sql = "SELECT 
                    COUNT(*) AS cont
                FROM 
                    salas
                LEFT JOIN reservas
                    ON salas.id = reservas.id_sala
                    AND reservas.fecha_reserva = '$fecha_inicio'
                    AND reservas.hora_reserva_inicio BETWEEN '$hora_inicio' AND '$hora_fin'
                    AND reservas.hora_reserva_fin BETWEEN '$hora_inicio' AND '$hora_fin'
                WHERE salas.id_sede = '$id_sede' AND reservas.id_sala IS NULL;
                ";
        $query = $dbm_mysql->prepare($sql);
        $query->execute();
        $cont_salas = array_($query);
        if ($cont_salas[0]['cont'] != 0) {
            // HAY SALAS DISPONIBLES
            $sql = "SELECT 
                        salas.*
                    FROM 
                        salas
                    LEFT JOIN reservas
                        ON salas.id = reservas.id_sala
                        AND reservas.fecha_reserva = '$fecha_inicio'
                        AND reservas.hora_reserva_inicio BETWEEN '$hora_inicio' AND '$hora_fin'
                        AND reservas.hora_reserva_fin BETWEEN '$hora_inicio' AND '$hora_fin'
                    WHERE salas.id_sede = '$id_sede' AND reservas.id_sala IS NULL;
                    ";
            $query = $dbm_mysql->prepare($sql);
            $query->execute();
            $salas_disponibles = array_($query);
            $mensaje = "ok";
        } else {
            $mensaje = "no";
            $salas_disponibles = [];
        }

        $response = array('mensaje' => $mensaje, 'salas_disponibles' => $salas_disponibles);
    }

    if ($data['accion'] == "generar_reserva") {

        $id_sede = explode('/', $data['data']['calendar_event_name'])[0];
        $nombre_sede = explode('/', $data['data']['calendar_event_name'])[1];
        $fecha_reserva = $fecha_fin = $data['data']['calendar_event_start_date'];
        $hora_inicio = $data['data']['calendar_event_start_time'];
        $hora_fin = $data['data']['calendar_event_end_time'];
        $id_sala = explode('/', $data['data']['id_sala'])[0];
        $detalle_sala = explode('/', $data['data']['id_sala'])[1];
        // $id_asignatura = explode('/', $data['data']['id_asignatura'])[0];
        // $nombre_asignatura = explode('/', $data['data']['id_asignatura'])[1];
        $nombre_asignatura = $data['data']['id_asignatura'];
        $id_usuario = $data['data']['id_usuario'];
        $detalle = "La reserva ha sido generada de manera exitosa, los datos de la reserva son los siguientes: 
        $detalle_sala
        Sede: $nombre_sede 
        Fecha inicio: $fecha_reserva $hora_inicio - Fecha Fin: $fecha_reserva $hora_fin ";
        $sql = "INSERT INTO 
                reservas
                    ( nombre, estado, id_sede, id_usuario, id_sala, fecha_reserva, hora_reserva_inicio, hora_reserva_fin, observacion_reserva, asignatura, fecha_creacion) 
                VALUES 
                    ('Reserva exitosa','1','$id_sede','$id_usuario','$id_sala','$fecha_reserva','$hora_inicio','$hora_fin','Observacion: $detalle','$nombre_asignatura', '$fecha_hora_hoy')";
        $query = $dbm_mysql->prepare($sql);
        if ($query->execute()) {
            $id_ultimo = $dbm_mysql->lastInsertId();
            $response = array('mensaje' => 'ok', 'numero_reserva' =>$id_ultimo, 'title' => 'Reserva exitosa #' . $id_ultimo, 'description' => $detalle_sala.' . Asignatura: '.$nombre_asignatura, 'location' => 'Sede: '.$nombre_sede);
        } else {
            $response = array('mensaje' => 'no',);
        }
    }
    echo json_encode($response);
} else {
    echo 'Solicitud no válida';
}

function array_($resultado)
{
    $var = array();
    while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $var[] = $fila;
    }
    return $var;
}
