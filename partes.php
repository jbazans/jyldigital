<?php
	function cabecera(){
?>
	<div class="pantalla-carga">
		<div class="centro-pantalla">
			<img src="img/logo.png" class="img-logo">
			<div class="mensaje">Cargando recursos...</div>
			<img src="img/gif/carga.gif" class="img-carga">
		</div>
	</div>
	<div class="cabecera-main">
		<div class="cabecera-contacto-numero-izquierdo">
			<div class="contacto-texto">Env&#237;o gratis desde montos mayores a S/. 200.00</div>
		</div>
		<div class="cabecera-espacio"></div>
		<div class="cabecera-contacto-numero-derecho">
			<div class="contacto-texto"><i class="fa fa-whatsapp" aria-hidden="true"></i> 970 653 130 / 995 854 731</div>
		</div>
	</div>
	<nav class="nav-main">
		<div class="nav-main-cuerpo">
			<div class="centrar">				
				<a href="#">
					<div class="nav-contenido" id="nosotros">
						<div class="nav-contenido-texto">Nosotros</div>
					</div>
				</a>
				<a href="productos.php">
					<div class="nav-contenido" id="productos">
						<div class="nav-contenido-texto">Productos</div>
					</div>
				</a>
				<a href="index.php">
					<div class="nav-contenido-logo">
						<img src="img/icono/icono.png" class="img-icono" id="logo" title="Inicio">
					</div>
				</a>	
				<a href="galeria.php">
					<div class="nav-contenido" id="galeria">
						<div class="nav-contenido-texto">Galer&#237;a</div>
					</div>
				</a>			
				<a href="contactanos.php">
					<div class="nav-contenido" id="contactanos">
						<div class="nav-contenido-texto">Cont&#225;ctanos</div>
					</div>
				</a>				
			</div>
			<div class="drop-menu-movil">
				<div class="icono-menu" onclick="mostrar_menu()"><i class="fa fa-bars" aria-hidden="true"></i></div>
			</div>
		</div>
	</nav>
	<div class="opciones-movil">
		<a href="#">
			<div class="opc-contenido" id="nosotros">
				<div class="nav-contenido-texto">Nosotros</div>
			</div>
		</a>
		<a href="productos.php">
			<div class="opc-contenido" id="productos">
				<div class="nav-contenido-texto">Productos</div>
			</div>
		</a>
		<a href="galeria.php">
			<div class="opc-contenido" id="galeria">
				<div class="nav-contenido-texto">Galer&#237;a</div>
			</div>
		</a>			
		<a href="contactanos.php">
			<div class="opc-contenido" id="contactanos">
				<div class="nav-contenido-texto">Cont&#225;ctanos</div>
			</div>
		</a>	
	</div>
<?php
	}

	function footer(){
?>
	<div class="separador-footer"></div>
	<footer class="footer-main">
		<div class="footer-contenido">
			JyL Publimprenta | Jicamarca, 2018
		</div>
	</footer>
<?php
	}
?>