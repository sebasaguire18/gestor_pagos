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
                    if (isset($_GET['idNewUser'])) {
                        $idNewUser=$_GET['idNewUser'];

                        // consultar los detalles del usuario User detalles
                        $consultaUDT="SELECT * FROM extendloan WHERE id_newuser='$idNewUser'";
                        $ejecut_consultaUDT=mysqli_query($conexion,$consultaUDT);
                        $mostrar_UDT=mysqli_fetch_Array($ejecut_consultaUDT);
                        
                    
                        // Para cambiar el formato de fecha
						$dateDatabase=date_create($mostrar_UDT['date']);
                        $date = date_format($dateDatabase, "d/F/Y - h:i a");

                        // para cambiar el formato del precio solicitado
                        $quantityLoanNumber=$mostrar_UDT['quantityLoan'];
                        $quantityLoan=number_format($quantityLoanNumber,0,",",".");
                        
                        if ($mostrar_UDT['status'] == 1) {
									$statusUDT='<td class="tdactive">Aceptada</td>';
                		}elseif ($mostrar_UDT['status'] == 2)  {
									$statusUDT='<td class="tdinactive">Rechazada</td>';
						}	
                        if ($mostrar_UDT['status'] == 1 || $mostrar_UDT['status']==2) {
                ?>
					<h3 class="tittle_form1">Estos son los detalles del usuario</h3>
					<p>¡Recuerda tratar los datos de forma segura!</p>
					<table class="tableUserEdit">
								<tr>
                                    <td class="titleEdit">ID</td>
                                    <td><?php echo $mostrar_UDT['id_extendLoan']; ?></td>
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
                                    <td><?php echo "$ ". $quantityLoan; ?></td>
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
							</table>
                            <?php
                                }else {
                            ?>
                                <div class="alert alert-danger text-center">
                                    <p><span class="icon-warning"> </span>¡Hubo un Error al seleccionar el usuario!</p><a class="volver" href="../vistasnew/nuevoCliente.php">Volver</a>
                                </div>
                            <?php
                                    
                                }	
                    }else {
                        header('location:../vistasnew/index.php');
                    }
					?>
					<br><hr><br>
                </div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
							<table class="tableUserEdit">
								<tr>
									<td class="titleEdit">ID</td>
									<td class="titleEdit">Nombre</td>
									<td class="titleEdit">Identificación</td>
									<td class="titleEdit">Estado</td>
								</tr>
								<?php
								// consultar los usuarios existentes deudores UsuarioDeudor
									$consultaUD="SELECT * FROM extendloan";
									$ejecut_consultaUD=mysqli_query($conexion,$consultaUD);
									
									while($mostrar_UD=mysqli_fetch_Array($ejecut_consultaUD)){
								?>
									<tr>
										<td><?php echo $mostrar_UD['id_extendLoan'];?></td>
								<?php
									if ($mostrar_UD['status'] == 1) {
										$status='<td class="tdactive"><span class="icon-check"></span></td>';
								?>
										<td><a href="detalleUserP.php?idUser=<?php echo $mostrar_UD["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}elseif ($mostrar_UD['status'] == 0)  {
										$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
								?>
										<td><?php echo $mostrar_UD["name"];?></td>
								<?php
									}elseif ($mostrar_UD['status'] == 2)  {
										$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
								?>
										<td><a href="detalleUserP.php?idUser=<?php echo $mostrar_UD["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
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