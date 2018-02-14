<?php
	include("partes.php");
	include("recursos/conexion.php");
	include("recursos/funciones.php");
	
	if (isset($_GET['categoria'])) {
		$categoria=$_GET['categoria'];
		$cat=quitar_tildes($categoria);
		if ($con){
				$sql = "SELECT * FROM PRODUCTOS where pro_cat_bus='".$cat."'";
				$result = $con->query($sql);
				$productos=array();
				while($row = $result->fetch_assoc()) {
					array_push($productos, $row);
				}
		}
	}else{
		if ($con){
				$sql = "SELECT * FROM PRODUCTOS where pro_estado='destacado'";
				$result = $con->query($sql);
				$productos=array();
				while($row = $result->fetch_assoc()) {
					array_push($productos, $row);
				}
		}
	}		
?>
<!DOCTYPE>
<html>
<head>
	<title>JyL Publimprenta | Productos</title>
	<meta charset="utf-8">
	<meta name="description" content="Regalos personalizados">
  	<meta name="keywords" content="Imprenta, Sublimacion, Publicidad">
  	<meta name="author" content="JyL Publimprenta">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/producto.css">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body onload="animaciones('<?php if (isset($_GET["categoria"])) {
		echo $categoria;
	}else{ echo "destacado"; } ?>')">
	<?php
		cabecera();
	?>	
	<div class="main-contenido-producto">
		<div class="main-contenido-cuerpo">
			<div class="main-contenido-titulo">Productos &nbsp;
			<?php 
				if (isset($_GET['categoria'])) {
					if ($categoria=="Tarjetas") {
						echo "|&nbsp; Tarjetas de invitaci&oacute;n"; 
					}else{
						echo "|&nbsp; ".$categoria; 
					}
				}			
			?>				
			</div>
			<div class="main-contenido-fila">
				<div class="main-contenido-categorias">
					<div class="cuerpo-buscador">
						<div class="input-buscador">
							<div class="texto-lado"><i class="fa fa-search" aria-hidden="true"></i></div>
						</div>
					</div>
					<a href="productos.php?categoria=Sublimaci&oacute;n">
						<div class="categoria-titulo" id="Sublimaci&oacute;n">
							Sublimaci&oacute;n
						</div>
					</a>					
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Imprenta">
						<div class="categoria-titulo" id="Imprenta">
							Imprenta
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Gigantograf&iacute;a">
						<div class="categoria-titulo" id="Gigantograf&iacute;a">
							Gigantograf&iacute;a
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Merchandising">
						<div class="categoria-titulo" id="Merchandising">
							Merchandising
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Ploteos">
						<div class="categoria-titulo" id="Ploteos">
							Ploteos
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Estampados">
						<div class="categoria-titulo" id="Estampados">
							Estampados
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Tarjetas">
						<div class="categoria-titulo" id="Tarjetas">
							Tarjetas de invitaci&oacute;n
						</div>
					</a>
					<div class="separador-categorias"></div>
					<a href="productos.php?categoria=Peluches">
						<div class="categoria-titulo" id="Peluches">
							Peluches
						</div>
					</a>
				</div>
				<div class="main-contenido-producto-select">
					<div class="sub-contenido-producto">
						<div class="fila-productos">
							<?php 
							$cont=0;
							for ($i=0; $i < count($productos) ; $i++) { 
								if ($cont%3==0 && $cont>0) {
							?>
						</div>
						<div class="fila-productos">
							<div class="producto-contenido">
								<img src="<?php echo $productos[$i]['pro_img1']; ?>" class="img-producto-categoria">
								<div class="descripcion-producto">
									<div class="descripcion-texto-producto"><?php echo $productos[$i]['pro_nombre']; ?></div>
							<?php
								if ($productos[$i]['pro_oferta']!=null) {
							?>
									<div class="descripcion-oferta">OFERTA</div>
							<?php
								}else{
							?>
									<div class="descripcion-precio">S/. <?php echo $productos[$i]['pro_precio_web']; ?></div>
							<?php
								}
							?>
								</div>
								<div class="detalle-producto" id="<?php echo $productos[$i]['pro_id']; ?>">
									<a href="producto/?idproducto=<?php echo $productos[$i]['pro_id']; ?>">
									<button class="btn-ver-detalle" id="btn-<?php echo $productos[$i]['pro_id']; ?>">Ver detalles</button>
									</a>
								</div>
							</div>
						
							<?php
								}else{
							?>	
							<div class="producto-contenido">
								<img src="<?php echo $productos[$i]['pro_img1']; ?>" class="img-producto-categoria">
								<div class="descripcion-producto">
									<div class="descripcion-texto-producto"><?php echo $productos[$i]['pro_nombre']; ?></div>
							<?php
								if ($productos[$i]['pro_oferta']!=null) {
							?>
									<div class="descripcion-oferta">OFERTA</div>
							<?php
								}else{
							?>
									<div class="descripcion-precio">S/. <?php echo $productos[$i]['pro_precio_web']; ?></div>
							<?php
								}
							?>
								</div>
								<div class="detalle-producto" id="<?php echo $productos[$i]['pro_id']; ?>">
									<a href="producto/?idproducto=<?php echo $productos[$i]['pro_id']; ?>">
									<button class="btn-ver-detalle" id="btn-<?php echo $productos[$i]['pro_id']; ?>">Ver detalles</button>
									</a>
								</div>
							</div>
							<?php
								}
								$cont++;
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
	<script type="text/javascript" src="js/producto.js"></script>
</body>
</html>