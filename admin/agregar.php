<?php

	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		//ACA DEBERA PROCESAR LOS DATOS
		include "db.php";

		if ($_FILES ["imagen"] ["error"] == 0) { //SE SUBIO UN ARCHIVO Y SI EL ERROE ES 0, ES QUE SUBIO CORRECTAMENTE
			
			$tipo = exif_imagetype($_FILES ["imagen"] ["tmp_name"]);
			$permitidos = array (IMAGETYPE_JPEG, IMAGETYPE_PNG);

			if ( in_array($tipo, $permitidos) ) { //CON IN_ARRAY BUSCA ADENTRO DEL ARRAY SI EL TIPO ES PERMITIDO
				
				$nombre = uniqid("producto_"); //CON UNIQID CREAMOS EL NOMBRE DEL ARCHIVO CON EL PREFIJO PRODUCTO_ Y GENERA CODIGO RAMDOM
				$extension = pathinfo($_FILES ["imagen"] ["name"], PATHINFO_EXTENSION); //PATHINFO BUSCA LA EXTENSION DEL ARCHIVO ORIGINAL

				$directorio = $_SERVER ["DOCUMENT_ROOT"] . "/MercadoTECH/images/productos/{$nombre}.{$extension}"; // ESTE PUNTO ES DE LA EXTENSION
				if (move_uploaded_file($_FILES ["imagen"] ["tmp_name"], $directorio)) { //COMPRUEBA SI PUDO SUBIR EL ARCHIVO A LA CARPETA INDICADA
					
					//ej. http://127.0.0.1/MercadoTECH/images/productos/producto_njn373.jpg
					$imagen = $_SERVER ["REQUEST_SCHEME"] . "://" . $_SERVER ["SERVER_NAME"] . "/MercadoTECH/images/productos/{$nombre}.{$extension}";

				}
			}

		} else {

			$imagen = "http://image.ibb.co/hK2VTT/sin_foto.jpg";
		}

		//ACA DEBERIA GUARDA VALIDACION DE CADA CAMPO DATO...
		$datos = array(
			"Nombre" 	=> filter_var($_POST ["nombre"], FILTER_SANITIZE_STRING),
			"Precio" 	=> $_POST ["precio"],
			"Marca" 	=> filter_var($_POST ["marca"], FILTER_VALIDATE_INT),
			"Categoria" => filter_var(1, FILTER_VALIDATE_INT),
			"Detalle"	=> filter_var($_POST ["detalle"], FILTER_SANITIZE_STRING),
			"Imagen" 	=> $imagen,
			"Stock" 	=> filter_var($_POST ["stock"], FILTER_VALIDATE_INT)
		);

		//print_r($datos);
		//die();
		if (Insertar($datos)) {
			header("location: index.php?rta=ok");
		} else {
			header("location: index.php?rta=error");
		}

	} else {
		//ACA DEBERA MOSTRAR EL FORMULARIO
	
	include "../header.php";
?>

<div class="container">
	<h1>Agregar nuevo producto</h1>

	<form method="post" class="form-horizontal" enctype="multipart/form-data">

		<label class="control-label">Nombre:</label>
		<input class="form-control" type="text" name="nombre">

		<label class="control-label">Precio:</label>
		<input class="form-control" type="number" name="precio">

		<label class="control-label">Stock:</label>
		<input class="form-control" type="number" name="stock">

		<label class="control-label">Marca:</label>
		<input class="form-control" type="text" name="marca">

		<label class="control-label">Detalle:</label>
		<textarea class="form-control" rows="5" name="detalle"></textarea>
		
		<label class="control-label">Imagen:</label>
		<input type="file" name="imagen" class="form-control-file" accept=".jpg, .jpeg, .png">
		<span class="help-block">Seleccione un archivo, debe ser .jpg o .png</span>
		
		<br>
		
		<button type="submit" class="btn btn-success">Guardar</button>

	</form>

</div>

<?php
	include "../footer.php";

	}
?>