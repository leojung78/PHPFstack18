<?php
	require 'admin/mail.config.php';
	//print_r($_POST);
	//var_dump($_POST);
	//print_r($_SERVER);

	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		
		//validacion de campos, nombre, email y mensaje
		if (empty($_POST["nombre"]) || strlen($_POST["nombre"]) < 3 || preg_match('/[0-9]/',$_POST["nombre"])) {
			echo "Error, ingrese un nombre valido, no debe incluir numeros y simbolos...";

		//} elseif (empty($_POST["email"]) || strpos($_POST["email"], "@") == -1) {
		} elseif (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			echo "Error, ingrese un correo electronico valido...";

		} elseif (empty($_POST["mensaje"]) || strlen($_POST["mensaje"]) < 10 || strlen($_POST["mensaje"]) > 280) {
			echo "Error, ingrese un mensaje de 10 hasta 280 caracteres...";
		
		} else {
			//enviar datos por email porque son validos.
			$nombre  = filter_var($_POST["nombre"], FILTER_SANITIZE_SPECIAL_CHARS);
			$email   = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
			$mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_SPECIAL_CHARS);
			//$mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);

			$destinatario = "leojung78@gmail.com";
			$asunto = "Consulta desde MercadoTECH";
			
			$cuerpo = "<h1>Datos de la consulta</h1>";
			$cuerpo.= "<p><b>Nombre:</b> {$nombre}</p>";
			$cuerpo.= "<p><b>E-Mail:</b> {$email}</p>";
			$cuerpo.= "<p><b>Mensaje:</b> </p>";
			$cuerpo.= "<blockquote>{$mensaje}</blockquote>";

			//echo $cuerpo;

			
			# Configuracion del envio
			$mail->setFrom($email, $nombre);						// ◄ Emisor
			$mail->addAddress($destinatario, 'Info MercadoTECH');	// ◄ Destinatario
			//$mail->addReplyTo('info@example.com', 'Information');	// ◄ E-Mail de respuesta (opcional)
			$mail->addCC($email, $nombre);							// ◄ E-Mail adicional en Copia Compartida (opcional)
		    //$mail->addBCC('bcc@example.com');						// ◄ E-Mail adicional en Copia Compartida Oculta (opcional)
			
			# Configuracion del email
			$mail->isHTML(true);									// ◄ Soporte para HTML (true/false)
			$mail->Subject = $asunto;								// ◄ Asunto del E-Mail
			$mail->Body = $cuerpo;									// ◄ Cuerpo del E-Mail
			$mail->CharSet = 'UTF-8';								// ◄ Caracteres en utf-8
			$mail->SMTPDebug = 0;									// ◄ Visualizador para testeo (0: apagado | 1: mensajes del cliente | 2: mensajes del cliente y servidor)

			if ($mail->send()) {
		    	echo "Gracias por su consulta!";
			} else {
		    	echo "Ocurrio un error, intentelo de nuevo...";
			}
		
		}

	} else {
		header("location: index.php?p=contacto");
	}


?>