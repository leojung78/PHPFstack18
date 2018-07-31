<?php 

	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		
		require "admin/usuario.php";

		$datos = array (
			"Email" => $_POST ["email"],
			"Pass"	=> $_POST ["pass"]
		);

		crearUsuario($datos);

	} else {



?>
<section id="page">
	<div class="register">
		<div class="register-top-grid">
			<h3>NUEVO USUARIO</h3>
			<form method="post">
				<div class="mation">
					<span>Nombre: <label>*</label></span>
					<input type="text" name="nombre"> 
					<span>Apellido: <label>*</label></span>
					<input type="text" name="apellido"> 
					<span>E-Mail: <label>*</label></span>
					<input type="text" name="email">
					<span>Contraseña: <label>*</label></span>
					<input type="password" name="pass">
					<div class="register-but">
						<input type="submit" value="Registrarme">
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>

</section>

<?php } ?>