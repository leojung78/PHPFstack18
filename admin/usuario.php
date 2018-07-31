<?php
	require 'db.php';

	function crearUsuario($nuevo){
		
		$conexion = Conexion();

		$email_usuario = filter_var($nuevo["Email"], FILTER_SANITIZE_EMAIL);
		$pass_encriptada = password_hash($nuevo["Pass"], PASSWORD_DEFAULT);


		$agregar = $conexion->prepare("INSERT INTO usuarios (email, password) VALUES (:e, :p)");

		$agregar->bindParam(":e", $email_usuario, PDO::PARAM_STR);
		$agregar->bindParam(":p", $pass_encriptada, PDO::PARAM_STR);
		
		if( $agregar->execute() ){
			echo "se agrego usuario correctamente";
			//return true;
		} else {
			echo "Ocurrio un error :(";
			//return false;
		}
	
	}

	function iniciarSesion(){

	}

	function cerrarSesion(){

	}
?>