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

// dar formato a un precio

function formatoAPrecio($precio){
        
    $precioCF=number_format($precio,0,",",".");

    return $precioCF;
}

?>