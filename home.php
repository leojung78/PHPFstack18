<?php 

	require 'admin/db.php';

	$productos = Obtener();	


?>

<section id="page">
	<!-- PRODUCTOS DESTACADOS -->
	<div class="shoes-grid">
		<div class="products">
			<h5 class="latest-product">PRODUCTOS DESTACADOS</h5>
		</div>
		<div class="product-left">
			<!-- Producto #1 -->
			<?php
				
				// for (CONTADOR; CONDICION; INCREMENTO) {
				foreach ($productos as $i=>$producto) {
				//for ($i = 0; $i < count($productos); $i++) {
					
					//ESTA ES OTRA FORMA DE HACER UN IF () {} ELSE {}
					//$VARIABLE = (CONDICION) ? VALOR_VERDADERO : VALOR_FALSO;
					$class = (($i+1) % 3 == 0) ? "grid-top-chain" : null; 

					//if ( ($i+1) % 3 == 0) { // Si s multiplo de 3...
					//	$class = "grid-top-chain";
					//} else { 
					//	$class = null;
					//}
				
			?>
			<div class="col-sm-4 col-md-4 chain-grid <?php echo $class; ?>">
				<a href="?p=producto&id=<?php echo $producto ["idProducto"]  ?>"><img class="img-responsive chain" src="<?php echo $producto ["Imagen"] ?>" alt="<?php echo $producto ["Nombre"]?>" /></a>
				<div class="grid-chain-bottom">
					<h6><a href="?p=producto&id=<?php echo $producto ["idProducto"]  ?>"><?php echo $producto ["Nombre"] ?></a></h6>
					<div class="star-price">
						<div class="dolor-grid"> 
							<span class="actual">$ <?php echo $producto ["Precio"] ?></span>
						</div>
						<a class="now-get get-cart" href="?p=producto&id=<?php echo $producto ["idProducto"] ?>">VER MÁS</a> 
						<div class="clearfix"></div>
					</div>
				</div>
			</div>	
				
			<?php 
				}
			?>

			<div class="clearfix"></div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-- ULTIMOS PRODUCTOS -->
	<div class="shoes-grid">
		<div class="products">
			<h5 class="latest-product">ULTIMOS PRODUCTOS</h5>	
			<a class="view-all" href="./?p=productos">VER TODOS<span></span></a>
		</div>
		<div class="product-left">
			<!-- Producto #1 -->
			<?php

				//for ($n = 0; $n < 3; $n++) {
				foreach ($ultimos as $i=>$ultimo) {
						
						
					$class = (($i+1) % 3 == 0) ? "grid-top-chain" : null; 

			?>

	        <div class="col-sm-4 col-md-4 chain-grid <?php echo $class; ?>">
	            <a href="?p=producto&id=<?php echo $ultimo ["idProducto"] ?>"><img class="img-responsive chain" src="<?php echo $ultimo ["Imagen"] ?>" alt="<?php echo $ultimo ["Nombre"] ?>" /></a>
	            <span class="star"></span>
	            <div class="grid-chain-bottom">
	                <h6><a href="?p=producto&id=<?php echo $ultimo ["idProducto"] ?>"><?php echo $ultimo ["Nombre"] ?></a></h6>
	                <div class="star-price">
	                    <div class="dolor-grid"> 
	                        <span class="actual">$ <?php echo $ultimo ["Precio"] ?></span>
	                    </div>
	                    <a class="now-get get-cart" href="?p=producto&id=<?php echo $ultimo ["idProducto"] ?>">VER MÁS</a> 
	                    <div class="clearfix"></div>
	                </div>
	            </div>
	        </div>


			<?php 
				}
			?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"> </div>
	</div>
</section>