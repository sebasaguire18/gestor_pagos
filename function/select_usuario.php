<?php
	session_start();
	if($_SESSION['usuario']){
        $nombre=$_SESSION['usuario'];
	       	include '../php/conexion-bd.php';

			$consultar_usu="SELECT * FROM inicio WHERE name='$nombre' AND status=1";
			$ejec_c_u=mysqli_query($conexion,$consultar_usu);
			$mostrar_usu=mysqli_fetch_array($ejec_c_u);
  	}
 ?>