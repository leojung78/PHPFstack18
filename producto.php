<?php 
	
	require 'admin/db.php';

	if (!isset($_GET ["id"]) || !filter_var($_GET ["id"], FILTER_VALIDATE_INT) || $_GET ["id"] < 0) header("location: index.php");
	
	$id = $_GET ["id"];

	$elegido = Obtener($id);

/*	$api = file_get_contents("http://localhost/mercadotech/api/index.php");
	$productos = json_decode($api);
    //Obtengo la posicion del item cuyo idProducto es igual al id enviado por GET
    print_r($productos);
    die;
    $item = array_search($id, array_column($productos, "idProducto") );
 	
    $elegido = $productos[$item];*/
     
    //echo "El producto elegido es: ";
    //print_r( $elegido );
?>
<section id="page">
	<div class="single_top">
		<div class="single_grid">
			<div class="grid images_3_of_2">
				<ul id="etalage">
					<li>
						<img class="etalage_thumb_image" src="<?php echo $elegido ["Imagen"] ?>" class="img-responsive" />
					</li>
				</ul>
				<div class="clearfix"></div>		
			</div>
			<div class="desc1 span_3_of_2">
				<h4><?php echo $elegido ["Nombre"] ?></h4>
				<div class="cart-b">
					<div class="left-n ">$ <?php echo $elegido ["Precio"] ?></div>
					<a class="now-get get-cart-in" href="#">COMPRAR</a> 
					<div class="clearfix"></div>
				</div>
				<h6><?php echo $elegido ["Stock"] ?> unid. en stock</h6>
				<p><?php echo $elegido ["Detalle"] ?></p>
				<div class="share">
					<h5>Compartir Producto:</h5>
					<ul class="share_nav">
						<li><a href="#"><img src="images/facebook.png" title="facebook"></a></li>
						<li><a href="#"><img src="images/twitter.png" title="Twiiter"></a></li>
						<li><a href="#"><img src="images/rss.png" title="Rss"></a></li>
						<li><a href="#"><img src="images/gpluse.png" title="Google+"></a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
