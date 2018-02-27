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
	<link rel="stylesheet" type="text/css" href="css/contenidoIndex.css" media="screen and (min-width:501px)">
	<link rel="stylesheet" type="text/css" href="css/contenidoIndex-movil.css" media="screen and (max-width:500px)">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body onload="animaciones()">
	<div class="pantalla-carga">
		<div class="centro-pantalla">
			<img src="img/icono/icono.png" class="img-logo">
			<div class="mensaje">Cargando recursos...</div>
			<img src="img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<img src="img/fondo.jpg" class="fondo-decoracion">
	<div class="fondo-blur">
	<?php
		cabecera();
	?>	
	<div class="banner-main">
		<div class="contenedor-img">
			<img src="img/regalo.jpg" class="img-banner">
		</div>			
		<div class="textosanimados">
			<div class="gif-animado">
				<img src="img/icono/oferta.png" class="img-gif-oferta">
			</div>
			<div class="textos-animados">
				<div class="banner-textoanimado" id="texto1">Crea</div>
				<div class="banner-textoanimado" id="texto2">momentos</div>
				<div class="banner-textoanimado" id="texto3">&#250;nicos</div>
			</div>			
		</div>					
	</div>	
	<div class="cuerpo-main">
		<div class="cuerpo-main-contenido">
			<div class="cuerpo-main-contenido-titulo">Lo m&#225;s destacado</div>
			<div class="cuerpo-main-productos">			
			<?php
			if ($con){
				$sql = "SELECT * FROM PRODUCTOS where pro_estado='destacado' limit 8";
				$result = $con->query($sql);
				$cont=0;
				while($row = $result->fetch_assoc()) {
					if ($cont==4) {
			?>
			</div>
			<div class='cuerpo-main-productos'>
				<div class="cuerpo-main-producto">
					<img src="<?php echo $row['pro_img1']; ?>" class="img-producto">
					<div class="descripcion">
						<div class="descripcion-texto"><?php echo $row['pro_nombre']; ?></div>
						<?php
								if ($row['pro_oferta']!=null) {
							?>
									<div class="descripcion-oferta">OFERTA</div>
							<?php
								}else{
							?>
									<div class="descripcion-precio">S/. <?php echo $row['pro_precio_web']; ?></div>
							<?php
								}
						?>
					</div>
					<div class="detalle-producto" id="<?php echo $row['pro_id']; ?>">
						<a href="producto/?idproducto=<?php echo $row['pro_id']; ?>">
						<button class="btn-ver-detalle" id="btn-<?php echo $row['pro_id']; ?>">Ver detalles</button>
						</a>
					</div>
				</div>
			<?php
					}else{
			?>
				<div class="cuerpo-main-producto">
					<img src="<?php echo $row['pro_img1']; ?>" class="img-producto">
					<div class="descripcion">
						<div class="descripcion-texto"><?php echo $row['pro_nombre']; ?></div>
						<?php
								if ($row['pro_oferta']!=null) {
							?>
									<div class="descripcion-oferta">OFERTA</div>
							<?php
								}else{
							?>
									<div class="descripcion-precio">S/. <?php echo $row['pro_precio_web']; ?></div>
							<?php
								}
						?>
					</div>
					<div class="detalle-producto" id="<?php echo $row['pro_id']; ?>">
						<a href="producto/?idproducto=<?php echo $row['pro_id']; ?>">
						<button class="btn-ver-detalle" id="btn-<?php echo $row['pro_id']; ?>">Ver detalles</button>
						</a>
					</div>
				</div>
			<?php
					}
					$cont++;
			?>
				
			<?php
				}
			}
			?>
			</div>
		</div>		
	</div>
	<div class="cuerpo-decoracion">
		<div class="cuerpo-servicios">
			<div class="cuerpo-servicios-titulo">Nuestros servicios</div>
			<div class="cuerpo-contenedor-servicios">
				<div class="cuerpo-servicio">
					<img src="img/servicios/publicidad.jpg" class="img-servicio">
					Publicidad en General
				</div>
				<div class="cuerpo-servicio">
					<img src="img/servicios/regalos.jpg" class="img-servicio">
					Regalos personalizados
				</div>
				<div class="cuerpo-servicio">
					<img src="img/servicios/imprenta.jpg" class="img-servicio">
					Imprenta en General
				</div>				
				<div class="cuerpo-servicio">
					<img src="img/servicios/serviciosweb.jpg" class="img-servicio">
					Servicios web
				</div>
			</div>
		</div>
	</div>
	<div class="cuerpo-main">
		<div class="cuerpo-servicios">
			<div class="cuerpo-contenedor-servicios cuerpo-movil-servicios">
				<div class="cuerpo-servicio">
					<a href="https://www.facebook.com/JyLPublimprenta/" target="_blank"><img src="img/social/facebook1.png" class="img-social"></a>
				</div>
				<div class="cuerpo-servicio">
					<a href="https://www.youtube.com/channel/UCOuWtGP7agkGZaJBnjRVcgw" target="_blank"><img src="img/social/youtube.png" class="img-social"></a>					
				</div>
				<div class="cuerpo-servicio">
					<a href="" target="_blank" disabled><img src="img/social/instagram.png" class="img-social"></a>					
				</div>
				<div class="cuerpo-servicio">
					<a href="" target="_blank" disabled><img src="img/social/twitter.png" class="img-social"></a>					
				</div>
			</div>
		</div>
	</div>
	<?php
		footer();
	?>
	</div>
	<script type="text/javascript" src="js/index.js"></script>
</body>
</html>