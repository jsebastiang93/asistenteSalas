<?php


function enviar_mail_em($datos)
{

	date_default_timezone_set('America/Bogota');

	require_once $datos['libreria'];
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.gmail.com";
	$mail->Port =  587;
	$mail->SMTPSecure = 'TLS';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "calidad.tic@unidadso.com.co";
	//Password to use for SMTP authentication
	$mail->Password = "Proyectos2023*";
	//Set who the message is to be sent from
	$mail->setFrom('calidad.tic@unidadso.com.co', 'Inconsistencia registrada en salas de cómputo');
	//Set who the message is to be sent to
	$mail->addAddress($datos['email_enviar']);
	$mail->addReplyTo($datos['email_enviar']);
	//Set the subject line
	$mail->Subject = 'Inconsistencia registrada en salas de cómputo';
	$mail->CharSet = 'UTF-8';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$body = "
			Se registró la siguiente inconsistencia en la sala de cómputo " . $datos['sala'] . ", con la siguiente información:
			" . $datos['inconsistencia'] . " <br>
			Favor no responder a este correo ya que fue generado automáticamente por el sistema.
		";
	$mail->msgHTML($body);
	//$mail->addAttachment('images/phpmailer_mini.png');

	if ($mail->send()) {
		$respuesta = "";
	} else {
		$respuesta = "ERROR DE ENVIO: " . $mail->ErrorInfo;
	}
	// $respuesta = "";

	return $respuesta;
}


function enviar_mail_reserva($datos)
{

	date_default_timezone_set('America/Bogota');

	require_once $datos['libreria'];
	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.gmail.com";
	$mail->Port =  587;
	$mail->SMTPSecure = 'TLS';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "calidad.tic@unidadso.com.co";
	//Password to use for SMTP authentication
	$mail->Password = "Proyectos2023*";
	//Set who the message is to be sent from
	$mail->setFrom('calidad.tic@unidadso.com.co', $datos['asunto']);
	//Set who the message is to be sent to
	$mail->addAddress($datos['email_enviar']);
	$mail->addReplyTo($datos['email_enviar']);
	//Set the subject line
	$mail->Subject = $datos['asunto'];
	$mail->CharSet = 'UTF-8';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$body = $datos['detalle'];
	$mail->msgHTML($body);
	//$mail->addAttachment('images/phpmailer_mini.png');

	if ($mail->send()) {
		$respuesta = "";
	} else {
		$respuesta = "ERROR DE ENVIO: " . $mail->ErrorInfo;
	}
	// $respuesta = "";

	return $respuesta;
}

