<?php
	require 'db.php';

	include "../header.php";

	$productos = Obtener();
?>
<div class="container">
	<cite>
		Bienvenido Cosme Fulanito
		<a href="#" style="float:right">[x] Cerrar sesion</a>
	</cite>

	<h1>Listado de Productos</h1>

	
	<a href="admin/agregar.php" style="float:right">
		<button class="btn btn-success">+ Nuevo producto</button>
	</a>
	<br>
	<div class="table-responsive">

		<table class="table table-striped"">
			<tr>
				<th>#ID</th>
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Acciones</th>
			</tr>
			<!-- PLANTILLA DE UN PRODUCTO -->
			<?php 
				foreach ($productos as $p) {
			?>
			<tr>
				<td class="text-center"> <?php echo $p ["idProducto"]  ?> </td>
				<td class="text-center"><img src="<?php echo $p ["Imagen"]  ?>" alt="" width="100"></td>
				<td class="text-center"> <?php echo $p ["Nombre"]  ?> </td>
				<td class="text-center">$ <?php echo $p ["Precio"]  ?> </td>
				<td class="text-center"> <?php echo $p ["Stock"] ?> unid. </td>
				<td class="text-center">
					<a href="admin/actualizar.php?id=<?php echo $p ["idProducto"] ?>">Actualizar</a> /
					<a class="eliminar" href="admin/eliminar.php?id=<?php echo $p ["idProducto"] ?>"> Eliminar</a>
				</td>
			</tr>
		<?php } ?>
		</table>

	</div>
</div>
<script>
	$(document).ready(function(){
		
		$(".eliminar").click(function(e){
			e.preventDefault();

			if (confirm("Esta seguro que desea borrar este producto?")) 
				window.location.href = $(this).attr("href");
		});

	});
</script>
<?php include "../footer.php"; ?>