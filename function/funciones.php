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

function consultarClientesLista($status,$page=false){
    include '../php/conexion-bd.php';
        if($_SESSION['usuario']){
            $nombre=$_SESSION['usuario'];
        
        $consultar_usu="SELECT * FROM inicio WHERE name='$nombre' AND status=1";
        $ejec_c_u=mysqli_query($conexion,$consultar_usu);
        $mostrar_usu=mysqli_fetch_array($ejec_c_u);

        if ($status == 3) {
            $ejecut_consultaUE2=mysqli_query($conexion,"SELECT * FROM new_user INNER JOIN balance ON new_user.id_newuser = balance.id_newuser ORDER BY new_user.id_newuser ASC");
        }else {
            $ejecut_consultaUE2= mysqli_query($conexion,"SELECT * FROM new_user INNER JOIN balance ON new_user.id_newuser = balance.id_newuser WHERE new_user.status = $status ORDER BY new_user.id_newuser DESC");
        }
        
        while ($mostrar_UE = mysqli_fetch_array($ejecut_consultaUE2)) {
            
            if ($mostrar_UE['status'] == 1) {
                $status='<td class="tdactive"><i class="ti-check"></i></td>';
            }elseif ($mostrar_UE['status'] == 0)  {
                $status='<td class="tdinactive"><i class="ti-close"></i></td>';
            }
        ?>
                    <tr>
                        <td><?php echo $mostrar_UE['nit_user']; ?></td>
                        <td><?php echo $mostrar_UE['name']; ?></td>
                        <td><?php consultarNombreCiudad($mostrar_UE['city']); ?></td>
                        <td><?php echo formatoAPrecio($mostrar_UE['total_quantity']); ?></td>
                        <?php echo $status;?>
                        <?php if($mostrar_usu['id_roll']==1){ ?>
                            <td class="text-center"><a title="Editar" href="../php/editUser.php?id_user=<?php echo $mostrar_UE['id_newuser'];?>"><i class="ti-file"></i></a></td>
                        <?php } ?>
                        <?php if($page){ ?>
                            <td class="text-center"><a title="Ver Historial" href="../vistasnew/historial_pagos.php?nit_user=<?php echo $mostrar_UE['nit_user'];?>"><i class="ti-plus"></i></a></td>
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
                        <?php if($mostrar_usu['id_roll']==1){ ?>
                            <td class="text-center"><a title="Editar" href="../php/editUser.php?id_user=<?php echo $mostrar_UE['id_user'];?>"><i class="ti-file"></i></a></td>
                        <?php } ?>
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

function consultarTipoPagosLista($status){
    include '../php/conexion-bd.php';
        if($_SESSION['usuario']){
            $nombre=$_SESSION['usuario'];

        if ($status == 3) {
            $ejecut_consultaUE2=mysqli_query($conexion,"SELECT * FROM paytype ORDER BY paytype_id ASC");
        }else {
            $ejecut_consultaUE2= mysqli_query($conexion,"SELECT * FROM paytype WHERE paytype_status = $status ORDER BY paytype_id DESC");
        }
        
        while ($mostrarCiudades = mysqli_fetch_array($ejecut_consultaUE2)) {
            
           if ($mostrarCiudades['paytype_status'] == 1) {
                $status='<td class="tdactive"><i class="ti-check"></i></td>';
            }elseif ($mostrarCiudades['paytype_status'] == 0)  {
                $status='<td class="tdinactive"><i class="ti-close"></i></td>';
            }
        ?>
                    <tr>
                        <td><?php echo $mostrarCiudades['paytype_id']; ?></td>
                        <td><?php echo $mostrarCiudades['paytype_name']; ?></td>
                        <?php echo $status;?>
                        <td class="text-center"><a title="Editar" href="../php/editUser.php?paytype_id=<?php echo $mostrarCiudades['paytype_id'];?>"><i class="ti-file"></i></a></td>
                    </tr>
        <?php
        }
    }   
}

function consultarTipoPagosSelect($status){
    include '../php/conexion-bd.php';
    if ($status == 3) {
        // consultar las ciudades disponibles para prestar
        $consultaTipoPago="SELECT * FROM paytype";
        $ejecut_consultaTipoPago=mysqli_query($conexion,$consultaTipoPago);
    }else {
        // consultar las ciudades disponibles para prestar
        $consultaTipoPago="SELECT * FROM paytype WHERE paytype_status = $status ORDER BY paytype_name";
        $ejecut_consultaTipoPago=mysqli_query($conexion,$consultaTipoPago);
    }

    while($mostrar_TipoPago=mysqli_fetch_Array($ejecut_consultaTipoPago)){
    ?>
        <option value="<?php echo $mostrar_TipoPago['paytype_id'] ?>"><?php echo $mostrar_TipoPago['paytype_name'] ?></option>
    <?php		
    }
}

function consultarPagosLista($status,$usu_id=false){
    include '../php/conexion-bd.php';
    
            $nombre=$_SESSION['usuario'];
            $consultar_usu="SELECT * FROM inicio WHERE name='$nombre' AND status=1";
            $ejec_c_u=mysqli_query($conexion,$consultar_usu);
            $mostrar_usu=mysqli_fetch_array($ejec_c_u);

        if ($usu_id) {
            if ($status == 3) {
                $ejecut_consultaPayment=mysqli_query($conexion,"SELECT * FROM payment WHERE nit_user = $usu_id ORDER BY id_payment DESC");
            }else {
                $ejecut_consultaPayment= mysqli_query($conexion,"SELECT * FROM payment WHERE nit_user = $usu_id AND status = $status ORDER BY id_payment DESC");
            }
            
            while ($mostrarPagos = mysqli_fetch_array($ejecut_consultaPayment)) {
                
               if ($mostrarPagos['status'] == 1) {
                    $status='<td class="tdactive"><i class="ti-check"></i></td>';
                }elseif ($mostrarPagos['status'] == 0)  {
                    $status='<td class="tdinactive"><i class="ti-close"></i></td>';
                }
            ?>
                        <tr>
                            <td><?php echo $mostrarPagos['id_payment']; ?></td>
                            <td><?php echo formatoAPrecio($mostrarPagos['quantity']); ?></td>
                            <td><?php echo consultarRazonAbono($mostrarPagos['razon_abono']); ?></td>
                            <td><?php echo $mostrarPagos['forma_pago']; ?></td>
                            <td><?php echo formatoAFecha($mostrarPagos['date'],1); ?></td>
                        </tr>
            <?php
            }
        }else{
            if ($status == 3) {
                $ejecut_consultaPayment=mysqli_query($conexion,"SELECT * FROM payment ORDER BY id_payment DESC");
            }else {
                $ejecut_consultaPayment= mysqli_query($conexion,"SELECT * FROM payment WHERE status = $status ORDER BY id_payment DESC");
            }
            
            while ($mostrarPagos = mysqli_fetch_array($ejecut_consultaPayment)) {
                
                if ($mostrarPagos['status'] == 1) {
                    $status='<td class="tdactive"><i class="ti-check"></i></td>';
                }elseif ($mostrarPagos['status'] == 0)  {
                    $status='<td class="tdinactive"><i class="ti-close"></i></td>';
                }
            ?>
                        <tr>
                            <td class="hidenP"><?php echo $mostrarPagos['id_payment']; ?></td>
                            <td><?php echo $mostrarPagos['name'];?> &#8212 Cel: <a href='tel:<?php echo $mostrarPagos['phone_user'];?>'> <?php echo $mostrarPagos['phone_user']; ?></a></td>
                            <td><?php echo $mostrarPagos['address']; ?></td>
                            <td><?php echo formatoAPrecio($mostrarPagos['quantity']); ?></td>
                            <td><?php echo consultarRazonAbono($mostrarPagos['razon_abono']); ?></td>
                            <td><?php echo formatoAFecha($mostrarPagos['date'],1); ?></td>
                            <?php if($mostrar_usu['id_roll']==1){ ?>
                            <td><a title="Ver Detalles" href="../php/detallePago.php?id_payment=<?php echo $mostrarPagos['id_payment'];?>"><span class="icon-plus h2"></span></a></td>
                            <?php } ?>
                        </tr>
            <?php
            }
        }
}

function consultarSaldosPendLista($status,$usu_id=false){
    include '../php/conexion-bd.php';
    
            $nombre=$_SESSION['usuario'];
            $consultar_usu=mysqli_query($conexion,"SELECT * FROM inicio WHERE name='$nombre' AND status=1");
            $mostrar_usu=mysqli_fetch_array($consultar_usu);

        if ($usu_id) {
            if ($status == 3) {
                $ejecut_consultaSaldosPendientes=mysqli_query($conexion,"SELECT * FROM balance INNER JOIN new_user ON balance.id_newuser=new_user.id_newuser WHERE balance.total_quantity<>'0' AND id_newuser = $usu_id ORDER BY date DESC");
            }else {
                $ejecut_consultaSaldosPendientes= mysqli_query($conexion,"SELECT * FROM balance INNER JOIN new_user ON balance.id_newuser=new_user.id_newuser WHERE balance.total_quantity<>'0' AND id_newuser = $usu_id AND status = $status ORDER BY date DESC");
            }
            
            while ($mostrarSaldo = mysqli_fetch_array($ejecut_consultaSaldosPendientes)) {
                
               if ($mostrarSaldo['status'] == 1) {
                    $status='<td class="tdactive"><i class="ti-check"></i></td>';
                }elseif ($mostrarSaldo['status'] == 0)  {
                    $status='<td class="tdinactive"><i class="ti-close"></i></td>';
                }
            ?>
                        <tr>
                            <td><?php echo $mostrarSaldo['nit_user']; ?></td>
                            <td><?php echo $mostrarSaldo['name']. " &#8212 <a href='tel:". $mostrarSaldo['phone_user']. "'>" . $mostrarSaldo['phone_user']; ?></a></td>
                            <td><?php echo consultarNombreCiudad($mostrarSaldo['city']); ?></td>
                            <td><?php echo formatoAPrecio($mostrarSaldo['total_quantity']); ?></td>
                            <td><?php echo consultarNombreTipoPago($mostrarSaldo['tipo_credito']); ?></td>
                            <?php if($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2){ ?>
                                    <td><a title="Realizar Abono" href="../php/editPayment.php?id_newuser=<?php echo $mostrarSaldo['id_newuser'];?>"><span class="ti-receipt"></span></a></td>
                            <?php } ?>
                        </tr>
            <?php
            }
        }else{
            if ($status == 3) {
                $ejecut_consultaSaldosPendientes=mysqli_query($conexion,"SELECT * FROM balance INNER JOIN new_user ON balance.id_newuser=new_user.id_newuser WHERE balance.total_quantity<>'0' ORDER BY city DESC");
            }else {
                $ejecut_consultaSaldosPendientes= mysqli_query($conexion,"SELECT * FROM balance INNER JOIN new_user ON balance.id_newuser=new_user.id_newuser WHERE balance.total_quantity<>'0' AND status = $status ORDER BY city DESC");
            }
            
            while ($mostrarSaldo = mysqli_fetch_array($ejecut_consultaSaldosPendientes)) {
                
               if ($mostrarSaldo['status'] == 1) {
                    $status='<td class="tdactive"><i class="ti-check"></i></td>';
                }elseif ($mostrarSaldo['status'] == 0)  {
                    $status='<td class="tdinactive"><i class="ti-close"></i></td>';
                }
            ?>
                        <tr>
                            <td><?php echo $mostrarSaldo['nit_user']; ?></td>
                            <td><?php echo $mostrarSaldo['name']. " &#8212 <a href='tel:". $mostrarSaldo['phone_user']. "'>" . $mostrarSaldo['phone_user']; ?></a></td>
                            <td><?php echo consultarNombreCiudad($mostrarSaldo['city']); ?></td>
                            <td><?php echo formatoAPrecio($mostrarSaldo['total_quantity']); ?></td>
                            <?php if($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2){ ?>
                                    <td><a title="Realizar Abono" href="../php/editPayment.php?id_newuser=<?php echo $mostrarSaldo['id_newuser'];?>"><span class="ti-receipt"></span></a></td>
                            <?php } ?>
                        </tr>
            <?php
            }
        }
}

function consultarNombreCiudad($city_id){
    include '../php/conexion-bd.php';

    $consultaNC = mysqli_query($conexion,"SELECT * FROM citys WHERE city_id = '$city_id'");

    $mostrar_nameCity = mysqli_fetch_Array($consultaNC);

    echo $mostrar_nameCity['city_name'];

}

function consultarNombreTipoPago($paytype_id){
    include '../php/conexion-bd.php';

    $consultaNTP = mysqli_query($conexion,"SELECT * FROM paytype WHERE paytype_id = '$paytype_id'");

    $mostrar_nameTP = mysqli_fetch_Array($consultaNTP);

    echo $mostrar_nameTP['paytype_name'];

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

function consultarRazonAbono($razon_id){
    if ($razon_id == '1' || $razon_id == 1) {
        return 'Abono a deuda'; 
    }elseif ($razon_id == '2' || $razon_id == 2) {
        return 'Renovación';
    }elseif ($razon_id == '101' || $razon_id == 101) {
        return 'Aumento Cupo';
    }elseif ($razon_id == '102' || $razon_id == 102) {
        return 'Reduccion Cupo';
    }
}

// dar formato a un precio

function formatoAPrecio($precio){
        
    $precioCF='$'.number_format($precio,0,",",".");

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