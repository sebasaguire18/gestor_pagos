<?php

    include '../php/conexion-bd.php';

    $consultaUE="SELECT * FROM inicio WHERE status=1";
    $ejecut_consultaUE=mysqli_query($conexion,$consultaUE);
    $mostrarUE=mysqli_fetch_Array($ejecut_consultaUE);

    $consultaUE2="SELECT * FROM inicio ORDER BY id_roll ASC";
    $ejecut_consultaUE2=mysqli_query($conexion,$consultaUE2);

?>