<?php 

    // para trabajar de manera local
    // $server="localhost";
    // $user="root";
    // $pass="";
    // $bd="gestor_pagos";

    // Para el hosting
    $server="localhost";
    $user="u801406368_root";
    $pass="Gestorpagos2312";
    $bd="u801406368_gestor_pagos";

    $conexion=mysqli_connect("$server","$user","$pass","$bd") or die("Problemas con la conexión"); 
?>