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
        // HAY SALAS DISPONIBLES
        $sql = "SELECT salas.*
                        FROM salas
                        WHERE salas.id_sede = '$id_sede'
                        AND NOT EXISTS (
                            SELECT 1
                            FROM reservas
                            WHERE reservas.id_sala = salas.id
                                AND reservas.estado = '1'
                                AND reservas.fecha_reserva = '$fecha_inicio'
                                AND (
                                    (reservas.hora_reserva_inicio <= '$hora_inicio' AND reservas.hora_reserva_fin >= '$hora_fin')
                                )
                        ); ";
        // echo $sql;
        $query = $dbm_mysql->prepare($sql);
        $query->execute();
        $salas_disponibles = array_($query);
        if (empty($salas_disponibles)) {
            $mensaje = "no";
            $salas_disponibles = [];
        } else {
            $mensaje = "ok";
        }
        $response = array('mensaje' => $mensaje, 'salas_disponibles' => $salas_disponibles);
    }

    if ($data['accion'] == "eliminar_reserva") {
        $id_reserva = explode('-', $data['id_reserva'])[0];
        $idusuario = $data['idusuario'];
        $motivo = $data['motivo'];

        $sql = "UPDATE reservas SET estado = 0, observacion_cancelacion = '$motivo', fecha_cancelacion = '$fecha_hora_hoy',id_usuario_cancelacion = '$idusuario' WHERE id = $id_reserva";
        $query = $dbm_mysql->prepare($sql);
        if ($query->execute()) {
            $response = array('mensaje' => 'ok',);
        } else {
            $response = array('mensaje' => 'no',);
        }
    }

    if ($data['accion'] == "confirmar_reserva") {
        $id_reserva = explode('-', $data['id_reserva'])[0];
        $idusuario = $data['idusuario'];

        $sql = "UPDATE reservas SET estado = 2, fecha_confirmacion = '$fecha_hora_hoy',id_usuario_confirmacion = '$idusuario' WHERE id = $id_reserva";
        $query = $dbm_mysql->prepare($sql);
        if ($query->execute()) {
            $response = array('mensaje' => 'ok',);
        } else {
            $response = array('mensaje' => 'no',);
        }
    }

    if ($data['accion'] == "generar_inconsistencia") {
        $id_reserva = explode('-', $data['id_reserva'])[0];
        $idusuario = $data['idusuario'];
        $inconsistencia = $data['inconsistencia'];

        $sql = "SELECT id_sala FROM reservas WHERE id = $id_reserva";
        $query = $dbm_mysql->prepare($sql);
        $query->execute();
        $id_sala = array_($query);
        if ($id_sala[0]['id_sala']) {
            $sql = "INSERT INTO reservas_inconsistencias
                    (id_reserva, estado, comentarios_inconsistencia, fecha_creacion, id_usuario_creacion, id_sala) 
                VALUES 
                    ('$id_reserva','1','$inconsistencia','$fecha_hora_hoy','$idusuario', '" . $id_sala[0]['id_sala'] . "')
                ";
            $query = $dbm_mysql->prepare($sql);
            if ($query->execute()) {
                $response = array('mensaje' => 'ok',);
            } else {
                $response = array('mensaje' => 'no',);
            }
        } else {
            $response = array('mensaje' => 'no',);
        }
    }
    if ($data['accion'] == "consulta_inconsistencias") {
        $id_sala = explode("/",$data['id_sala'])[0];

        $sql = "SELECT 
                    GROUP_CONCAT(comentarios_inconsistencia SEPARATOR ', ') AS comentarios_concatenados
                FROM 
                    reservas_inconsistencias 
                WHERE 
                    id_sala = $id_sala 
                    AND estado = 1;";
        $query = $dbm_mysql->prepare($sql);
        $query->execute();
        $comentarios_concatenados = array_($query);
        $response = array('mensaje' => 'ok', 'comentarios_concatenados' => $comentarios_concatenados);
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
        $id_docente =  explode('/**', $data['data']['id_docente'])[0];
        $nombredocente =  explode('/**', $data['data']['id_docente'])[1];
        $id_usuario = $data['data']['id_usuario'];
        $detalle = "La reserva ha sido generada de manera exitosa, los datos de la reserva son los siguientes: 
        $detalle_sala
        Sede: $nombre_sede 
        Fecha inicio: $fecha_reserva $hora_inicio - Fecha Fin: $fecha_reserva $hora_fin
        Docente: $nombredocente ";
        $sql = "INSERT INTO 
                reservas
                    ( nombre, estado, id_sede, id_usuario, id_sala, fecha_reserva, hora_reserva_inicio, hora_reserva_fin, observacion_reserva, asignatura, id_usuario_asignado) 
                VALUES 
                    ('Reserva exitosa','1','$id_sede','$id_usuario','$id_sala','$fecha_reserva','$hora_inicio','$hora_fin','Observacion: $detalle','$nombre_asignatura',$id_docente)";
        $query = $dbm_mysql->prepare($sql);
        if ($query->execute()) {
            $id_ultimo = $dbm_mysql->lastInsertId();
            $response = array('mensaje' => 'ok', 'numero_reserva' => $id_ultimo, 'title' => 'Reserva exitosa #' . $id_ultimo, 'description' => $detalle_sala . '. Docente: ' . $nombredocente . ' . Asignatura: ' . $nombre_asignatura, 'location' => 'Sede: ' . $nombre_sede);
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
