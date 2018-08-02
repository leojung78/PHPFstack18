<?php

	if (isset($_GET["accion"]) && $_GET["accion"] == "cerrar")
		cerrarSesion();
		

	require 'db.php';

	function crearUsuario($nuevo){
		
		$conexion = Conexion();

		$nombre_usuario  = filter_var($nuevo["Nombre"], FILTER_SANITIZE_SPECIAL_CHARS);
		$apellido_usuario  = filter_var($nuevo["Apellido"], FILTER_SANITIZE_SPECIAL_CHARS);
		$email_usuario = filter_var($nuevo["Email"], FILTER_SANITIZE_EMAIL);
		$pass_encriptada = password_hash($nuevo["Pass"], PASSWORD_DEFAULT);


		$agregar = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, email, password) VALUES (:n, :a, :e, :p)");

		$agregar->bindParam(":n", $nombre_usuario, PDO::PARAM_STR);
		$agregar->bindParam(":a", $apellido_usuario, PDO::PARAM_STR);
		$agregar->bindParam(":e", $email_usuario, PDO::PARAM_STR);
		$agregar->bindParam(":p", $pass_encriptada, PDO::PARAM_STR);
		
		if( $agregar->execute() ){
			echo "Se agrego usuario correctamente";
			//return true;
		} else {
			echo "Ocurrio un error :(";
			//return false;
		}
	
	}



	function iniciarSesion($datos){

		$conexion = Conexion();

		$email_usuario = filter_var($datos["Email"], FILTER_SANITIZE_EMAIL);
		$pass_usuario  = filter_var($datos["Pass"], FILTER_SANITIZE_SPECIAL_CHARS);		

		$usuario = $conexion->prepare("SELECT idUsuario, nombre, apellido, email, password FROM usuarios WHERE email = :e");
		$usuario->bindParam(":e", $email_usuario, PDO::PARAM_STR);

		if ($usuario->execute() && $usuario->rowCount() == 1) {
			//print_r($usuario->fetch(PDO::FETCH_ASSOC));

			$usuario = $usuario->fetch(PDO::FETCH_ASSOC);

			//AHORA CHEQUEAMOS SI LA CONTRASEÑA INGRESADA ES IGUALA ALA ENCRIPTADA
			if (password_verify($pass_usuario, $usuario["password"])) {
				//PERFECTO, USUARIO Y/O CONTRASEÑASON IGUALES
				//echo "Bienvenido al Sistema...";
				session_start();
				$_SESSION ["usuario"] = array(
					"id" 		=> $usuario["idUsuario"],
					"nombre" 	=> $usuario["nombre"],
					"apellido" 	=> $usuario["apellido"],
					"email" 	=> $usuario["email"]
				);
				header("location: admin/index.php");


			} else {
				echo "ERROR: usuario y/o contraseña incorrectos...";
			}

		} else {
			echo "ERROR: usuario y/o contraseña incorrectos...";
		}





	}



	function cerrarSesion(){
		session_start();
		unset($_SESSION);
		session_destroy();

		header("location: ../?p=ingreso");
	}
?>