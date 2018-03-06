<?php
	include("conexion.php");
	if ($con) {
		$ipCliente=$_POST['ip'];	
		$sql="select * from TB_MSG_WEB where msg_ip='".$ipCliente.
		"' and msg_state = 0 order by msg_id desc limit 1";
		$result=$con->query($sql);
		//$response=array();
		if ($row=$result->fetch_assoc()) {
			$sql_update="update TB_MSG_WEB set msg_state = 1 ".
			"where msg_id=".$row['msg_id'];
			$result2=$con->query($sql_update);
			echo $row['msg_value'];
		}else{
			echo "No hay pregunta.";
		}
	}else{
		echo "No hay conexion.";
	}
?>