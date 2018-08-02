<?php
	session_start();
	if (!isset($_SESSION["usuario"])) header("location: ../?p=ingreso");
		
	require 'db.php';

	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		//ACA DEBERA PROCESAR LOS DATOS
		$id = $_POST["id"];
		//ACA VALIDAR DATOS ENVIADOS DESDE EL FORM, COMO EJ. NOMBRE NO PUEDE ESTAR VACIO, PRECIO TAMPOCO, MARCA Y CATEGORIA DISTINTO DE VACIO O 0.
		$datos = array(
			"Nombre" 	=> filter_var($_POST ["nombre"], FILTER_SANITIZE_STRING),
			"Precio" 	=> $_POST ["precio"],
			"Marca" 	=> filter_var($_POST ["marca"], FILTER_VALIDATE_INT),
			"Categoria" => filter_var(1, FILTER_VALIDATE_INT),
			"Detalle"	=> filter_var($_POST ["detalle"], FILTER_SANITIZE_STRING),
			"Imagen" 	=> "http://image.ibb.co/hK2VTT/sin_foto.jpg",
			"Stock" 	=> filter_var($_POST ["stock"], FILTER_VALIDATE_INT)
		);

		if (Actualizar($id, $datos)) {
			header("location: index.php?rta=ok");
		} else {
			header("location: index.php?rta=error");
		}

	} else {
		//ACA DEBERA MOSTRAR EL FORMULARIO
		if (!isset($_GET ["id"]) || !filter_var($_GET ["id"], FILTER_VALIDATE_INT) || $_GET ["id"] < 0) header("location: index.php");
		
		$id = $_GET ["id"];

		$p = Obtener($id);

		include "../header.php";
?>

<div class="container">
	<h1>Actualizar producto</h1>

	<form method="post" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="nombre" value="<?php echo $p ['Nombre'] ?>">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="precio"  step="any" value="<?php echo $p ['Precio'] ?>">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="stock" value="<?php echo $p ['Stock'] ?>">

		<label class="control-label">Marca:</label>
		<input class="form-control" type="text" name="marca" value="2">

		<label class="control-label">Detalle:</label>
		<textarea class="form-control" rows="5" name="detalle"><?php echo $p ['Detalle'] ?></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="imagen" class="form-control-file">
		<span class="help-block">Seleccione un archivo, debe ser .jpg</span>
		
		<br>
		
		<button type="submit" class="btn btn-warning">Guardar</button>
		<input type="hidden" name="id" value="<?php echo $p ['idProducto'] ?>">
	</form>

</div>

<?php
	include "../footer.php";
	}
?>