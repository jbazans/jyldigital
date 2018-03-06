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
<body onload="ajustar_chat()">
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
				<a href="productos.php"><div class="opcion">Editar producto</div></a>
				<a href="chatEnLinea.php"><div class="opcion opc-active">Chat en linea</div></a>
				<a href="../"><div class="opcion">Ver mi web</div></a>
				<a href="../recursos/LogOut.php"><div class="opcion">Salir</div></a>
			</div>
		</div>
		<div class="panel-contenido">
			<div class="titulo-panel"><strong>Chat en linea</strong></div>
			<div class="contenido-panel">
				<?php
					include("../recursos/conexion.php");
					if($con){
						$sql="SELECT msg_ip,count(*),msg_state FROM TB_MSG_WEB group BY msg_ip";
						$result=$con->query($sql);
						$contador=mysqli_num_rows($result);
						$num=0;
						while($row=$result->fetch_assoc()){
							$id=str_replace(".","_",$row['msg_ip']);
							$id=str_replace(":","_",$id);
							$num++;
				?>
					<div class="fila-chats">
						<div class="lado-datos">
							<div class="client-name"><strong><?php echo $row['msg_ip']; ?></strong></div>
							<div class="client-detalles">Mensajes: <?php echo $row['count(*)']; ?></div>
							<div class="client-link"><a href="verChat.php?idCli=<?php echo $row['msg_ip']; ?>">Ver chat</a></div>
						</div>
						<div class="lado-animacion">
							<div id="<?php echo $id; ?>" class="lado-activado"
								<?php 
								if ($row['msg_state']==0) {
									echo "style='display:block;'";
								}
								?>>
							</div>
						</div>
					</div>
				<?php
							if ($num!=$contador) {
				?>
					<div class="separador-chats"></div>
				<?php
							}				
						}
					}
				?>				
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/admin-main.js"></script>
</body>