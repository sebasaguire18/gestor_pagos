<?php
    include '../php/conexion-bd.php';

	// consultar solicitudes de usuarios nuevos
	$consultS="SELECT * FROM new_user WHERE status=0";
	$ejecutConsultS=mysqli_query($conexion,$consultS);
	$solicitudes=mysqli_num_rows($ejecutConsultS);

	// consultar solicitudes de ampliar prestamo
	$consultAP="SELECT * FROM extendloan WHERE status=0 AND razon_solicitud <> 103";
	$ejecutConsultAP=mysqli_query($conexion,$consultAP);
	$solicitudesAP=mysqli_num_rows($ejecutConsultAP);

	// consultar solicitudes de recuperar cliente
	$consultRC="SELECT * FROM extendloan WHERE status=0 AND razon_solicitud = 103";
	$ejecutConsultRC=mysqli_query($conexion,$consultRC);
	$solicitudesRC=mysqli_num_rows($ejecutConsultRC);

	$solicitudesTotal=$solicitudes+$solicitudesAP+$solicitudesRC;
?>