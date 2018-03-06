<?php
	include("conexion.php");
	function obtenerIP(){
	    if (isset($_SERVER["HTTP_CLIENT_IP"]))
	    {
	        return $_SERVER["HTTP_CLIENT_IP"];
	    }
	    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
	    {
	        return $_SERVER["HTTP_X_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
	    {
	        return $_SERVER["HTTP_X_FORWARDED"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
	    {
	        return $_SERVER["HTTP_FORWARDED_FOR"];
	    }
	    elseif (isset($_SERVER["HTTP_FORWARDED"]))
	    {
	        return $_SERVER["HTTP_FORWARDED"];
	    }
	    else
	    {
	        return $_SERVER["REMOTE_ADDR"];
	    }
	}
	if ($con) {
		$msg=$_POST['msg'];		
		$ipCliente=obtenerIP();
		$sql_orden="SELECT * FROM TB_MSG_WEB WHERE msg_orden LIKE '".$ipCliente."%'";
		$result_count=$con->query($sql_orden);
		$contador=mysqli_num_rows($result_count);
		$string="0".$contador;
		switch(strlen($string)){
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
		"values('".$ipCliente."','".$msg."','jyldigital.com',0,'".
		$ipCliente.$string."','cliente','".$hoy."','".$hora."')";
		$result=$con->query($sql);
		$response=array();
		if ($result) {
			array_push($response, "Guardado");
			array_push($response, $ipCliente);
			echo json_encode($response);
		}else{
			array_push($response, "Fallo");
			echo json_encode($response);
		}
	}else{
		echo "No hay conexion";
	}
?>