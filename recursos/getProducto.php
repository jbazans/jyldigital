<?php
	if(isset($_POST['id'])){
		include("conexion.php");
		$sql="SELECT * FROM PRODUCTOS where pro_id='".$_POST['id']."'";
		$result=$con->query($sql);
		$productos=array();
		while($row=$result->fetch_assoc()){
			array_push($productos,$row);
		}
		$con->close();
		echo json_encode($productos);
	}else{
		echo "No tiene acceso a este recurso.";
	}
	
?>