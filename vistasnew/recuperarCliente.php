<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';
  include '../function/funciones.php';
  include '../php/mostrarfecha.php';

  if($_SESSION['usuario']){
        $nombre=$_SESSION['usuario'];
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recuperar Cliente</title>
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
						  <h1 class="animate-box" data-animate-effect="fadeInUp">Recuperar cliente</h1>
						  <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes <em>Solicitar Recuperar cliente en saldo cero.</em></h2>
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
							$consultaUN = mysqli_query($conexion,"SELECT * FROM extendloan WHERE id_extendLoan='$id_extendLoan'");
							$mostrar_UN = mysqli_fetch_Array($consultaUN);
							$verifConsultUN = mysqli_num_rows($consultaUN);

							$id_newuserB = $mostrar_UN['id_newuser'];

							// para poder traer los datos del usuario
							$consultarUAPP = mysqli_query($conexion,"SELECT * FROM balance WHERE id_newuser='$id_newuserB'");
							$mostrar_UAPP = mysqli_fetch_array($consultarUAPP);

							// Para cambiar el formato de fecha
							$date = formatoAFecha($mostrar_UN['date'],1);

							// Para cambiar el formato de los precios
							$quantityP=formatoAPrecio($mostrar_UN['quantityP']);
							
                			$quantityLoan=formatoAPrecio($mostrar_UN['quantityLoan']);

							if ($verifConsultUN==0) {
					?>
								<p class="mes_false"><span class="icon-remove-user"> </span>Correo o usuario no existente o hubo un error.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
					<?php
							}else{
					?>	
							<form action="#" method="POST">
								<div class="row form-group">
									<div class="col-md-12">
										<label for="id_newuser">ID de la Solicitud:</label>
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
										<input type="text" disabled name="quantity" class="form-control" value="<?php echo $quantityP; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cantidad que el Usuario requiere:</label>
										<input type="text" disabled name="quantity" class="form-control" value="<?php echo $quantityLoan; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cupo actual:</label>
										<input type="text" disabled name="quantity" class="form-control" value="<?php echo formatoAPrecio($mostrar_UAPP['b_quantity']); ?>">
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
						<h3 class="tittle_form1"><?php echo $solicitudesRC;if ($solicitudesRC=1) {echo " Solicitud pendiente";}else {echo " Solicitudes pendientes";}?> por revisar.</h3>
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

		<!-- ----------------------------------------------Mostrar los datos de la tabla extendloan en una tabla solo de los usuarios para recuperar crédito----------------------------------------------- -->


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
								// consultar los usuarios existentes deudores UsuarioDeudor enla tabla de ampliar prestamo extendloan solo para recuperar crédito
									$consultaUD="SELECT * FROM extendloan WHERE razon_solicitud = 103";
									$ejecut_consultaUD=mysqli_query($conexion,$consultaUD);
									
									while($mostrar_UD=mysqli_fetch_Array($ejecut_consultaUD)){
								?>
									<tr>
										<td><?php echo $mostrar_UD['id_extendLoan'];?></td>
								<?php
									if ($mostrar_UD['status'] == 1) {
										$status='<td class="tdactive"><span class="icon-check"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idNewUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}elseif ($mostrar_UD['status'] == 0)  {
										$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
								?>
										<td><?php echo $mostrar_UD["name"];?></td>
								<?php
									}elseif ($mostrar_UD['status'] == 2)  {
										$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idNewUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
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
										<div class="alert alert-danger mgt-6 text-center">
											<p><span class="icon-warning"></span>Favor menciona el ¿Porqué? has rechazado la solicitud.</p>
											<hr>
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
										</div>
								<?php
										}elseif ($status==1) {
											?>		
											
											<div class="alert alert-warning mgt-6 text-center">
												<p><span class="icon-warning"></span> ¿Confirmas Aceptar la Solicitud?</p>
												<hr>
												<form action="#" method="POST">
													<input type="hidden" name="id_extendLoan" value="<?php echo $id_extendLoan; ?>">
													<div class="form-group">
														<input type="submit" name="btnAceptar" value="Confirmar Solicitud" class="btn btn-success btn-outline btn-lg">
														<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
													</div>
												</form>
											</div>
								<?php		
											
										}elseif ($status==0) {
								?>
								
												<div class="alert alert-info">
													<p>El usuario no se modificó y sigue con el estado actual.</p>
													<div class="row form-group">
														<a href="recuperarCliente.php" class="btn btn-success btn-outline btn-lg">Vale</a>
														<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
													</div>
												</div>
								<?php
										}

									}
										// ---------------------  guardo datos en inicio del usuario SI el administrador aprueba la solicitud.
											if (isset($_POST['btnAceptar'])) {
												$id_extendLoan = $_POST['id_extendLoan'];
												$statusN = 1;

												$validarUsuario = mysqli_query($conexion,"SELECT * FROM extendloan WHERE id_extendLoan='$id_extendLoan'");
												$mostrar_UEL = mysqli_fetch_array($validarUsuario);

												$id_newuserE = $mostrar_UEL['id_newuser'];

												$row = mysqli_num_rows($validarUsuario);
												
												if ($row == 0) {
								?>
													<div class="alert alert-danger">
														<p><span class="icon-remove-user"> </span>La solicitud ha sido borrada o hubo algún fallo.</p><a class="volver" href="javascript:history.go(-3);">Volver</a>
													</div>
								<?php
												}else{
													
													// para poder traer los datos del usuario
													$consultarAP = mysqli_query($conexion,"SELECT * FROM balance WHERE id_newuser='$id_newuserE'");
													$mostrar_CAP = mysqli_fetch_array($consultarAP);

													$id_userRegis=$mostrar_usu['id_user'];
													$formaP = 'Efectivo';                                                    
													$quantityRes = $mostrar_CAP['total_quantity'];
													$cupo = $mostrar_CAP['b_quantity'];
													$cantidadActualizacion = $mostrar_CAP['quantity_u']+1;

													
													$cupoAP = $mostrar_UEL['quantityLoan'];
													$interests_AP = $cupoAP*0.2;

													$quantity_u = $cupoAP+$interests_AP;

													$razon_solicitud = $mostrar_UEL['razon_solicitud'];													

													if ($quantityRes > $cupoAP) {
														echo '
															<div class="alert alert-danger text-center">
																<p><span class="icon-warning"> </span>El monto que debe es mayor al nuevo cupo solicitado. </p> <a href="javascript:history.go(-1)"> <br> Vale.</a>
															</div>    
															';
													}else {

														// Restarle a la deuda y setear todo de nuevo //
                                                        // actualizar el nuevo prestamo (Ampliar Nuevo Prestamo) en la tabla balance
                                                        $updateStatusANP = "UPDATE balance SET b_quantity='$cupoAP', interests='$interests_AP', total_quantity='$quantity_u', update_q = '$cupo', quantity_u = '$cantidadActualizacion', date_renov = NOW() WHERE id_newuser='$id_newuserE'";
                                                        $ejecut_updateStatusANP = mysqli_query($conexion,$updateStatusANP);


                                                        if ($ejecut_updateStatusANP) {	
                                                            
                                                            // actualizar el estado de la solicitud
                                                            $updateStatusEL = mysqli_query($conexion,"UPDATE extendloan SET status='$statusN' WHERE id_extendLoan='$id_extendLoan'");

                                                            ?>
                                                            <div class="alert alert-success text-center mgt-6">
                                                                <p><span class="icon-check"> </span>Prestamo Aceptado exitosamente, datos actualizados.</p>
                                                                <br>
                                                                <a class="volver" href="../vistasnew/recuperarCliente.php">OK</a>
                                                            </div>
                                                            <?php					
                                                        }else{
                                                            ?>
                                                            <div class="alert alert-danger">
                                                                <p><span class="icon-cross"> </span>Error al Actualizar el Prestamo. error002.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
                                                            </div>
                                                            <?php		
                                                        }
													}
												}
											}elseif (isset($_POST['btnRAP'])) {
												//------------------------- si el administrador rechaza la solicitud de ampliar prestamo.
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
														<p><span class="icon-check"> </span>Estado de la solicitud Actualizada exitosamente. <br><hr><a class="volver" href="../vistasnew/recuperarCliente.php">OK</a></p>
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
										$consultaP="SELECT * FROM balance WHERE status = 1 AND total_quantity = 0";
										$ejecut_consultaP=mysqli_query($conexion,$consultaP);
				?>
									<div class="table-responsive-xl"> 
										<table class="table table-striped text-white tableUserAmpliarPrestamo">
											<thead class="thead-dark text-center">
												<tr>
													<td class="titleEdit">Identificación</td>
													<td class="titleEdit">Nombre</td>
													<td class="titleEdit">Contacto</td>
													<td class="titleEdit">Cupo</td>
													<td class="titleEdit">Deuda</td>
													<td class="titleEdit">Acción</td>
												</tr>
											</thead>
				<?php
										while ($mostrarP=mysqli_fetch_array($ejecut_consultaP)) {

									?>	
											
											<tr>
												<td><?php echo $mostrarP['nit_user']; ?></td>
												<td><?php echo $mostrarP['name']; ?></td>
												<td><?php echo $mostrarP['phone_user']; ?></td>
												<td><?php echo formatoAPrecio($mostrarP['b_quantity']); ?></td>
												<td><?php echo formatoAPrecio($mostrarP['total_quantity']); ?></td>
												<td>
													<a title="Recuperar Crédito" href="../php/solitAmpliarP.php?accion=103&id_newuser=<?php echo $mostrarP['id_newuser'];?>"><span style="font-size: 30px;" class="icon-plus"></span></a>
												</td>
											</tr>
									<?php
										}
									?>
										</table>
									</div>
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
									$consultaUD="SELECT * FROM extendloan WHERE razon_solicitud = 103";
									$ejecut_consultaUD=mysqli_query($conexion,$consultaUD);
									
									while($mostrar_UD=mysqli_fetch_Array($ejecut_consultaUD)){
								?>
									<tr>
										<td><?php echo $mostrar_UD['id_extendLoan'];?></td>
								<?php
									if ($mostrar_UD['status'] == 1) {
										$status='<td class="tdactive"><span class="icon-check"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idNewUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
								<?php
									}elseif ($mostrar_UD['status'] == 0)  {
										$status='<td style="background: rgba(255, 235, 53, 0.6);"><span class="icon-warning"></span></td>';
								?>
										<td><?php echo $mostrar_UD["name"];?></td>
								<?php
									}elseif ($mostrar_UD['status'] == 2)  {
										$status='<td class="tdinactive"><span class="icon-cross"></span></td>';
								?>
										<td><a href="../php/detalleUserP.php?idNewUser=<?php echo $mostrar_UD["id_newuser"];?>"><?php echo $mostrar_UD["name"];?></a></td>
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