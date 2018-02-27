<?php
	if (isset($_POST['nombre'])) {
		include("conexion.php");
		include("funciones.php");
		$cat_sin_tilde=quitar_tildes($_POST['categoria']);
		$sql="UPDATE PRODUCTOS SET ".
		"pro_nombre='".$_POST['nombre']."',".
		"pro_descripcion='".$_POST['descripcion']."',".
		"pro_precio_web='".$_POST['pre_web']."',".
		"pro_precio_tienda='".$_POST['pre_tienda']."',".
		"pro_img1='".$_POST['url1']."',".
		"pro_img2='".$_POST['url2']."',".
		"pro_img3='".$_POST['url3']."',".
		"pro_estado='".$_POST['estado']."',".
		"pro_categoria='".$_POST['categoria']."',".
		"pro_cat_bus='".$_POST['cat_bus']."' ";
		if ($_POST['oferta']!="") {
			$sql.=",pro_oferta=".$_POST['oferta']." ";
		}
		if ($_POST['sonido']!="") {
			$sql.=",pro_sonido='sounds/".$_POST['sonido']."' ";
		}
		$sql.="WHERE pro_id='".$_POST['id']."'";
		if($con->query($sql)===TRUE){
			echo "Modificado";
		}else{
			echo "Error";
		}
	}else{
		echo "No tiene permisos de acceso.";
	}

?>