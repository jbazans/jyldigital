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
	<?php
		cabecera();
	?>	
	<div class="separador-contactanos"></div>
	<div class="contactanos-cuerpo-main">
		<div class="cuerpo-contactanos">
			<div class="titulo-contactanos">¿Tienes alguna duda?</div>
			<div class="subtitulo-contactanos">Comun&iacute;cate con nosotros por alguno de los siguientes medios.</div>
			<div class="medio-contacto">
				<div class="titulo-contacto">Redes sociales</div>
				<div class="fila-iconos">
					<div class="icono-red">
						<a href="https://www.facebook.com/JyLPublimprenta/" target="_blank"><img src="img/social/facebook.png" class="img-social-contacto"></a>	
					</div>
					<div class="icono-red">
						<a href="https://www.youtube.com/channel/UCOuWtGP7agkGZaJBnjRVcgw" target="_blank"><img src="img/social/youtube.png" class="img-social-contacto"></a>	
					</div>
					<div class="icono-red">
						<a href="#" target="_blank"><img src="img/social/instagram.png" class="img-social-contacto"></a>	
					</div>
					<div class="icono-red">
						<a href="#" target="_blank"><img src="img/social/twitter.png" class="img-social-contacto"></a>	
					</div>
				</div>
			</div>
			<div class="separador-medios"></div>
			<div class="medio-contacto">
				<div class="titulo-contacto">Nuestra tienda f&iacute;sica</div>
				<div id="map">
				</div>
				<div class="separador-contacto"></div>
				<div class="fila-datos">
					<div class="dato"><i class="fa fa-map-marker" aria-hidden="true"></i> Av. 9 de setiembre mz. k1 lote 53 - Jicamarca, Anexo 8</div>
					<div class="dato dato-web"><i class="fa fa-mobile" aria-hidden="true"></i> 970 653 130  -  <i class="fa fa-whatsapp" aria-hidden="true"></i> 970 653 130 / 995 854 731</div>
					<div class="dato dato-movil"><i class="fa fa-mobile" aria-hidden="true"></i> 970 653 130</div>
					<div class="dato dato-movil"><i class="fa fa-whatsapp" aria-hidden="true"></i> 970 653 130 / 995 854 731</div>
					<div class="dato"><i class="fa fa-envelope-o" aria-hidden="true"></i> jylimprenta@gmail.com</div>
				</div>
			</div>
			<div class="separador-medios"></div>
			<div class="medio-contacto">
				<div class="titulo-contacto">Formulario para consultas</div>
				<div class="fila-datos-form">
					<div class="columna-contacto">
						<div class="columna-mitad1">
							<div class="texto-label">Nombre completo</div>
							<input type="text" id="nombre" placeholder="Nombres y apellidos">
							<div class="separador-label"></div>
							<div class="texto-label">E-mail</div>
							<input type="text" id="email" placeholder="Ingrese su e-mail">
							<div class="separador-label"></div>
							<div class="texto-label">Celular (opcional)</div>
							<input type="text" id="celular" placeholder="Ingrese su n&uacute;mero">
						</div>
						<div class="columna-mitad2">
							<div class="texto-label">Dejanos tu consulta</div>
							<textarea class="text-area" id="consulta"></textarea>
						</div>
					</div>
					<div class="cuerpo-btn">
						<button class="btn-enviar" onclick="sendMail()">Enviar</button>
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