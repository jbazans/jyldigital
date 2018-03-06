<?php
	include("conexion.php");
	if($con){
		$msg=$_POST['msg'];
		$ipCliente=$_POST['ip'];
		$sql_orden="SELECT * FROM TB_MSG_WEB WHERE msg_orden LIKE '".$ipCliente."%'";
		$result_count=$con->query($sql_orden);
		$contador=mysqli_num_rows($result_count);
		$string="0".$contador;
		switch(sizeof($string)){
			case '1':$string="00000".$string;break;
			case '2':$string="0000".$string;break;
			case '3':$string="000".$string;break;
			case '4':$string="00".$string;break;
			case '5':$string="0".$string;break;
		}
		$hoy=date("d/m/Y");
		$hora=date("H:i");
		$sql="insert into TB_MSG_WEB(msg_ip,msg_value,msg_ip_destino,msg_state,msg_orden,msg_tipo,".
			"msg_fecha,msg_hora) ".
		"values('jyldigital.com','".$msg."','".$ipCliente."',0,'".
		$ipCliente.$string."','webmaster','".$hoy."','".$hora."')";
		$result=$con->query($sql);
		$response=array();
		if ($result) {
			array_push($response, "Guardado");
			array_push($response, $ipCliente.$contador);
			echo json_encode($response);
		}else{
			array_push($response, "Fallo");
			echo json_encode($response);
		}
	}else{
		echo "No hay conexion";
	}
?>