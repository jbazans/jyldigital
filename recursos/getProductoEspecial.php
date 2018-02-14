<?php

	include("conexion.php");
	$sql="SELECT * FROM PRODUCTO_ESPECIAL";
	$result=$con->query($sql);
	$productos=array();
	while($row=$result->fetch_assoc()){
		array_push($productos,$row);
	}
	echo json_encode($productos);
	$con->close();
?>