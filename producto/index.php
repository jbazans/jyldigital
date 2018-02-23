<?php
	include("partes.php");
	include("../recursos/conexion.php");
	include("../recursos/funciones.php");
	$idpro=$_GET['idproducto'];
	if ($con){
				$sql = "SELECT * FROM PRODUCTOS where pro_id='".$idpro."' limit 1";
				$result = $con->query($sql);
				$cont=0;
				$producto=array();
				while($row = $result->fetch_assoc()) {
					$producto=$row;
				}
	}
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
	<script type="text/javascript" src="../js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="../img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/producto.css" media="screen and (min-width:501px)">
	<link rel="stylesheet" type="text/css" href="../css/producto-movil.css" media="screen and (max-width:500px)">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body onload="animaciones('<?php echo $producto['pro_categoria']; ?>')">	
	<div class="pantalla-carga">
		<div class="centro-pantalla">
			<img src="../img/logo.png" class="img-logo">
			<div class="mensaje">Cargando recursos...</div>
			<img src="../img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<div class="pantalla-compra">
		<div class="formulario-compra">
			<div class="cabecera"></div>
			<div class="opciones">
				<button class="btn-cancelar">Cancelar</button>
			</div>
		</div>
	</div>
	<div class="main-cobertura">
		<div class="main-contenido-cobertura">
			<div id="map"></div>
			<button class="btn-cerrar"><i class="fa fa-times" aria-hidden="true"></i></button>
		</div>
	</div>
	<div class="fondo-blur">
	<?php
		cabecera();
	?>	
	<div class="main-contenido-producto">
		<div class="main-contenido-cuerpo">
			<div class="main-contenido-titulo">Productos&nbsp; | &nbsp;
				<a href="../productos.php?categoria=<?php echo $producto['pro_categoria']; ?>"><?php echo $producto['pro_categoria']; ?></a>
				&nbsp; | &nbsp;
				 <?php echo $producto['pro_nombre']; ?>
			</div>
			<div class="categorias-menu">
				<i class="fa fa-chevron-down" aria-hidden="true"></i> Categorias
			</div>
			<div class="main-contenido-fila">
				<div class="main-contenido-categorias">
					<div class="cuerpo-buscador">
						<div class="input-buscador">
							<div class="texto-lado"><i class="fa fa-search" aria-hidden="true"></i></div>
							<input type="text" id="buscar" placeholder="Buscar..." onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Buscar...'">
						</div>
					</div>
					<a href="../productos.php?categoria=Sublimaci&oacute;n">
						<div class="categoria-titulo" id="Sublimaci&oacute;n">
							Sublimaci&oacute;n
						</div>
					</a>					
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Imprenta">
						<div class="categoria-titulo" id="Imprenta">
							Imprenta
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Gigantograf&iacute;a">
						<div class="categoria-titulo" id="Gigantograf&iacute;a">
							Gigantograf&iacute;a
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Merchandising">
						<div class="categoria-titulo" id="Merchandising">
							Merchandising
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Ploteos">
						<div class="categoria-titulo" id="Ploteos">
							Ploteos
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Estampados">
						<div class="categoria-titulo" id="Estampados">
							Estampados
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Tarjetas">
						<div class="categoria-titulo" id="Tarjetas">
							Tarjetas de invitaci&oacute;n
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="../productos.php?categoria=Peluches">
						<div class="categoria-titulo" id="Peluches">
							Peluches
						</div>
					</a>
				</div>
				<div class="main-contenido-producto-select select-producto">
					<div class="sub-contenido-producto-select">
						<div class="sub-contenido1">
							<div class="cuadros-img">
									<div class="cuadro-img">
										<img src="../<?php echo $producto['pro_img1']; ?>" class="img-cuadro" onclick="cambiar_imagen('../<?php echo $producto['pro_img1']; ?>',0)">
									</div>
									<div class="cuadro-img">
										<img src="../<?php echo $producto['pro_img2']; ?>" class="img-cuadro" onclick="cambiar_imagen('../<?php echo $producto['pro_img2']; ?>',1)">
									</div>
									<div class="cuadro-img">
										<img src="../<?php echo $producto['pro_img3']; ?>" class="img-cuadro img-cuadro-ulti" onclick="cambiar_imagen('../<?php echo $producto['pro_img3']; ?>',2)">
									</div>
							</div>
							<div class="sub-contenido-principal">
								<img src="../<?php echo $producto['pro_img1']; ?>" class="img-producto">
								<div class="contenido-botones contenido-izq">
									<button class="btn-flecha" onclick="cambiar_imagen_flecha('iz')"><i class="fa fa-caret-left" aria-hidden="true"></i></button>
								</div>								
								<div class="contenido-botones contenido-der">
									<button class="btn-flecha" onclick="cambiar_imagen_flecha('de')"><i class="fa fa-caret-right" aria-hidden="true"></i></button>
								</div>
							</div>							
						</div>
						<div class="sub-contenido3"></div>
						<div class="sub-contenido2">
							<div class="contenido-descripcion">
								<div class="descripcion-titulo"><?php echo $producto['pro_nombre']; ?></div>
								<div class="descripcion-texto texto-precio">S/. 
								<?php
									if ($producto['pro_oferta']!=null) {
										$newprecio=(float) $producto['pro_precio_web'];
										echo twodecimales($newprecio- $newprecio*$producto['pro_oferta']/100); 
								?>
								<div class="oferta-label">-<?php echo $producto['pro_oferta']; ?>%</div>
								<?php
									}else{
										echo $producto['pro_precio_web']; 
									}									
								?>																	
								</div>
								<?php
									if ($producto['pro_oferta']!=null) {
								?>
								<div class="descripcion-label-adicional">Precio normal: S/. <?php echo $producto['pro_precio_web']; ?></div>
								<?php
									}
								?>
								<div class="descripcion-label-minus">(Delivery gratis)</div>
								<button class="btn-cobertura">Revisar cobertura de delivery</button>
								<div class="separador-descripcion"></div>
								<?php
									$descripcion=$producto['pro_descripcion'];
									$palabra="";
									for ($i=0; $i <strlen($descripcion) ; $i++) { 
										if ($descripcion[$i]!=",") {
											$palabra=$palabra.$descripcion[$i];
										}else{
								?>
								<div class="descripcion-texto2">> <?php echo $palabra; ?></div>
								<?php
											$palabra="";
										}
									}								
								?>	
								<div class="descripcion-texto2">> <?php echo $palabra; ?></div>					
								<div class="descripcion-label-minus2">Precio en tienda fisica: S/. 
									<?php 
									if ($producto['pro_oferta']!=null) {
										$newprecio=(float) $producto['pro_precio_tienda'];
										echo twodecimales($newprecio- $newprecio*$producto['pro_oferta']/100); 
									}else{
										echo $producto['pro_precio_tienda']; 
									}
									?>										
								</div>
								<div class="separador-descripcion"></div>
								<div class="contenido-btn-comprar">
									<button class="btn-comprar"onclick="procesar_compra('<?php echo $producto['pro_id']; ?>')">Comprar</button>
								</div>								
							</div>
						</div>
					</div>	
					<div class="contenido-recomendaciones">
						<div class="titulo-recomendacion">Ofertas actuales</div>
						<div class="productos-recomendados">
						<?php
						if ($con){
							$sql = "SELECT * FROM PRODUCTOS WHERE pro_oferta is NOT NULL limit 4";
							$result = $con->query($sql);
							while($row = $result->fetch_assoc()) {
						?>
							<div class="producto-recomendado">
								<img src="../<?php echo $row['pro_img1']; ?>" class="img-producto-categoria">
								<div class="descripcion-producto">
									<div class="descripcion-texto-producto"><?php echo $row['pro_nombre']; ?></div>
									<div class="descripcion-oferta">OFERTA</div>
								</div>
								<div class="detalle-producto" id="<?php echo $row['pro_id']; ?>">
									<a href="../producto/?idproducto=<?php echo $row['pro_id']; ?>">
									<button class="btn-ver-detalle" id="btn-<?php echo $row['pro_id']; ?>">Ver detalles</button>
									</a>
								</div>
							</div>
						<?php
							}
						}
						?>
						</div>
					</div>				
				</div>		
			</div>	
		</div>		
	</div>
	<?php
		footer();
	?>
	</div>
    <script type="text/javascript" src="../js/producto.js"></script>
     <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCaj7YbUU_I7yqWrAnBlfl-CT0icbNthIE">
    </script>
</body>
</html>