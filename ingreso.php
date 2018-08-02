<?php
	
	session_start();
	if (isset($_SESSION["usuario"])) header("location: admin/index.php");

	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		
		require "admin/usuario.php";

		//ACA VALIDAMOS LOS DATOS INGRESADOS DESDE EL FORMULARIO
		//.......

		$datos = array (
			"Email" 	=> $_POST ["email"],
			"Pass"		=> $_POST ["pass"]
		);

		iniciarSesion($datos);

	} else {

?>
<section id="page">
	<div class="account_grid">
		<div class="login-right">
			<h3>INGRESO DE USUARIO</h3>
			<form method="post" id="formLogin">
				<div>
					<span>E-Mail:</span>
					<input type="text" name="email" id="email">
					<p id="resp-email"></p> 
				</div>
				<div>
					<span>Contraseña:</span>
					<input type="password" name="pass" id="pass"> 
					<p id="resp-pass"></p> 
				</div>
				<input type="submit" value="Ingresar">
				<br>
				<a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
			</form>
		</div>	
		<div class=" login-left">
			<h3>¿NUEVO USUARIO?</h3>
			<a class="acount-btn" href="./?p=registro">Crear una cuenta</a>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>

<?php
}
?>