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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/galeria.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nanum+Pen+Script|Permanent+Marker" rel="stylesheet">
</head>
<body onload="animaciones()">
	<?php
		cabecera();
	?>	
	<div class="espacio-cabecera"></div>
	<div class="main-galeria-contenedor">
		<div class="galeria-contenido">
			<div class="texto-titulo-galeria">Nuestros clientes nos respaldan</div>
			<div class="subtitulo-galeria">Durante los 3 a&ntilde;os de actividad, nuestros clientes nos brindaron su confianza y fueron retribuidos con trabajos de calidad.</div>
			<div class="fila-galeria">
				<div class="contenedor-img">
					<div class="titulo-galeria">Impresi&oacute;n de almanaques - Restaurant "Las delicias"</div>			
					<div class="fecha-galeria">Dic. 2017</div>
					<img src="img/galeria/calendarios.jpg" class="img-galeria">
					<div class="linea-decoracion"></div>
					<div class="titulo-galeria">Cuadros en Banner - Figu´s Bar Rock</div>
					<div class="fecha-galeria">Oct. 2017</div>
					<img src="img/galeria/cuadros-banner.jpg" class="img-galeria">
				</div>				
				<div class="contenido-linea"></div>
				<div class="contenedor-img">
					<div class="titulo-galeria">Pegado de viniles - Juguer&iacute;a "Martinez"</div>
					<div class="fecha-galeria">Ene. 2018</div>
					<img src="img/galeria/jugueria.jpg" class="img-galeria">	
					<div class="linea-decoracion"></div>			
					<div class="titulo-galeria">Llaveros destapador - Poller&iacute;a "Muruhuay"</div>
					<div class="fecha-galeria">Dic. 2017</div>
					<img src="img/galeria/llaveros.jpg" class="img-galeria">
					<div class="linea-decoracion"></div>				
					<div class="titulo-galeria">Almanaques personalizados - Panader&iacute;a "Cerro"</div>
					<div class="fecha-galeria">Dic. 2017</div>
					<img src="img/galeria/panaderia.jpg" class="img-galeria">
				</div>	
			</div>
		</div>
	</div>
	<?php
		footer();
	?>
	<script type="text/javascript" src="js/galeria.js"></script>
</body>
</html>