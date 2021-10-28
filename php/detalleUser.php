<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';

  if($_SESSION['usuario']){
                $nombre=$_SESSION['usuario'];
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Detalles del Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
  <meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
  <meta name="author" content="gettemplates.co" />

      <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  
  <?php include '../includes/linksnew.php'; ?>

  </head>
  <body>
    
  <div class="gtco-loader"></div>
  
  <div id="page">
  <nav class="gtco-nav" role="navigation">
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-12 text-right gtco-contact">
          <ul class="">
            <!-- <li><a href="#"><i class="icon-phone"></i> +1 (0)123 456 7890 </a></li>
            <li><a href="#"><i class="ti-twitter-alt"></i> </a></li>
            <li><a href="#"><i class="ti-facebook"></i></a></li> -->
            <li id="btn-abrir-popup"><a href="#" ><i class="ti-user"></i> <?php echo $mostrar_usu['name']; ?> </a><?php if ($mostrar_usu['id_roll']==1) {?><span class="label label-warning"><?php echo $solicitudesTotal;}?></span></li>
          </ul>
        </div>
      </div>

      <?php include '../includes/popupnew.php'; ?>

      <?php include '../includes/navnew.php'; ?>
      
    </div>
  </nav>
		<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/image_bg_1.jpg);">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc">
									<h1 class="animate-box" data-animate-effect="fadeInUp">Detalles de los Usuarios</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver los detalles de los <em>Usuarios</em></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

  <div class="gtco-section">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-6 animate-box">
                <?php
                    if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
                        $idUser=$_GET['idUser'];
                        // consultar los detalles del usuario User detalles
                        $consultaUDT="SELECT * FROM new_user WHERE id_newuser='$idUser'";
                        $ejecut_consultaUDT=mysqli_query($conexion,$consultaUDT);
                        $mostrar_UDT=mysqli_fetch_Array($ejecut_consultaUDT);
                        
                        // consultar los detalles del usuario User detalles de la tabla inicio para el login
                        $consultaUDTI="SELECT * FROM inicio WHERE id_newuser='$idUser'";
                        $ejecut_consultaUDTI=mysqli_query($conexion,$consultaUDTI);
						$mostrar_UDTI=mysqli_fetch_Array($ejecut_consultaUDTI);
						$validarUsuarioDTI=mysqli_num_rows($ejecut_consultaUDTI);
                    
                        // Para cambiar el formato de fecha
						$dateDatabase=date_create($mostrar_UDT['date']);
						$date = date_format($dateDatabase, "d/F/Y - h:i a");
						
						 // para cambiar el formato del precio solicitado
						 $quantityNumber=$mostrar_UDT['quantity'];
						 $quantity=number_format($quantityNumber,0,",",".");
						
                        if ($mostrar_UDT['status'] == 1) {
									$statusUDT='<td class="tdactive">Aceptada</td>';
                		}elseif ($mostrar_UDT['status'] == 2)  {
									$statusUDT='<td class="tdinactive">Rechazada</td>';
						}	
						if ($mostrar_UDTI['status'] == 1) {
									$statusUDTI='<td class="tdactive">Activo</td>';
						}elseif ($mostrar_UDTI['status'] == 0)  {
									$statusUDTI='<td class="tdinactive">Inactivo</td>';
						}
                        if ($mostrar_UDT['status'] == 1 || $mostrar_UDT['status']==2) {
                ?>
					<h3 class="tittle_form1">Estos son los detalles del usuario <i class="mes_true" ></i></h3>
					<p>¡Recuerda tratar los datos de forma segura!</p>
					<table class="tableUserEdit">
								<tr>
                                    <td class="titleEdit">ID</td>
                                    <td><?php echo $mostrar_UDT['id_newuser']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Nombre</td>
                                    <td><?php echo $mostrar_UDT['name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Dirección</td>
                                    <td><?php echo $mostrar_UDT['address']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Identificación</td>
                                    <td><?php echo $mostrar_UDT['nit_user']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Télefono</td>
                                    <td><?php echo $mostrar_UDT['phone_user']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Cantidad solicitada</td>
                                    <td><?php echo "$ ". $quantity; ?></td>
                                </tr>
                                <tr>
                                    <?php if ($mostrar_UDT['status'] == 2)  { ?>
                                        <td class="titleEdit">Razón del Rechazo</td>
                                        <td><?php echo $mostrar_UDT['why_refuse']; ?></td>
                                    <?php } ?> 
                                </tr>
                                <tr>    
                                    <td class="titleEdit">Fecha solicitud</td>
                                    <td><?php echo $date; ?></td>
                                </tr>
                                <tr>    
                                    <td class="titleEdit">Solicitud</td>
                                    <?php echo $statusUDT; ?>
								</tr>
								<!-- mostrar el estado si el usuario existe en la tabla de inicio de sesión -->
									<?php
										if ($validarUsuarioDTI==1) {
										?>
									<tr>    
										<td class="titleEdit">Estado</td>
										<?php echo $statusUDTI; ?>
									</tr>
									<tr>
										<?php if ($mostrar_UDT['status'] == 1)  { ?>
											<td class="titleEdit">Correo de inicio de sesión</td>
											<td><?php echo $mostrar_UDTI['email']; ?></td>
										<?php } ?>  
									</tr>
									<tr>
										<?php if ($mostrar_UDT['status'] == 1)  { ?>
											<td class="titleEdit">Contraseña</td>
											<td><?php echo $mostrar_UDTI['pass']; ?></td>
										<?php } ?> 
									</tr>
									<?php
										}else{
									?>
									<tr>    
										<td class="titleEdit">Estado</td>
										<td class="tdinactive">Eliminado de la plataforma</td>
									</tr>
									<?php
										}
									?>
								<!-- fin mostrar el estado si el usuario existe en la tabla de inicio de sesión -->
                               
							</table>
                            <?php
                                }else {
                                    if ($mostrar_usu['id_roll']==1){
                            ?>
                                    <p class="mes_false"><span class="icon-warning"> </span>¡Hubo un Error al seleccionar el usuario!</p><a class="volver" href="../vistasnew/solicitudes.php">Volver</a>
                            <?php
                                    }else {
                            ?>
                                        <p class="mes_false"><span class="icon-warning"> </span>¡Hubo un Error al seleccionar el usuario!</p><a class="volver" href="../vistasnew/nuevoCliente.php">Volver</a>
                            <?php
                                    }
                                }	
                    }else {
                        if ($mostrar_usu['id_roll']==1){
                            ?>
                                    <p class="mes_false"><span class="icon-warning"> </span>¡Hubo un Error al seleccionar el usuario!</p><a class="volver" href="../vistasnew/solicitudes.php">Volver</a>
                            <?php
                                    }else {
                            ?>
                                        <p class="mes_false"><span class="icon-warning"> </span>¡Hubo un Error al seleccionar el usuario!</p><a class="volver" href="../vistasnew/nuevoCliente.php">Volver</a>
                            <?php
                                    }
                    }
                    ?>
					<br><hr><br>
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
							<table class="tableUserEdit">
								<tr>
									<td class="titleEdit">Nombre</td>
									<td class="titleEdit">Identificación</td>
									<td class="titleEdit">Estado</td>
								</tr>
							<?php
							// consultar los usuarios existentes deudores UsuarioDeudor
								$consultaUD="SELECT * FROM new_user";
								$ejecut_consultaUD=mysqli_query($conexion,$consultaUD);
								
								while($mostrar_UD=mysqli_fetch_Array($ejecut_consultaUD)){
							?>
								<tr>
							<?php
								if ($mostrar_UD['status'] == 1) {
									$status='<td class="tdactive"><span class="icon-check"></span></td>';
							?>
									<td><a href="../php/detalleUser.php?idUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
							<?php
								}elseif ($mostrar_UD['status'] == 0)  {
									$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
							?>
									<td><?php echo $mostrar_UD["name"];?></td>
							<?php
								}elseif ($mostrar_UD['status'] == 2)  {
									$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
							?>
									<td><a href="../php/detalleUser.php?idUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
							<?php
								}
							?>	
									<td><?php echo $mostrar_UD['nit_user']; ?></td>
									<?php echo $status;?>
								</tr>
							<?php		
								}
							?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<?php
		if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
	?>	
	<div id="gtco-subscribe">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="gtco-section">
						<h3 class="tittle_form2">Usuarios de la plataforma</h3>
						<p>¡Recuerda tratar los datos de forma segura!</p>
						<table class="tableUsuarios">
							<tr>
								<td class="title">Nombre</td>
								<td class="title">Tipo de Usuario</td>
								<td class="title">Estado</td>
							</tr>
						<?php
							while($mostrar_UE=mysqli_fetch_Array($ejecut_consultaUE2)){
						?>
							<tr>
								<td><?php echo $mostrar_UE['name'];?></td>
						<?php
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
							// Para habilitar el editar el usuer
						?>
								<td><?php echo $tipo_user; ?></td>
								<?php echo $status;?>
						<?php
								if($mostrar_usu['id_roll']==1){
						?>
								<td><a href="../php/editUser.php?id_user=<?php echo $mostrar_UE['id_user'];?>"><span class="icon-creative-commons-share"></span></a></td>
                        <?php		
							    }
						?>
							</tr>
						<?php		
							}
						?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<?php
		}
	?>
    <?php include '../includes/footer.php'; ?>
  </div>

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
  </div>
    <?php include '../includes/scriptnew.php'; ?>
  </body>
</html>
<?php
        }else{
                header("location:../index.php");
        }
?>