<?php


function enviar_mail($email, $asunto, $tipo, $nombre_personal, $detalle, $url_id, $id_procesos)
{

	$respuesta = "";
	$email = $email;
	$asunto = $asunto;
	$tipo = $tipo;
	$nombre_personal = $nombre_personal;
	$detalle = $detalle;
	$url_id = $url_id;

	date_default_timezone_set('America/Bogota');
	$link = "<tr>
		                    <td align='center' style='padding: 10px 10px 10px 10px; font-size: 25px; font-family: Nunito, sans-serif; font-weight: normal; color: #333333;' class='padding-copy' colspan='2'>
		                        <a href='" . $nombre_personal . "' target='_blank' style='font-size: 15px; font-family: Nunito, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #0764A9; border-top: 10px solid #0764A9; border-bottom: 10px solid #0764A9; border-left: 20px solid #0764A9; border-right: 20px solid #0764A9; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block;' class='mobile-button'>Ingresar a TELECONSULTA &rarr;</a>
		                    </td>
		</tr>";

	switch ($url_id) {
		case 'historia':
			require_once '../plugins/PHPMailer-master/PHPMailerAutoload.php';
			break;
		case 'historia_editar':
			require_once '../plugins/PHPMailer-master/PHPMailerAutoload.php';
			break;
		default:
			require_once 'src/plugins/PHPMailer-master/PHPMailerAutoload.php';
			$link = "<tr>
		                    <td align='center' style='padding: 10px 10px 10px 10px; font-size: 25px; font-family: Nunito, sans-serif; font-weight: normal; color: #333333;' class='padding-copy' colspan='2'>
		                        <a href=' ' target='_blank' style='font-size: 15px; font-family: Nunito, sans-serif; font-weight: normal; color: #ffffff; text-decoration: none; background-color: #0764A9; border-top: 10px solid #0764A9; border-bottom: 10px solid #0764A9; border-left: 20px solid #0764A9; border-right: 20px solid #0764A9; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; display: inline-block;' class='mobile-button'>Ingresar a ASIS SALAS &rarr;</a>
		                    </td>
					</tr>";
			break;
	}
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
	//Set the hostname of the mail server
	$mail->Host = "smtp.gmail.com";
	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port =  587;
	$mail->SMTPSecure = 'TLS';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
	$mail->Username = "correo";
	//Password to use for SMTP authentication
	$mail->Password = "contraseña";
	//Set who the message is to be sent from
	$mail->setFrom('correo', 'SICUSO - Notificacion');
	//Set who the message is to be sent to
	$mail->addAddress($email, $email);
	$mail->addReplyTo($correo);
	//Set the subject line
	$mail->Subject = utf8_decode($asunto);
	$mail->CharSet = 'UTF-8';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$body = "
		";
	$mail->msgHTML(utf8_decode($body));
	$mail->AltBody = "SICUSO - " . $asunto . " - " . $tipo . "";
	//$mail->addAttachment('images/phpmailer_mini.png');

	if ($mail->send()) {
		$respuesta = "Envio Correo Satisfactorio!";
	} else {
		$respuesta = "ERROR DE ENVIO: " . $mail->ErrorInfo;
	}
	// $respuesta = "";

	return $respuesta;
}
