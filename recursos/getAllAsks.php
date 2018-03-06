<?php
	include("conexion.php");
	if ($con) {	
		$sql="select * from TB_MSG_WEB where msg_state = 0 ".
		"and msg_tipo='cliente' order by msg_id desc";
		$result=$con->query($sql);
		$response=array();
		while ($row=$result->fetch_assoc()) {
			//$sql_update="update TB_MSG_WEB set msg_state = 1 ".
			//"where msg_id=".$row['msg_id'];
			//$result2=$con->query($sql_update);
			array_push($response, $row['msg_ip']);
		}
		if (sizeof($response)>0) {
			echo json_encode($response);
		}else{
			echo "No hay respuesta.";
		}
	}else{
		echo "No hay conexion.";
	}
?>