<?php
	include("conexion.php");
	session_start();
	if (isset($_SESSION['nombre'])) {
		header("Location: ../admin/main.php");
	}else{
		if (isset($_POST['user'])) {		
			$user=$_POST['user'];
			$password=$_POST['password'];
			$sql="SELECT USU_PAS,USU_NOM,USU_APE from USUARIO where USU_COR='".$user."' limit 1";
			$result=$con->query($sql);
			while($row=$result->fetch_assoc()){
				$pass=$row['USU_PAS'];
				$nombre=$row['USU_NOM'];
				$apellido==$row['USU_APE'];
			}
			if ($password==$pass) {
				$_SESSION['nombre']=$nombre;
				$_SESSION['apellido']=$apellido;
				header("Location: ../admin/main.php");
			}else{
				$_SESSION['error']="1";
				header("Location: ../admin/");
			}
		}else{
			echo "No tiene permisos de acceso.";
		}
	}
	
?>