<?php
	if (isset($_FILES['img1'])) {
		if ($_FILES["img1"]["tmp_name"]!="") {
			$tmp_name = $_FILES["img1"]["tmp_name"];
        	move_uploaded_file($tmp_name,"../"+$_POST['path1']);
		}
		if ($_FILES["img2"]["tmp_name"]!="") {
			$tmp_name = $_FILES["img2"]["tmp_name"];
        	move_uploaded_file($tmp_name,"../"+$_POST['path2']);
		}
		if ($_FILES["img3"]["tmp_name"]!="") {
			$tmp_name = $_FILES["img3"]["tmp_name"];
        	move_uploaded_file($tmp_name,"../"+$_POST['path3']);
		}
		header("Location: ../admin/productos.php");
	}else{
		echo "no tengo";
	}

?>