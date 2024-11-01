
<?php

include "seguridad/conexion.php";
include "src/functions/main.php";
include "src/functions/email.php";
$fecha_hora_hoy = date("Y-m-d H:i:s");

setlocale(LC_TIME, "spanish");
date_default_timezone_set('America/Bogota');
$dbm = conectar_mysql();
$horaActual = new DateTime();

// Restar 30 minutos
$horaActual->modify('-30 minutes');

// Formatear la fecha y hora resultante (HH:MM:SS)
$horaHace30Minutos = $horaActual->format('H:i:s');


$sql = "SELECT *
FROM reservas
WHERE estado NOT IN (0, 2)
  AND fecha_reserva = CURRENT_DATE
  AND hora_reserva_inicio <= '$horaHace30Minutos'
";
$query = $dbm->prepare($sql);
$query->execute();
$result = array_asociativo($query);

$result_email = [];

foreach ($result as $key) {
    $sql = "UPDATE reservas SET estado = 0, observacion_cancelacion = 'Cancelada automáticamente por exceder tiempo para confirmación', fecha_cancelacion = '$fecha_hora_hoy',id_usuario_cancelacion = '0' 
    WHERE id = " . $key['id'];
    $query = $dbm->prepare($sql);
    if ($query->execute()) {
        $nombre_sala = nombre_sala( $key['id_sala'], $dbm)['nombre'];
        $nombre_sede = nombre_sede( $key['id_sede'], $dbm)['nombre'];
        $nombredocente = nombre_usuarios($key['id_usuario'], $dbm)['nombres'] . nombre_usuarios($key['id_usuario'], $dbm)['apellidos'];
        $datos['libreria'] = 'src/plugins/PHPMailer-master/PHPMailerAutoload.php';
        $datos['asunto'] = ' Cancelación automática de reserva # ' . $key['id'] . ' de sala Unicatólica exitosa';
        $datos['email_enviar'] = nombre_usuarios($key['id_usuario'], $dbm)['email'];
        $datos['detalle'] = "
           Se identificó que usted no realizó la confirmación de la reserva de la sala $nombre_sede - $nombre_sala para la fecha " .$key['fecha_reserva'] . " en el horario " .$key['hora_reserva_inicio'] . " - " .$key['hora_reserva_fin'] . ". Por lo cual ésta fue cancelada automáticamente.
            <br>
            ¡Recuerde! Debe presentarse en el horario establecido para realizar la confirmación de la misma, ya que por haber pasado 30 minutos sin la confirmación, ésta fue cancelada automáticamente.
            <br>
            Favor no responder a este correo ya que fue generado automáticamente por el sistema.

            ";
        enviar_mail_rese($datos);
    }else{
        echo "error 1";
    }
    # code...
}



?>