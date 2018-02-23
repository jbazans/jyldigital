<?php
	if (isset($_FILES['img1'])) {
		if (!file_exists('../img/productos/'.$_POST['path'])) {
		    mkdir('../img/productos/'.$_POST['path'], 0777, true);
		}
		$tmp_name = $_FILES["img1"]["tmp_name"];
        move_uploaded_file($tmp_name,"../img/productos/".$_POST['path']."/01.jpg");
		$tmp_name = $_FILES["img2"]["tmp_name"];
        move_uploaded_file($tmp_name,"../img/productos/".$_POST['path']."/02.jpg");
        $tmp_name = $_FILES["img3"]["tmp_name"];
        move_uploaded_file($tmp_name,"../img/productos/".$_POST['path']."/03.jpg");
		header("Location: ../admin/main.php");
	}else{
		echo "no tengo";
	}

?>