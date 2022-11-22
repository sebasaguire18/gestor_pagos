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
  <title>Solicitudes</title>
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
									<h1 class="animate-box" data-animate-effect="fadeInUp">Solicitudes</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes habilitar, ver y rechazar las <em>solicitudes</em></h2>
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
					<h3 class="tittle_form1"><?php echo $solicitudes;if ($solicitudes=1) {echo " Solicitud pendiente";}else {echo " Solicitudes pendientes";}?> por revisar.</h3>
					<p>¡Recuerda verificar bien todos los campos!</p>
					<hr>
					<?php
						if (isset($_POST['btnHabilitarU'])) {
							$UserEdit=$_POST['UserEdit'];

							// traer datos del usuario nuevo de la tabla new_user
							$consultaUN="SELECT * FROM new_user WHERE id_newuser = '$UserEdit'";
							$ejecut_consultaUN=mysqli_query($conexion,$consultaUN);
							$mostrar_UN=mysqli_fetch_Array($ejecut_consultaUN);
							$verifConsultUN=mysqli_num_rows($ejecut_consultaUN);


							// Para cambiar el formato de fecha
							$dateDatabase=date_create($mostrar_UN['date']);
							$date = date_format($dateDatabase, "d/F/Y - h:i a");

							if ($verifConsultUN==0) {
					?>
								<hr>
								<div class="alert alert-danger text-center">
									<p><span class="icon-remove-user"> </span>Correo o usuario no existente o hubo un error.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
								</div>
					<?php
							}else{
					?>	
							<form action="#" method="POST">
								<div class="row form-group">
									<div class="col-md-12">
										<label for="id_newuser">ID del Usuario Nuevo:</label>
										<input type="text" disabled id="id_newuser" class="form-control" value="<?php echo $mostrar_UN['id_newuser']; ?>">
									</div>
								</div>
								<input type="hidden" name="id_newuser" value="<?php echo $mostrar_UN['id_newuser']; ?>">
								<input type="hidden" name="name" value="<?php echo $mostrar_UN['name']; ?>">
								<div class="row form-group">
									<div class="col-md-12">
										<label for="name">Nombre:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['name']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Identificación del Usuario:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['nit_user']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="address">Dirección:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['address']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="address">Ciudad:</label>
										<input type="text" disabled class="form-control" value="<?php consultarNombreCiudad($mostrar_UN['city']); ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Télefono del Usuario:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['phone_user']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Fiador:</label>
										<input type="text" disabled class="form-control" value="<?php consultarNombreUsuario($mostrar_UN['fiador']); ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cantidad que el Usuario requiere:</label>
										<input type="text" disabled class="form-control" value="$ <?php echo formatoAPrecio($mostrar_UN['quantity']); ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Tipo de crédito:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['tipo_credito']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Cantidad de cuotas:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['cuotas_credito']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Nota:</label>
										<input type="text" disabled class="form-control" value="<?php echo $mostrar_UN['nota']; ?>">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<label for="nit_user">Fecha solicitud:</label>
										<input type="text" disabled class="form-control" value="<?php echo $date; ?>">
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
									<input type="submit" name="btnUserNew" value="Enviar respuesta" class="btn btn-success btn-outline btn-lg">
									<a href="javascript:history.go(-1);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
								</div>
							</form>
					<?php
							}
						}else {
					?>
						<form action="#" method="POST">
							<div class="row form-group">
								<div class="col-md-12">
									<label for="UserEdit">Usuarios Pendientes:</label>
									<select class="form-control" name="UserEdit" id="UserEdit">
										<option value="0">Seleccionar...</option>
									<?php
										$consultaUD="SELECT * FROM new_user WHERE status = 0";
										$ejecut_consultaUD=mysqli_query($conexion,$consultaUD);
										while($mostrar_UD=mysqli_fetch_Array($ejecut_consultaUD)){
									?>
										<option value="<?php echo $mostrar_UD['id_newuser'];?>"><?php echo $mostrar_UD['nit_user'].' - '.$mostrar_UD['name'];?></option>
									<?php		
										}
									?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="btnHabilitarU" value="Traer datos del usuario" class="btn btn-success btn-outline btn-lg">
							</div>
						</form>
					<?php
						}
					?>		
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
								<?php
									if (isset($_POST['btnUserNew'])){
										$id_newuser=$_POST['id_newuser'];
										$name=$_POST['name'];
										$status=$_POST['status'];
										if ($status==2) {
								?>		
										<hr>
										<div class="alert alert-warning text-center">
											<p>Favor menciona el ¿Porqué? has rechazado la solicitud.</p>
										</div>
										<form action="#" method="POST">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="name">La razón es:</label>
													<input type="text" id="why" name="why" class="form-control" placeholder="Éste es un porque!">
												</div>
											</div>
											<input type="hidden" name="id_newuser" value="<?php echo $id_newuser; ?>">
											<div class="form-group">
												<input type="submit" name="btnRUN" value="Enviar Reporte" class="btn btn-success btn-outline btn-lg">
												<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
											</div>
										</form>
								<?php
										}elseif ($status==1) {
											?>		
											<hr>
											<div class="alert alert-warning text-center">
												<p>¿Deseas aprobar y habilitar el usuario?</p>
											</div>
											<form action="#" method="POST">
												<input type="hidden" name="id_newuser" value="<?php echo $id_newuser; ?>">
												
												<div class="row form-group">
													<div class="col-md-12">
														<label for="name">El nombre será:</label>
														<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
													</div>
												</div>
												<div class="form-group">
													<input type="submit" name="btnReisUserNew" value="Aprobar y registrar" class="btn btn-success btn-outline btn-lg">
													<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
												</div>
											</form>
								<?php		
											
										}elseif ($status==0) {
								?>
											<hr>
											<div class="alert alert-warning text-center">
												<p>El usuario no se modificó y sigue con el estado actual.</p>
											</div>
											<form action="#" method="POST">
												<div class="form-group">
													<input type="submit" name="btnDejarIgual" value="Cargar las nuevas solicitudes" class="btn btn-success btn-outline btn-lg">
													<a href="javascript:history.go(-2);" class="btn btn-warning btn-outline btn-lg">Retroceder</a>
												</div>
											</form>
								<?php
										}

									}
										// ---------------------  guardo datos del usuario Sí el administrador aprueba la solicitud.
											if (isset($_POST['btnReisUserNew'])) {
												$id_newuser=$_POST['id_newuser'];
												$name=$_POST['name'];
												$tipoUser=3;
												$statusN=1;

												
												// actualizar el estado del usuario nuevo o new user
												$updateStatusNU="UPDATE new_user SET status='$statusN' WHERE id_newuser='$id_newuser'";
												$ejecut_updateStatusNU=mysqli_query($conexion,$updateStatusNU);


												if ($ejecut_updateStatusNU) {
													// consultar datos en la tabla de newuser los datos del usuario nuevo
													$consultaUN="SELECT * FROM new_user WHERE id_newuser='$id_newuser'";
													$ejecut_consultaUN=mysqli_query($conexion,$consultaUN);
													$mostrar_UN=mysqli_fetch_Array($ejecut_consultaUN);
											
													// consultar el id del usuario en la tabla de balance (Saldo) para ver si ya está insertado
													$consultaIUI="SELECT * FROM balance WHERE id_newuser='$id_newuser'";
													$ejecut_consultaIUI=mysqli_query($conexion,$consultaIUI);
													$validarUB=mysqli_num_rows($ejecut_consultaIUI);

													if ($validarUB == 0) {
													
														// datos
														$idBalance = uniqid();
														$address=$mostrar_UN['address'];
														$nitUser=$mostrar_UN['nit_user'];
														$phoneUser=$mostrar_UN['phone_user'];
														$quantity=$mostrar_UN['quantity'];	
														$interests=$quantity*0.2;
														$total_quantity=$quantity+$interests;
													
														// insertar el saldo a prestar del usuario
														$insertSU="INSERT INTO balance(id_balance,id_newuser,name,address,nit_user,phone_user,quantity,interests,total_quantity) VALUES('$idBalance','$id_newuser','$name','$address','$nitUser','$phoneUser','$quantity','$interests','$total_quantity')";
														$ejecut_insertSU=mysqli_query($conexion,$insertSU);
														
														if ($ejecut_insertSU) {
														
								?>
															<hr>
															<div class="alert alert-success text-center">
																<p><span class="icon-check"> </span>Usuario Creado exitosamente.</p><a class="volver" href="../vistasnew/solicitudes.php">OK</a>
															</div>
								<?php					
														}else{
								?>
															<hr>
															<div class="alert alert-danger text-center">
																<p><span class="icon-warning"> </span>Error al crear el usuario.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
															</div>
								<?php		
														}
													}else{
								?>
														<hr>
														<div class="alert alert-danger text-center">
															<p><span class="icon-remove-user"> </span>Correo o usuario existente.</p><a class="volver" href="javascript:history.go(-3);">Volver</a>
														</div>
								<?php	
													}
												}else{
								?>
													<hr>
													<div class="alert alert-danger text-center">
														<p><span class="icon-warning"> </span>Error al crear el usuario.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
													</div>
								<?php	 	
												}
											}elseif (isset($_POST['btnRUN'])) {
												//------------------------- si el administrador rechaza la solicitud.
												$id_newuser=$_POST['id_newuser'];
												$why=$_POST['why'];
												$statusWhy=2;
												

												if ($why=="") {
								?>
													<hr>
													<div class="alert alert-success text-center">
														<p><span class="icon-remove-user"> </span>Llena por favor el campo requerido.</p><a class="volver" href="javascript:history.go(-3);">Volver</a>
													</div>
								<?php
												}else{
													
													// actualizar el por que del usuario nuevo o new user
													$updateStatusWhy="UPDATE new_user SET why_refuse='$why', status='$statusWhy' WHERE id_newuser='$id_newuser'";
													$ejecut_updateStatusWhy=mysqli_query($conexion,$updateStatusWhy);

													if ($ejecut_updateStatusWhy){
								?>
													<hr>
													<div class="alert alert-success text-center">
														<p><span class="icon-check"></span>Estado del usuario Actualizado exitosamente.<a class="volver" href="../vistasnew/solicitudes.php">OK</a></p>
													</div>
													
								<?php		
													}else{
								?>
													<hr>
													<div class="alert alert-danger text-center">
														<p><span class="icon-warning"> </span>Error al crear el usuario.</p><a class="volver" href="javascript:history.go(-2);">Volver</a>
													</div>
								<?php		
													}
												}
											}
								?>
							<table class="tableUserEdit">
								<tr>
									<td class="titleEdit">id</td>
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
										<td><?php echo $mostrar_UD['id_newuser'];?></td>
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