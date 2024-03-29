<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';
  include '../function/funciones.php';

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
      

      <?php include '../includes/popupnew.php'; ?>

      <?php include '../includes/navnew.php'; ?>
      
    </div>
  </nav>
		<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
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
                        
                        // consultar los detalles del usuario de la tabla balance
                        $consultaUDTI="SELECT * FROM balance WHERE id_newuser='$idUser'";
                        $ejecut_consultaUDTI=mysqli_query($conexion,$consultaUDTI);
						$mostrar_UDTI=mysqli_fetch_Array($ejecut_consultaUDTI);
						$validarUsuarioDTI=mysqli_num_rows($ejecut_consultaUDTI);
						
						
                        if ($mostrar_UDT['status'] == 1) {
									$statusUDT='<td class="tdactive">Aceptada</td>';
                		}elseif ($mostrar_UDT['status'] == 2)  {
									$statusUDT='<td class="tdinactive">Rechazada</td>';
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
                                    <td class="titleEdit">Identificación</td>
                                    <td><?php echo $mostrar_UDT['nit_user']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Dirección</td>
                                    <td><?php echo $mostrar_UDT['address']; ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Ciudad</td>
                                    <td><?php echo consultarNombreCiudad($mostrar_UDT['city']); ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Télefono</td>
                                    <td><a href="tel:<?php echo $mostrar_UDT['phone_user']; ?>"><?php echo $mostrar_UDT['phone_user']; ?></a></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Fiador</td>
                                    <?php if ($mostrar_UDT['fiador']<>0) { ?>
                                        <td title="Ver detalles del cliente"><a href="../php/detalleUser.php?idUser=<?php echo $mostrar_UDT['fiador']; ?>"><?php echo consultarNombreUsuario($mostrar_UDT['fiador']); ?></a></td>
                                    <?php }else{ ?>
                                        <td><?php echo consultarNombreUsuario($mostrar_UDT['fiador']); ?></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Cupo Crédito</td>
                                    <td><?php echo formatoAPrecio($mostrar_UDTI['b_quantity']); ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Interés del cupo</td>
                                    <td><?php echo formatoAPrecio($mostrar_UDTI['interests']); ?></td>
								</tr>
                                <tr>
                                    <td class="titleEdit">Tipo Crédito</td>
                                    <td><?php echo consultarNombreTipoPago($mostrar_UDT['tipo_credito']); ?></td>
                                </tr>
                                <tr>
                                    <td class="titleEdit">Cuotas</td>
                                    <td><?php echo $mostrar_UDT['cuotas_credito']; ?></td>
								</tr>   
								<?php if ($validarUsuarioDTI > 0)  { ?>
                                <tr>
                                        <td class="titleEdit">Saldo Pendiente</td>
                                        <td><?php echo formatoAPrecio($mostrar_UDTI['total_quantity']); ?></td>
								</tr>
                                    <?php } ?> 
                                <tr>
                                    <?php if ($mostrar_UDT['status'] == 2)  { ?>
                                        <td class="titleEdit">Razón del Rechazo</td>
                                        <td><?php echo $mostrar_UDT['why_refuse']; ?></td>
                                    <?php } ?> 
                                </tr>
                                <tr>
                                    <td class="titleEdit">Nota de la solicitud</td>
                                    <td><?php echo $mostrar_UDT['nota']; ?></td>
								</tr> 
                                <tr>    
                                    <td class="titleEdit">Fecha solicitud</td>
                                    <td><?php echo formatoAFecha($mostrar_UDT['date'],1); ?></td>
                                </tr>
                                <tr>    
                                    <td class="titleEdit">Solicitud</td>
                                    <?php echo $statusUDT; ?>
								</tr>

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