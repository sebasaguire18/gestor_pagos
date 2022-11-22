<?php 

// Funcion que forma la tabla de lista de usuarios
function listaUsuTable(){
    include '../php/conexion-bd.php';
    if($_SESSION['usuario']){
		$nombre=$_SESSION['usuario'];

        $consultar_usu="SELECT * FROM inicio WHERE name='$nombre' AND status=1";
        $ejec_c_u=mysqli_query($conexion,$consultar_usu);
        $mostrar_usu=mysqli_fetch_array($ejec_c_u);

        $consultaUE2="SELECT * FROM inicio ORDER BY id_roll ASC";
        $ejecut_consultaUE2=mysqli_query($conexion,$consultaUE2);

        while($mostrar_UE=mysqli_fetch_Array($ejecut_consultaUE2)){
            if ($mostrar_UE['id_roll']==1) {
                $tipo_user="Administrador";
            }elseif ($mostrar_UE['id_roll']==2) {
                $tipo_user="Cobrador";
            }elseif ($mostrar_UE['id_roll']==3) {
                $tipo_user="Deudor";
            }if ($mostrar_UE['status'] == 1) {
                $status='<td class="tdactive"><span class="icon-check"></span></td>';
            }elseif ($mostrar_UE['status'] == 0)  {
                $status='<td class="tdinactive"><span class="icon-cross"></span></td>';
            }
    ?>	
            <tr>
                <td><?php echo $mostrar_UE['name'];?></td>
                <td><?php echo $tipo_user; ?></td>
                <?php echo $status;?>
                <?php if($mostrar_usu['id_roll']==1){ ?>
                    
                <td><a href="../php/editUser.php?id_user=<?php echo $mostrar_UE['id_user'];?>"><span class="icon-creative-commons-share"></span></a></td>
                
                <?php } ?>
                
            </tr>
        <?php		
            }
    }
}

function consultarUsuariosLista($status){
    include '../php/conexion-bd.php';
        if($_SESSION['usuario']){
            $nombre=$_SESSION['usuario'];
        
        $consultar_usu="SELECT * FROM inicio WHERE name='$nombre' AND status=1";
        $ejec_c_u=mysqli_query($conexion,$consultar_usu);
        $mostrar_usu=mysqli_fetch_array($ejec_c_u);

        if ($status == 3) {
            $ejecut_consultaUE2=mysqli_query($conexion,"SELECT * FROM inicio ORDER BY id_roll ASC");
        }else {
            $ejecut_consultaUE2= mysqli_query($conexion,"SELECT * FROM inicio WHERE status = $status ORDER BY id DESC");
        }
        
        while ($mostrar_UE = mysqli_fetch_array($ejecut_consultaUE2)) {
            
            if ($mostrar_UE['id_roll']==1) {
                $tipo_user="Administrador";
            }elseif ($mostrar_UE['id_roll']==2) {
                $tipo_user="Cobrador";
            }elseif ($mostrar_UE['id_roll']==3) {
                $tipo_user="Deudor";
            }if ($mostrar_UE['status'] == 1) {
                $status='<td class="tdactive"><i class="ti-check"></i></td>';
            }elseif ($mostrar_UE['status'] == 0)  {
                $status='<td class="tdinactive"><i class="ti-close"></i></td>';
            }
        ?>
                    <tr>
                        <td><?php echo $mostrar_UE['name']; ?></td>
                        <td><?php echo $tipo_user; ?></td>
                        <?php echo $status;?>
                        <td class="text-center"><a title="Editar" href="../php/editUser.php?id_user=<?php echo $mostrar_UE['id_user'];?>"><i class="ti-file"></i></a></td>
                    </tr>
        <?php
        }
    }   
}

function consultarUsuariosSelect($status){
    include '../php/conexion-bd.php';
    if ($status == 3) {
        // consultar las usuarios que tienen crédito
        $consulUsuariosF="SELECT * FROM new_user";
        $ejecut_consultaUsuariosF=mysqli_query($conexion,$consultaUsuariosF);
    }else {
        // consultar las usuarios que tienen crédito
        $consultaUsuariosF="SELECT * FROM new_user WHERE status = $status ORDER BY name";
        $ejecut_consultaUsuariosF=mysqli_query($conexion,$consultaUsuariosF);
    }

    while($mostrar_usuariosF=mysqli_fetch_Array($ejecut_consultaUsuariosF)){
    ?>
        <option value="<?php echo $mostrar_usuariosF['id_newuser'] ?>"><?php echo $mostrar_usuariosF['name'] ?></option>
    <?php		
    } 
}

function consultarCiudadLista($status){
    include '../php/conexion-bd.php';
        if($_SESSION['usuario']){
            $nombre=$_SESSION['usuario'];

        if ($status == 3) {
            $ejecut_consultaUE2=mysqli_query($conexion,"SELECT * FROM citys ORDER BY city_id ASC");
        }else {
            $ejecut_consultaUE2= mysqli_query($conexion,"SELECT * FROM citys WHERE city_status = $status ORDER BY city_id DESC");
        }
        
        while ($mostrarCiudades = mysqli_fetch_array($ejecut_consultaUE2)) {
            
           if ($mostrarCiudades['city_status'] == 1) {
                $status='<td class="tdactive"><i class="ti-check"></i></td>';
            }elseif ($mostrarCiudades['city_status'] == 0)  {
                $status='<td class="tdinactive"><i class="ti-close"></i></td>';
            }
        ?>
                    <tr>
                        <td><?php echo $mostrarCiudades['city_id']; ?></td>
                        <td><?php echo $mostrarCiudades['city_name']; ?></td>
                        <?php echo $status;?>
                        <td class="text-center"><a title="Editar" href="../php/editUser.php?city_id=<?php echo $mostrarCiudades['city_id'];?>"><i class="ti-file"></i></a></td>
                    </tr>
        <?php
        }
    }   
}

function consultarCiudadesSelect($status){
    include '../php/conexion-bd.php';
    if ($status == 3) {
        // consultar las ciudades disponibles para prestar
        $consultaCitys="SELECT * FROM citys";
        $ejecut_consultaCitys=mysqli_query($conexion,$consultaCitys);
    }else {
        // consultar las ciudades disponibles para prestar
        $consultaCitys="SELECT * FROM citys WHERE city_status = $status ORDER BY city_name";
        $ejecut_consultaCitys=mysqli_query($conexion,$consultaCitys);
    }

    while($mostrar_Citys=mysqli_fetch_Array($ejecut_consultaCitys)){
    ?>
        <option value="<?php echo $mostrar_Citys['city_id'] ?>"><?php echo $mostrar_Citys['city_name'] ?></option>
    <?php		
    }
}

function consultarNombreCiudad($city_id){
    include '../php/conexion-bd.php';

    $consultaNC = mysqli_query($conexion,"SELECT * FROM citys WHERE city_id = '$city_id'");

    $mostrar_nameCity = mysqli_fetch_Array($consultaNC);

    echo $mostrar_nameCity['city_name'];

}

function consultarNombreUsuario($usu_id){
    include '../php/conexion-bd.php';
    if ($usu_id == 0 || $usu_id == '0') {
        echo 'No tiene fiador';
    }else {
        $consultaNU = mysqli_query($conexion,"SELECT * FROM new_user WHERE id_newuser = '$usu_id'");
    
        $mostrar_nameUsuario = mysqli_fetch_Array($consultaNU);
    
        echo $mostrar_nameUsuario['name'];
    }

}

// dar formato a un precio

function formatoAPrecio($precio){
        
    $precioCF='$ '.number_format($precio,0,",",".");

    return $precioCF;
}

// dar formato a una fecha, sí se le pasa el segundo parametro regresa la fecha con la hora

function formatoAFecha($fecha,$hora=false){
        
    date_default_timezone_set('America/Bogota');

    if ($hora) {
        $mes = array("","Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre");

        $fechaCF=date('d',strtotime($fecha)) . " de " . $mes[date('n',strtotime($fecha))] . " de " . date('Y',strtotime($fecha)) . " a las " . date('g:i a',strtotime($fecha));

        return $fechaCF;
        
    }else {
        $mes = array("","Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre");

        $fechaCF=date('d',strtotime($fecha))." de ". $mes[date('n',strtotime($fecha))] . " de " . date('Y',strtotime($fecha));

        return $fechaCF;
    }
}

?>