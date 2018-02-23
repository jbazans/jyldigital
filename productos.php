<?php
	include("partes.php");
	include("recursos/conexion.php");
	include("recursos/funciones.php");
	
	if (isset($_GET['categoria'])) {
		$categoria=$_GET['categoria'];
		$cat=quitar_tildes($categoria);
		if ($con){
				$sql = "SELECT * FROM PRODUCTOS where pro_cat_bus='".$cat."'";
				if (isset($_GET['order'])) {
					if ($_GET['order']=="0") {
						$sql.=" order by pro_precio_web asc";
					}else{
						$sql.=" order by pro_precio_web desc";
					}					
				}
				$result = $con->query($sql);
				$productos=array();
				$cont_cate=0;
				while($row = $result->fetch_assoc()) {
					array_push($productos, $row);
					$cont_cate++;
				}
		}
	}else{
		if (isset($_GET['producto'])) {
			if ($con){
					$sql = "SELECT * FROM PRODUCTOS where pro_nombre LIKE '%".$_GET['producto']."%'";
					if (isset($_GET['order'])) {
						if ($_GET['order']=="0") {
							$sql.=" order by pro_precio_web asc";
						}else{
							$sql.=" order by pro_precio_web desc";
						}					
					}
					$result = $con->query($sql);
					$productos=array();
					$cont_palabra=0;
					while($row = $result->fetch_assoc()) {
						array_push($productos, $row);
						$cont_palabra++;
					}
			}
		}else{
			if ($con){
					$sql = "SELECT * FROM PRODUCTOS";
					if (isset($_GET['order'])) {
						if ($_GET['order']=="0") {
							$sql.=" order by pro_precio_web asc";
						}else{
							$sql.=" order by pro_precio_web desc";
						}					
					}else{
						$sql.=" order by pro_precio_web asc";
					}
					$result = $con->query($sql);
					$productos=array();
					while($row = $result->fetch_assoc()) {
						array_push($productos, $row);
					}
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
  	<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/producto.css" media="screen and (min-width:501px)">
	<link rel="stylesheet" type="text/css" href="css/producto-movil.css" media="screen and (max-width:500px)">
	<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
</head>
<body onload="animaciones('<?php if (isset($_GET["categoria"])) {
		echo $categoria;
	}else{ echo "destacado"; } ?>')">
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
			<div class="categorias-menu">
				<i class="fa fa-chevron-down" aria-hidden="true"></i> Categorias
			</div>
			<div class="main-contenido-fila">
				<div class="main-contenido-categorias">
					<div class="cuerpo-buscador">
						<div class="input-buscador">
							<div class="texto-lado"><i class="fa fa-search" aria-hidden="true"></i></div>
							<input type="text" id="buscar" placeholder="Buscar..." onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Buscar...'" 
							<?php 
								if (isset($_GET['producto'])) { 
									echo 'value="'.$_GET['producto'].'"';
								}
							?>
							>
						</div>
					</div>
					<div class="filtro-ordenar">						
						<select id="select-orden">
							<option value="0" <?php if (isset($_GET['order'])) {
								if ($_GET['order']=="0") {
									echo "selected";
								}
							} ?>>Menor precio</option>
							<option value="1" <?php if (isset($_GET['order'])) {
								if ($_GET['order']=="1") {
									echo "selected";
								}
							} ?>>Mayor precio</option>
						</select>
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
						<?php
							if (isset($_GET['producto'])) {
								if ($cont_palabra==0) {
						?>
						<div class="sugerencia">No se encontraron resultados para "<?php echo $_GET['producto'];?>"</div>
						<?php								
									$sugerencia="";
									$producto=$_GET['producto'];
									if ($producto[strlen($producto)-1]=="s") {
										for ($i=0; $i < strlen($producto); $i++) { 
											if ($i!=strlen($producto)-1) {
												$sugerencia.=$producto[$i];
											}										
										}								
						?>
						<div class="sugerencia-minus">
							<div class="texto-sugerencia">Prueba</div>
							<div class="btn-sugerencia" onclick="sugerencia('<?php echo $sugerencia;?>')"><?php echo $sugerencia;?></div></div>
						<?php
									}	
								}
							}
							
						?>
						<?php
							if (isset($_GET['categoria'])) {
								if ($cont_cate==0) {
						?>
						<div class="sugerencia">Contenido no disponible por el momento</div>
						<?php		
								}										
							}
							
						?>
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
	</div>
	<script type="text/javascript" src="js/productos.js"></script>
</body>
</html>