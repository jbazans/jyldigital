<?php
	session_start();
	if (isset($_SESSION['nombre'])) {
		include("../recursos/conexion.php");
		if($con){
			$sql="UPDATE TB_MSG_WEB SET msg_state=1 where msg_ip='".
			$_GET['idCli']."'";
			$result=$con->query($sql);
		}
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
	<link rel="stylesheet" type="text/css" href="../css/admin-main-responsive.css">
</head>
<body onload="ajustar_chat_enlinea('<?php echo $_GET['idCli']; ?>')">
	<div class="pantalla-carga">
		<div class="cuadro-carga">
			<img src="../img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<div class="aviso-mensaje">
		<div class="contenedor-main-aviso">
			<div class="texto-aviso-mensaje">Nueva conversaci&oacute;n</div>
			<div class="btn-contenedor">
				<button class="btn-cerrar" onclick="cerrar_aviso()"><i class="fa fa-times" aria-hidden="true"></i></button>
			</div>		
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
			<div class="titulo-panel"><strong>Chat en linea - <?php echo $_GET['idCli']; ?></strong></div>
			<div class="contenido-chat-panel">
				<div class="pantalla-chat" id="chat-web-online">
				<?php
				if($con){
					$sql_chat="select * from TB_MSG_WEB where msg_orden LIKE '".
					$_GET['idCli']."%' order by msg_orden asc";
					$result=$con->query($sql_chat);
					while($row=$result->fetch_assoc()){
						if ($row['msg_tipo']=="cliente") {
					?>
					<div class="fila-mensajes">
						<div class="mensaje-ind"><?php echo $row['msg_value']; ?>
						</div>
						<div class="mensaje-fecha">
							(<?php echo $row['msg_fecha']." - ".$row['msg_hora']; ?>)
						</div>
					</div>
					<?php
						}else{
					?>
					<div class="fila-mensajes">
						<div class="mensaje-ind-blue"><?php echo $row['msg_value']; ?>
						</div>
						<div class="mensaje-fecha">
							(<?php echo $row['msg_fecha']." - ".$row['msg_hora']; ?>)
						</div>
					</div>
				<?php
						}
					}
				}
				?>
				</div>
				<div class="input-resp-web">
					<div class="lado-input">
						<input type="text" id="input-resp">
					</div>
					<div class="lado-boton">
						<button class="btn-send" onclick="send_resp('<?php echo $_GET['idCli']; ?>')"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/admin-main.js"></script>
</body>