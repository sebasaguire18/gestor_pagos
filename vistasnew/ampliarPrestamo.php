<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';
  include '../php/mostrarfecha.php';

  if($_SESSION['usuario']){
        $nombre=$_SESSION['usuario'];
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ampliar Prestamo</title>
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
  <header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
	  <div class="overlay"></div>
	  <div class="gtco-container">
		  <div class="row">
			  <div class="col-md-8 col-md-offset-2 text-center">
				  <div class="display-t">
					  <div class="display-tc">
						  <h1 class="animate-box" data-animate-effect="fadeInUp">Ampliar prestamo</h1>
						  <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes <?php if($mostrar_usu['id_roll']==3){ echo "<em>Solicitar Ampliar tú prestamo.</em>"; }else{echo "<em>Solicitar Ampliar prestamo de cada usuario.</em>"; } ?></h2>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </header>
    <?php
        if ($mostrar_usu['id_roll']==1) {
    ?>
        
		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row row-pb-md">
					<div class="col-md-6 animate-box">
					<?php
						if (isset($_POST['btnHabilitar'])) {
							$id_extendLoan=$_POST['id_extendLoan'];

							// traer datos del ampliar prestamo de la tabla extendloan
							$consultaUN="SELECT * FROM extendloan WHERE id_extendLoan='$id_extendLoan'";
							$ejecut_consultaUN=mysqli_query($conexion,$consultaUN);
							$mostrar_UN=mysqli_fetch_Array($ejecut_consultaUN);
							$verifConsultUN=mysqli_num_rows($ejecut_consultaUN);


							// Para cambiar el formato de fecha
							$dateDatabase=date_create($mostrar_UN['date']);
							$date = date_format($dateDatabase, "d/F/Y - h:i a");

							// Para cambiar el formato de los precios
							$quantityPNumber=$mostrar_UN['quantityP'];
							$quantityP=number_format($quantityPNumber,0,",",".");
							
							$quantityLoanNumber=$mostrar_UN['quantityLoan'];
                			$quantityLoan=number_format($quantityLoanNumber,0,",",".");

							if ($verifConsultUN==0) {
					?>
								<p class="mes_false"><span class="icon-remove-user"> </span>Correo o usuario no existente o hubo un error.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
					<?php
							}else{
					?>	
							<form action="#" method="POST">
								<div class="row form-group">
									<div class="col-md-12">
										<label for="id_newuser">ID del Prestamo:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['id_extendLoan']; ?>">
									</div>
								</div>
								<input type="hidden" name="id_extendLoan" value="<?php echo $mostrar_UN['id_extendLoan']; ?>">
								<input type="hidden" name="name" value="<?php echo $mostrar_UN['name']; ?>">
								<div class="row form-group">
									<div class="col-md-12">
										<label for="name">Nombre:</label>
										<input type="text" disabled id="name" class="form-control" value="<?php echo $mostrar_UN['name']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="address">Dirección:</label>
										<input type="text" disabled id="address" name="address" class="form-control" value="<?php echo $mostrar_UN['address']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Identificación del Usuario:</label>
										<input type="text" disabled id="nit_user" name="nit_user" class="form-control" value="<?php echo $mostrar_UN['nit_user']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Télefono del Usuario:</label>
										<input type="text" disabled name="phone_user" class="form-control" value="<?php echo $mostrar_UN['phone_user']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cantidad que el Usuario Debe:</label>
										<input type="text" disabled name="quantity" class="form-control" value="$ <?php echo $quantityP; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cantidad que el Usuario requiere:</label>
										<input type="text" disabled name="quantity" class="form-control" value="$ <?php echo $quantityLoan; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Fecha:</label>
										<input type="text" disabled name="date" class="form-control" value="<?php echo $date; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="status">Estado:</label>
										<select class="form-control" name="status" id="status">
											<option value="0">Pendiente</option>
											<option value="1">Aprobar</option>
											<option value="2">Rechazar</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="btnValidarP" value="Enviar respuesta" class="btn btn-success btn-outline btn-lg">
									<a href="javascript:history.go(-1);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
								</div>
							</form>
					<?php
							}
						}else {
					?>
						<h3 class="tittle_form1"><?php echo $solicitudesAP;if ($solicitudesAP=1) {echo " Solicitud pendiente";}else {echo " Solicitudes pendientes";}?> por revisar.</h3>
						<p>¡Recuerda verificar bien todos los campos!</p>
						<form action="#" method="POST">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="id_extendLoan">Ampliar Prestamo Pendientes:</label>
									<select class="form-control" name="id_extendLoan" id="id_extendLoan">
										<option value="0">Seleccionar...</option>
									<?php
										$consultaAP="SELECT * FROM extendloan WHERE status=0 ORDER BY id_extendLoan ASC";
										$ejecut_consultaAP=mysqli_query($conexion,$consultaAP);
										while($mostrar_AP=mysqli_fetch_Array($ejecut_consultaAP)){
									?>
										<option value="<?php echo $mostrar_AP['id_extendLoan'];?>"><?php echo $mostrar_AP['nit_user'].' - '.$mostrar_AP['name'];?></option>
									<?php		
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="btnHabilitar" value="Habilitar" class="btn btn-success btn-lg">
							</div>
						</form>	
					<?php
						}
					?>
					<br><hr><br>		
				</div>

		<!-- ----------------------------------------------Mostrar los datos de la tabla extendloan en una tabla ----------------------------------------------- -->


					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
								<table class="tableUserEdit">
									<tr>
										<td class="titleEdit">id</td>
										<td class="titleEdit">Nombre</td>
										<td class="titleEdit">Identificación</td>
										<td class="titleEdit">Estado</td>
									</tr>
								<?php
								// consultar los usuarios existentes deudores UsuarioDeudor ennla tabla de ampliar prestamo extendloan
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
										<td><a href="../php/detalleUserP.php?idUser=<?php echo $mostrar_UD["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}elseif ($mostrar_UD['status'] == 0)  {
										$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
								?>
										<td><?php echo $mostrar_UD["name"];?></td>
								<?php
									}elseif ($mostrar_UD['status'] == 2)  {
										$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idUser=<?php echo $mostrar_UD["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}
								?>	
										<td><?php echo $mostrar_UD['nit_user']; ?></td>
										<?php echo $status;?>
									</tr>
								<?php		
									}
								?>
								<br>
								</table>

		<!----------------------------------------------Cuando el Administrador responde a la solicitud del préstamo ------------------------------------------------------>

								<?php
									if (isset($_POST['btnValidarP'])){
										$id_extendLoan=$_POST['id_extendLoan'];
										$name=$_POST['name'];
										$status=$_POST['status'];

										if ($status==2) {
								?>		
										<hr>
										<p class="mes_false">Favor menciona el ¿Porqué? has rechazado la solicitud.</p>
										<form action="#" method="POST">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="name">La razón es:</label>
													<input type="text" id="why" name="why" class="form-control" placeholder="Éste es un porque!">
												</div>
											</div>
											<input type="hidden" name="id_extendLoan" value="<?php echo $id_extendLoan; ?>">
											<div class="form-group">

												<input type="submit" name="btnRAP" value="Enviar Reporte" class="btn btn-success btn-outline btn-lg">
												<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
											</div>
										</form>
								<?php
										}elseif ($status==1) {
											?>		
											
											<div class="alert alert-warning">
												<p><span class="icon-warning"></span> ¿Confirmas Aceptar la Solicitud?</p>
											</div>
											<form action="#" method="POST">
												<input type="hidden" name="id_extendLoan" value="<?php echo $id_extendLoan; ?>">
												<div class="form-group">
													<input type="submit" name="btnAceptar" value="Confirmar Solicitud" class="btn btn-success btn-outline btn-lg">
													<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
												</div>
											</form>
								<?php		
											
										}elseif ($status==0) {
								?>
								
												<div class="alert alert-info">
													<p>El usuario no se modificó y sigue con el estado actual.</p>
												</div>
												<div class="row form-group">
													<a href="ampliarPrestamo.php" class="btn btn-success btn-outline btn-lg">Vale</a>
													<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
												</div>
								<?php
										}

									}
										// ---------------------  guardo datos en inicio del usuario SI el administrador aprueba la solicitud.
											if (isset($_POST['btnAceptar'])) {
												$id_extendLoan=$_POST['id_extendLoan'];
												$statusN=1;

												$validarUsuario="SELECT * FROM extendloan WHERE id_extendLoan='$id_extendLoan'";
												$ejecut_validarU=mysqli_query($conexion,$validarUsuario);
												$mostrar_UEL=mysqli_fetch_array($ejecut_validarU);

												$id_userE=$mostrar_UEL['id_user'];
												$id_newuserE=$mostrar_UEL['id_newuser'];
												// para poder traer las veces que se han hecho ampliaciones de prestamo
												$consultarAP="SELECT * FROM balance WHERE id_user='$id_userE' AND id_newuser='$id_newuserE'";
												$ejecut_consultarAP=mysqli_query($conexion,$consultarAP);
												$mostrar_CAP=mysqli_fetch_array($ejecut_consultarAP);

												$row=mysqli_num_rows($ejecut_validarU);
												if ($row==0) {
								?>
													
													<div class="alert alert-danger">
														<p><span class="icon-remove-user"> </span>La solicitud ha sido borrada o hubo algún fallo.</p><a class="volver" href="javascript:history.go(-3);">Volver</a>
													</div>
								<?php
												}else{
													
													// actualizar el estado de la solicitud
													$updateStatusEL="UPDATE extendloan SET status='$statusN' WHERE id_extendLoan='$id_extendLoan'";
													$ejecut_updateStatusEL=mysqli_query($conexion,$updateStatusEL);
													
													$quantity_b=$mostrar_CAP['quantity'];
													$quantity=$mostrar_UEL['quantityLoan']+$quantity_b;

													$update_q=$mostrar_CAP['update_q']+$quantity_b;
													$quantity_u=$mostrar_CAP['quantity_u']+1;

													$interests_AP=$quantity_b*0.1;
													$interests=$interests_AP+$mostrar_CAP['interests'];


													// actualizar el nuevo prestamo (Ampliar Nuevo Prestamo) en la tabla balance
													$updateStatusANP="UPDATE balance SET update_q='$update_q', quantity='$quantity', interests='$interests', quantity_u='$quantity_u'  WHERE id_user='$id_userE' AND id_newuser='$id_newuserE'";
													$ejecut_updateStatusANP=mysqli_query($conexion,$updateStatusANP);


													if ($ejecut_updateStatusEL && $ejecut_updateStatusANP) {					
								?>
														
														<div class="alert alert-success">
															<p><span class="icon-check"> </span>Prestamo Aceptado exitosamente.<a class="volver" href="../vistasnew/ampliarPrestamo.php">OK</a></p>
														</div>
								<?php					
													}else{
								?>
														
														<div class="alert alert-danger">
															<p><span class="icon-cross"> </span>Error al Actualizar el Prestamo.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
														</div>
								<?php		
													}
												}
											}elseif (isset($_POST['btnRAP'])) {
												//------------------------- si el administrador rechaza la solicitud.
												$id_extendLoan=$_POST['id_extendLoan'];
												$why=$_POST['why'];
												$statusWhy=2;
												

												if ($why=="") {
								?>
													
													<div class="alert alert-info">
														<p><span class="icon-remove-user"> </span>Llena por favor el campo requerido.</p><a class="volver" href="javascript:history.go(-3);">Volver</a>
													</div>
								<?php
												}else{
													
													// actualizar el por que del rechazo de la solicitud de ampliar el prestamo
													$updateStatusWhy="UPDATE extendloan SET why_refuse='$why', status='$statusWhy' WHERE id_extendLoan='$id_extendLoan'";
													$ejecut_updateStatusWhy=mysqli_query($conexion,$updateStatusWhy);

													if ($ejecut_updateStatusWhy){
								?>
													<br>
													<div class="alert alert-success">
														<p><span class="icon-check"> </span>Estado de la solicitud Actualizada exitosamente. <br><hr><a class="volver" href="../vistasnew/ampliarPrestamo.php">OK</a></p>
													</div>
								<?php		
													}else{
								?>
													
													<div class="alert alert-danger">
														<p><span class="icon-warning"> </span>Error al Actualizar la solicitud.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
													</div>
								<?php		
													}
												}
											}
								?>
							</div>
						</div>	
					</div>
				</div>
			</div>
			<hr>
    <?php
        }if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) { 
    ?>
		<div class="gtco-section">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-6 animate-box">
				<h3 class="tittle_form1 col-md-12 ">Solicitar nuevo prestamo</h3>
				<?php 
				
										// consultar los Datos de los usuarios 
										$consultaP="SELECT * FROM balance";
										$ejecut_consultaP=mysqli_query($conexion,$consultaP);
				?>
										<table class="tableUserEdit">
											<tr>
												<td class="titleEdit">ID</td>
												<td class="titleEdit">Nombre</td>
												<td class="titleEdit">Contacto</td>
												<td class="titleEdit">Deuda</td>
											</td>
				<?php
										while ($mostrarP=mysqli_fetch_array($ejecut_consultaP)) {

											$saldoTotalNumero=$mostrarP['quantity']+$mostrarP['interests'];
											$saldoTotal=number_format($saldoTotalNumero,0,",",".");
									?>	
										
											<tr>
												<td><?php echo $mostrarP['id_balance']; ?></td>
												<td><?php echo $mostrarP['name']; ?></td>
												<td><?php echo $mostrarP['phone_user']; ?></td>
												<td><?php echo $saldoTotal; ?></td>
												<td><a href="../php/solitAmpliarP.php?id_user=<?php echo $mostrarP['id_user'] ."&id_newuser=" . $mostrarP['id_newuser'];?>"><span style="font-size: 30px;" class="icon-hand"></span></a></td>
											</tr>
									<?php
										}
									?>
										</table>
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
										<td><a href="../php/detalleUserP.php?idUser=<?php echo $mostrar_UD["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}elseif ($mostrar_UD['status'] == 0)  {
										$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
								?>
										<td><?php echo $mostrar_UD["name"];?></td>
								<?php
									}elseif ($mostrar_UD['status'] == 2)  {
										$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idUser=<?php echo $d["id_user"]."&idNewUser=".$mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
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
			<br>
		</div>
    <?php       
        }elseif ($mostrar_usu['id_roll']==3) { 
    ?>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="gtco-section">
							<div class="row form-group text-center">
								<div class="col-md-12">
									<h4 class="col-md-12 ">Fecha: <?php echo dateToday(); ?>.</h4>
								</div>
							</div>
						<h3 class="tittle_form1 col-md-12 ">Saldo Pendiente.</h3>
									<?php 
										$id_user=$mostrar_usu['id_user'];
										$id_newuser=$mostrar_usu['id_newuser'];

										// consultar los pagos
										$consultaP="SELECT * FROM balance WHERE id_user='$id_user' AND id_newuser='$id_newuser' ORDER BY date DESC";
										$ejecut_consultaP=mysqli_query($conexion,$consultaP);
										$mostrarP=mysqli_fetch_array($ejecut_consultaP);

										if ($ejecut_consultaP){
											$objeto_DateTime=date_create($mostrarP['date']);
											$date = date_format($objeto_DateTime, "j/M - h:i a");
											
											$pagoNumero=$mostrarP['quantity'];
											$pago=number_format($pagoNumero,0,",",".");
											
											$interestsNumero=$mostrarP['interests'];
											$interests=number_format($interestsNumero,0,",",".");

											$saldoTotalNumero=$mostrarP['quantity']+$mostrarP['interests'];
											$saldoTotal=number_format($saldoTotalNumero,0,",",".");
									?>	
										<table class="tableUserEdit">
											<tr>
												<td class="titleEdit">Nombre</td>
												<td><?php echo $mostrarP['name']. " &#8212 " . $mostrarP['phone_user']; ?>
											</td>
											<tr>
												<td class="titleEdit">Dirección</td>
												<td><?php echo $mostrarP['address']; ?></td>
											</tr>
											<tr>
												<td class="titleEdit">Monto del pago</td>
												<td><?php echo "$ ".$pago; ?></td>
											</tr>
											<tr>
												<td class="titleEdit">Monto del interes</td>
												<td><?php echo "$ ".$interests; ?></td>
											</tr>
											<tr>
												<td class="titleEdit">Monto total a pagar</td>
												<td><?php echo "$ ".$saldoTotal; ?></td>
											</tr>
											<tr>
												<td class="titleEdit">Fecha de incripción del saldo</td>
												<td><?php echo $date; ?></td>
											</tr>
											<tr>
												<td class="titleEdit">Ampliar prestamo</td>
												<td><a href="../php/solitAmpliarP.php?id_user=<?php echo $mostrarP['id_user'] ."&id_newuser=" . $mostrarP['id_newuser'];?>"><span style="font-size: 30px;" class="icon-hand"></span></a></td>
											</tr>
										</table>
									<?php
										}else {
											header ('location:usuarios.php');
										}
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <?php       
        }if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
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
	
	<?php } include '../includes/footer.php'; ?>
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