<!DOCTYPE html>
<html>
<head>
	<!-- ESTO ES PARA SOLUCIONAR EL TEMA DE BUSCAR ESTOS ARCHIVOS DESDE OTRAS CARPETAS -->
	<base href="http://localhost/MercadoTECH/">
	
	<meta charset="utf-8">
	<title>MercadoTECH | Tu E-Shop en PHP</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
	<!--script-->
</head>
<body> 
<div class="header">
	<div class="bottom-header">
		<div class="container">
			<div class="header-bottom-left">
				<div class="logo"><a href="./">Mercado<strong>TECH</strong></a><!--<div id="reloj"></div>--></div>
				<!--div class="search">
					<input type="text" name="q">
					<input type="submit" value="BUSCAR">
				</div-->
				<div class="clearfix"></div>
			</div>
			<div class="header-bottom-right">					
				<!--div class="account">
					<a href="?p=ingreso"><span></span> TU CUENTA</a>
				</div-->
				<ul class="login">
					<li><a href="./?p=ingreso"><span></span> INGRESAR</a></li>
					&nbsp;|&nbsp;
					<li><a href="./?p=registro">REGISTRARME</a></li>
					&nbsp;|&nbsp;
					<li><a href="./?p=contacto">CONTACTO</a></li>
				</ul>
				<!--div class="cart"><a href="?p=producto"><span></span>CART</a></div-->
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>	
		</div>
	</div>
</div>
<!-- 
<script>
	function muestraReloj() {
		var fechaHora = new Date();
		var horas = fechaHora.getHours();
		var minutos = fechaHora.getMinutes();
		var segundos = fechaHora.getSeconds();

		if(horas < 10) { horas = '0' + horas; }
		if(minutos < 10) { minutos = '0' + minutos; }
		if(segundos < 10) { segundos = '0' + segundos; }

		document.getElementById("reloj").innerHTML = horas+':'+minutos+':'+segundos;
	}

	window.onload = function() {
		setInterval(muestraReloj, 1000);
	}
</script> -->