<?php
	require_once('../clases/conexion_db.php');
	session_start();

	if(!isset($_SESSION["codigo_usuario"]) or $_SESSION["perfil_usuario"]<>1){
		header("location: ../Administrador/Login.php");
	}

	if(!empty($_POST['id'])){
		//recibir los datos del formulario editar evento
		$identificacion=$_POST['id'];
		$fecha_estado= date("Y-m-d");
    	$activo	  = 1;

		$query="UPDATE `deportistas` SET `fecha_estado` = '$fecha_estado', `estado` = '$activo' WHERE `identificacion` = '$identificacion'";
		$result=$mysqli->query($query);
		if($result){
			echo 1; //Se ha dado de baja al Club y/o Escuela correctamente.
		} else {
			echo 0; //ERROR PRESENTADO - No se ha podido dar de baja al Club y/o Escuela, por favor intente nuevamente.
		}
	}
?>