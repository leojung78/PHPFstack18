<section id="page">
	<div class="main"> 
		<div class="reservation_top">
			<div class=" contact_right">
				<h3>Contacto</h3>
				<div class="contact-form">
					<form action="#" method="post">
						<input type="text" class="textbox" placeholder="Nombre" name="nombre">
						<input type="text" class="textbox" placeholder="E-Mail" name="email">
						<textarea placeholder="Mensaje..." name="mensaje"></textarea>
						<input type="submit" value="Enviar">
						<div class="clearfix"></div>
						<p id="respuesta"></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>

<script>
	//en JS podemos usar para declarar una variable "var", "let" o "const" (si la declaramos con "const", no se puede cambiar el valor de la variable.)
	//creamos una variable "formulario" y seleccionamos el formulario "form".
	const formulario = document.querySelector("form"); 
	
	//con esto tomamos el click de enviar del formulario
	formulario.onsubmit = function(e){
		e.preventDefault(); //esta funcion previene el "evento en si, osea no enviaria el form"

		//usamos "let en lugar de "var", para crear la variable y guardar el contenido de los inputs
		let nombre = document.querySelector("input[name=nombre]").value; 
		let email = document.querySelector("input[name=email]").value;
		let mensaje = document.querySelector("textarea[name=mensaje]").value;

		//console.log("Datos a enviar:");
		//console.log("Nombre:" + nombre);
		//console.log("E-Mail:" + email);
		//console.log("Mensaje:" + mensaje);

		/*ACA SE PUEDE PROGRAMAR UNA VALIDACION FRONT-END*/
		//....

		/*ACA PROGRAMO EL ENVIO DE DATOS VIA AJAX*/
		let datos = `nombre=${nombre}&email=${email}&mensaje=${mensaje}`; 
		
		let boton = document.querySelector("input[type=submit]");
		boton.value = "Enviando...";
		boton.disabled = true;

		let peticion = new XMLHttpRequest();

		peticion.open("POST", "enviar.php");
		peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		peticion.onload = function(){
			//alert("si lees esto es pq el servidor respondio");
			if (peticion.status == 200) { //200 es igual a respuesta exitosa
				//alert(peticion.response);
				document.querySelector("#respuesta").innerText = peticion.response;
				boton.value = "Enviado!";
			} else { 
				document.querySelector("#respuesta").innerText = "Se produjo un error, intentelo nuevamente...";
				boton.value = "Enviar";
				boton.disabled = false;
			}

		};
		peticion.send(datos);


	}


</script>
