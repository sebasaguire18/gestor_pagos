<?php 

    // para trabajar de manera local
    $server="localhost";
    $user="root";
    $pass="";
    $bd="gestor_pagos";

    //  Para el hosting
    // $server="sql304.eshost.com.ar";
    // $user="eshos_25000483";
    // $pass="23124762";
    // $bd="eshos_25000483_gestor_pagos";

    //  Para el hosting regalado
    // $server="localhost:3306";
    // $user="wwwsebasoft";
    // $pass="Sebas2312";
    // $bd="wwwsebasoft_gestor_pagos";

    $conexion=mysqli_connect("$server","$user","$pass","$bd") or die("Problemas con la conexión"); 
?>