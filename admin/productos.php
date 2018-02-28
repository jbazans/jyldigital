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
	<title>DashBoard Admininstrador | Editar</title>
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
<body onload="ajustar()">
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
			<div class="titulo-panel"><strong>Seleccione un producto</strong></div>
			<div class="contenido-panel">
				<table class="table-main" id="table-web">
					<tr>
						<th>Nombre</th>
						<th>Precio Web</th>
						<th>Precio Tienda</th>
						<th>Categoria</th>
						<th>Opciones</th>
					</tr>
					
						<?php
						include("../recursos/conexion.php");
						$sql="SELECT * FROM PRODUCTOS";
						$result=$con->query($sql);
						while($row=$result->fetch_assoc()){
						?>
					<tr>
							<td><?php echo $row['pro_nombre']; ?></td>
							<td><?php echo $row['pro_precio_web']; ?></td>
							<td><?php echo $row['pro_precio_tienda']; ?></td>
							<td><?php echo $row['pro_categoria']; ?></td>
							<td>
								<a href="editarproducto.php?id=<?php echo $row['pro_id']; ?>"><button class="btn-editar" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
								</a>
							</td>
					</tr>
						<?php
						}
						?>					
				</table>
				<table class="table-main" id="table-movil">
					<tr>
						<th>Nombre</th>
						<th>Precio Web</th>
						<th>Precio Tienda</th>
						<th>Opciones</th>
					</tr>
					
						<?php
						include("../recursos/conexion.php");
						$sql="SELECT * FROM PRODUCTOS";
						$result=$con->query($sql);
						while($row=$result->fetch_assoc()){
						?>
					<tr>
							<td><?php echo $row['pro_nombre']; ?></td>
							<td><?php echo $row['pro_precio_web']; ?></td>
							<td><?php echo $row['pro_precio_tienda']; ?></td>
							<td>
								<a href="editarproducto.php?id=<?php echo $row['pro_id']; ?>"><button class="btn-editar" title="Editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
								</a>
							</td>
					</tr>
						<?php
						}
						?>					
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/admin-main.js"></script>
</body>