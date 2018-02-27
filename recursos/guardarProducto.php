<?php
	if (isset($_POST['nombre'])) {
		include("conexion.php");
		include("funciones.php");
		$sql="insert into PRODUCTOS".
		"(pro_nombre,pro_descripcion,pro_precio_web,pro_precio_tienda,".
		"pro_img1,pro_img2,pro_img3,pro_estado,pro_categoria,pro_cat_bus,pro_oferta,pro_sonido) values (".
		"'".$_POST['nombre']."',".
		"'".$_POST['descripcion']."',".
		"'".$_POST['pre_web']."',".
		"'".$_POST['pre_tienda']."',".
		"'img/productos/".$_POST['url']."/01.jpg',".
		"'img/productos/".$_POST['url']."/02.jpg',".
		"'img/productos/".$_POST['url']."/03.jpg',".
		"'".$_POST['estado']."',".
		"'".$_POST['categoria']."',".
		"'".$_POST['cat_bus']."',";
		if ($_POST['oferta']=="") {
			$sql.="null,";
		}else{
			$sql.=$_POST['oferta'].",";
		}
		if ($_POST['sonido']=="") {
			$sql.="null)";
		}else{
			$sql.="'sounds/".$_POST['sonido']."')";
		}
		if($con->query($sql)===TRUE){
			echo "Guardado";
		}else{
			echo "Error";
		}		
	}else{
		echo "No tiene permisos de acceso.";
	}

?>