<?php
	include("partes.php");
	include("recursos/conexion.php");
?>
<!DOCTYPE>
<html>
<head>
	<title>JyL Publimprenta</title>
	<meta charset="utf-8">
	<meta name="description" content="Regalos personalizados">
  	<meta name="keywords" content="Imprenta, Sublimacion, Publicidad">
  	<meta name="author" content="JyL Publimprenta">
  	<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/contactanos.css" media="screen and (min-width:501px)">
	<link rel="stylesheet" type="text/css" href="css/contactanos-movil.css" media="screen and (max-width:500px)">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script|Permanent+Marker" rel="stylesheet">
</head>
<body onload="animaciones()">
	<div class="pantalla-carga">
		<div class="centro-pantalla">
			<img src="img/logo.png" class="img-logo">
			<div class="mensaje">Cargando recursos...</div>
			<img src="img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<div class="fondo-blur">
	<?php
		cabecera();
	?>	
	<div class="contactanos-cuerpo-main">
		<div class="contenedor-img">
			<img src="img/contactanos-top.jpg" class="img-con-top">
		</div>
		<div class="cuerpo-contactanos">
			<div class="medio-contacto">
				<div class="fila-iconos">
					<div class="icono-red">
						<a href="#" target="_blank"><img src="img/social/celular.png" class="img-social-contacto"></a>	
						<div class="texto-icono-red">970 653 130</div>
					</div>
					<div class="icono-red">
						<a href="https://www.youtube.com/channel/UCOuWtGP7agkGZaJBnjRVcgw" target="_blank"><img src="img/social/whatsapp.png" class="img-social-contacto"></a>	
						<div class="texto-icono-red">995 854 731<br>970 653 130</div>
					</div>
					<div class="icono-red">
						<a href="https://www.facebook.com/JyLPublimprenta/" target="_blank"><img src="img/social/facebook.png" class="img-social-contacto"></a>	
						<div class="texto-icono-red">/Jyl Publimprenta</div>
					</div>
					<div class="icono-red">
						<a href="#" target="_blank"><img src="img/social/correo.png" class="img-social-contacto"></a>	
						<div class="texto-icono-red">jyl_publimprenta<br>@hotmail.com<br>jylimprenta@gmail.com</div>
					</div>
					<div class="icono-red">
						<a href="#" target="_blank"><img src="img/social/direccion.png" class="img-social-contacto"></a>	
						<div class="texto-icono-red">Av. 9 de setiembre<br>Mz. K1 lote 54<br>Jicamarca - Huachipa</div>
					</div>
				</div>
			</div>
			<div class="separador-medios"></div>			
		</div>
	</div>
	<div class="medio-contacto">
		<div id="map">
		</div>
	</div>
	<div class="contactanos-cuerpo-main">
		<div class="contenedor-img">
			<img src="img/contactanos-bottom.jpg" class="img-con-bottom">
			<div class="form-contactanos">
				<div class="lado-vacio"></div>
				<div class="lado-form">
					<div class="fila">
						<div class="lado">
							<div class="lado-icono"><i class="fa fa-user" aria-hidden="true"></i></div>
							<div class="lado-input">
								<input type="text" id="nombre" placeholder="Nombres y apellidos">
							</div>
						</div>
						<div class="separador-lado"></div>
						<div class="lado">
							<div class="lado-icono"><i class="fa fa-phone" aria-hidden="true"></i></div>
							<div class="lado-input">
								<input type="text" id="celular" placeholder="Celular / Tel&eacute;fono">
							</div>
						</div>
					</div>
					<div class="separador-filas"></div>
					<div class="fila">
						<div class="lado-icono"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<div class="lado-input">
							<input type="text" id="email" placeholder="Correo electr&oacute;nico">
						</div>
					</div>
					<div class="separador-filas"></div>
					<div class="fila">
						<div class="lado-icono"><i class="fa fa-pencil" aria-hidden="true"></i></div>
						<div class="lado-input">
							<input type="text" id="asunto" placeholder="Asunto">
						</div>
					</div>
					<div class="separador-filas"></div>
					<div class="fila">
						<div class="lado-icono text-area-in"><i class="fa fa-comment" aria-hidden="true"></i></div>
						<textarea placeholder="Mensaje" id="consulta"></textarea>
					</div>
					<div class="separador-filas"></div>
					<div class="fila-btn">
						<button class="btn-enviar" onclick="sendMail()">Enviar</button>
					</div>

				</div>
			</div>
		</div>
	</div>
	</div>
	<?php
		footer();
	?>
	<script type="text/javascript" src="js/contactanos.js"></script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuDXimC-NUy2iOWU3KVfe8UdZQ3eFM0gk&callback=initMap">
    </script>
</body>
</html>