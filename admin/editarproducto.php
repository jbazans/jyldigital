<?php
	session_start();
	if (isset($_SESSION['nombre'])) {
		
	}else{
		header("Location: index.php");
	}
?>
<!DOCTYPE>
<html>
<head>
	<title>DashBoard Admininstrador</title>
	<meta charset="utf-8">
	<meta name="description" content="Regalos personalizados">
  	<meta name="keywords" content="Imprenta, Sublimacion, Publicidad">
  	<meta name="author" content="JyL Publimprenta">
  	<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="../js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="../img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="../css/admin-main.css">
</head>
<body onload="ajuste_editar('<?php echo $_GET['id']; ?>')">
	<div class="pantalla-carga">
		<div class="cuadro-carga">
			<img src="../img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<div class="pantalla-sugerencia">
		<div class="cuadro-sugerencia">
			<div class="titulo-sugerencia">Seleccione caracter</div>
			<select id="sug">
				<option value="aacute">&aacute;</option>
				<option value="eacute">&eacute;</option>
				<option value="iacute">&iacute;</option>
				<option value="oacute">&oacute;</option>
				<option value="uacute">&uacute;</option>
				<option value="ntilde">&ntilde;</option>
			</select>
			<div class="btns">
				<div class="der">
					<button class="btn-insertar">Insertar</button>
				</div>
				<div class="izq">
					<button class="btn-cancelar">Cancelar</button>					
				</div>
			</div>
		</div>
	</div>
	<div class="cuerpo-modulo-main">
		<div class="panel-lateral">
			<img src="../img/icono/icono.png" class="img-logo">
			<div class="opciones-admin">
				<a href=""><div class="opcion">Inicio</div></a>
				<a href="main.php"><div class="opcion">Agregar productos</div></a>
				<a href="productos.php"><div class="opcion opc-active">Editar producto</div></a>
				<a href="../"><div class="opcion">Ver mi web</div></a>
				<a href="../recursos/LogOut.php"><div class="opcion">Salir</div></a>
			</div>
		</div>
		<div class="panel-contenido">
			<div class="titulo-panel"><strong>Editar producto</strong></div>
			<div class="contenido-panel">
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Nombre de producto</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<div class="lado-input">
							<input type="text" id="nombre">
						</div>
						<div class="botones-funcion">
							<button class="btn-add" onclick="add_descripcion('nombre')"><i class="fa fa-tag" aria-hidden="true"></i></button>
						</div>	
					</div>	
				</div>
				<div class="fila-contenido fila-add">
					<div class="label-texto">
						<div class="solo-texto">Descripci&oacute;n</div>
						<div class="aclaracion">(agregue m&aacute;s lineas con el bot&oacute;n "+")</div>
					</div>
					<div class="input-texto">
						<div class="lado-input">
							<input type="text" class="descripcion" id="desc1" placeholder="Descripci&oacute;n 1">
						</div>
						<div class="botones-funcion">
							<button class="btn-add" onclick="add_descripcion('desc1')"><i class="fa fa-tag" aria-hidden="true"></i></button>
							<button class="btn-add-campo" title="A&ntilde;adir campo" onclick="add_campo()"><i class="fa fa-plus" aria-hidden="true"></i></button>
						</div>						
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Precio web</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<input type="text" id="pre_web">
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Precio tienda</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<input type="text" id="pre_tienda">
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Rutas de las im&aacute;genes</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<input type="text" id="url1">
					</div>	
					<div class="input-texto second">
						<input type="text" id="url2">
					</div>	
					<div class="input-texto second">
						<input type="text" id="url3">
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Im&aacute;genes</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-imagenes">
						<img src="../img/no-imagen.jpg" class="img-imagen" id="img1">
						<img src="../img/no-imagen.jpg" class="img-imagen" id="img2">
						<img src="../img/no-imagen.jpg" class="img-imagen" id="img3">
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Estado de producto</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<select id="estado">
							<option value="destacado">Destacado</option>
							<option value="normal">Normal</option>
						</select>
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Categor&iacute;a del producto</div>
						<div class="aclaracion"></div>
					</div>
					<div class="input-texto">
						<select id="categoria">
							<option value="Sublimacion">Sublimacion</option>
							<option value="Imprenta">Imprenta</option>
							<option value="Gigantografia">Gigantografia</option>
							<option value="Merchandising">Merchandising</option>
							<option value="Ploteos">Ploteos</option>
							<option value="Estampados">Estampados</option>
							<option value="Tarjetas">Tarjetas</option>
							<option value="Peluches">Peluches</option>
						</select>
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Oferta</div>
						<div class="aclaracion">(si el producto est&aacute;	 en oferta, agrege el % de descuento. Ejem: 20)</div>
					</div>
					<div class="input-texto">
						<input type="number" id="oferta">
					</div>	
				</div>
				<div class="fila-contenido">
					<div class="label-texto">
						<div class="solo-texto">Ruta del sonido</div>
						<div class="aclaracion">(si el producto tiene sonido, agrege el nombre del archivo)</div>
					</div>
					<div class="input-texto">
						<input type="text" id="sonido">
					</div>	
				</div>
				<div class="fila-btn">
					<button class="btn-guardar" onclick="modificar_producto()">Modificar</button>
				</div>
			</div>
		</div>
	</div>
	<form enctype="multipart/form-data" action="../recursos/modificarImagenes.php" method="POST" class="form-images">
		<input type="text" name="path1" id="path1">
		<input type="text" name="path2" id="path2">
		<input type="text" name="path3" id="path3">
		<input type="file" name="img1" id="imagen1">
		<input type="file" name="img2" id="imagen2">
		<input type="file" name="img3" id="imagen3">
		<button id="btn1" type="submit"></button>
	</form>
	<script type="text/javascript" src="../js/admin-main.js"></script>
</body>