<?php
	session_start();
?>
<!DOCTYPE>
<html>
<head>
	<title>Login DashBoard</title>
	<meta charset="utf-8">
	<meta name="description" content="Regalos personalizados">
  	<meta name="keywords" content="Imprenta, Sublimacion, Publicidad">
  	<meta name="author" content="JyL Publimprenta">
  	<META HTTP-EQUIV="Pragma" CONTENT="no-cache"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery/jquery-3.2.1.min.js"></script>
	<link rel="icon" type="image/png" href="../img/icono/icono.png" />
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>
	<div class="cuerpo-modulo-admin">
		<div class="cuadro-form-login">
			<img src="../img/icono/icono.png" class="img-logo">
			<div class="titulo-form-login"><strong>Panel de control</strong></div>
			<div class="cuerpo-login">
				<form action="../recursos/login-admin.php" method="POST">
				<div class="fila-input">
					<div class="icono-input"><i class="fa fa-user" aria-hidden="true"></i></div>
					<div class="input-contenido">
						<input type="text" name="user" placeholder="Usuario">
					</div>
				</div>
				<div class="separador"></div>
				<div class="fila-input">
					<div class="icono-input"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
					<div class="input-contenido">
						<input type="password" name="password" placeholder="Contraseña">
					</div>
				</div>
				<?php
					if (isset($_SESSION['error'])) {
						if ($_SESSION['error']=="1") {
							$_SESSION['error']="0";
				?>
				<div class="fila-error">
					<div style="color:red;">Credenciales incorrectas</div>
				</div>
				<?php
						}
					}
				?>
				<div class="fila-btn">
					<button class="btn-ingresar" type="submit">Ingresar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>