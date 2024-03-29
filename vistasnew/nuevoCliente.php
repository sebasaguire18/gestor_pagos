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
  <title>Nuevo Usuario</title>
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
									<h1 class="animate-box" data-animate-effect="fadeInUp">Solicitar Nuevos Usuarios</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes crear solicitudes para nuevos <em>Deudores</em></h2>
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
					<h3 class="tittle_form1">Solicitar nuevo Deudor</h3>
					<p>¡Recuerda llenar bien todos los campos!</p>
					<form action="#" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="name" name="name" class="form-control" placeholder="Nombre y Apellido">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="nitUser" name="nitUser" class="form-control" placeholder="Identificación">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="address" name="address" class="form-control" placeholder="Dirección del Usuario">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<select class="form-control" name="city_usu" id="city_usu">
									<option value="0">Seleccionar Ciudad...</option>
									<?php consultarCiudadesSelect(1); ?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="phoneUser" name="phoneUser" class="form-control" placeholder="Número de contacto">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<select class="form-control" name="fiadorUser" id="fiadorUser">
									<option value="0">Sin fiador</option>
									<?php consultarUsuariosSelect(1); ?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="quantity" name="quantity" class="form-control" placeholder="Cantidad de dinero a solicitar sin puntos (.) ni comas (,)">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<select class="form-control" name="tipo_cred" id="tipo_cred">
									<option value="0">Seleccionar Tipo Pago...</option>
									<?php consultarTipoPagosSelect(1); ?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="cuotas_cred" name="cuotas_cred" class="form-control" placeholder="Cuotas">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="nota_cred" name="nota_cred" class="form-control" placeholder="Nota adicional">
							</div>
						</div>
						<div class="form-group dp-flex jfy-ctn-center">
							<input type="submit" name="btnSolicitarCred" value="Solicitar Usuario" class="btn btn-success btn-lg">
						</div>
					</form>		
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
							<!-- Validación si existe un usuario o no -->
							<?php 
							if (isset($_POST['btnSolicitarCred'])) {
								$name=$_POST['name'];
								$nitUser=$_POST['nitUser'];
								$address=$_POST['address'];
								$city_usu=$_POST['city_usu'];
								$phoneUser=$_POST['phoneUser'];
								$fiadorUser=$_POST['fiadorUser'];
								$quantity=$_POST['quantity'];
								$tipo_cred=$_POST['tipo_cred'];
								$cuotas_cred=$_POST['cuotas_cred'];
								$nota_cred=$_POST['nota_cred'];

								
								if ($name=="" || $nitUser=="" || $address=="" || $city_usu=="" || $phoneUser=="" || $fiadorUser=="" || $quantity=="" || $tipo_cred=="" || $cuotas_cred=="") {
							?>
								<div class="alert alert-danger text-center">
									<p><span class="icon-warning"> </span>¡Recuerda llenar todos los campos!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
                                </div>
							<?php
								}else{	
									// Validar si el usuario existe por su número de identificación y esta en estado pendiente
									$validarUsuarioD="SELECT * FROM new_user WHERE nit_user='$nitUser' AND status = 0";
									$ejecut_validarUD=mysqli_query($conexion,$validarUsuarioD);
									$row=mysqli_num_rows($ejecut_validarUD);

									// Validar si el usuario existe por su número de identificación y esta en estado rechazada y,
									// con esto solo cambiar el monto o fiador o cuotas.
									$validarUsuarioD2="SELECT * FROM new_user WHERE nit_user='$nitUser' AND status = 2";
									$ejecut_validarUD2=mysqli_query($conexion,$validarUsuarioD2);
									$filaValid=mysqli_num_rows($ejecut_validarUD2);

									if ($row==1) {
							?>
										<div class="alert alert-danger text-center">
											<p><span class="icon-remove-user"> </span>usuario existente o solicitud pendiente.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
										</div>
							<?php
									}elseif($filaValid == 1){
										$actualizarSolicitud = mysqli_query($conexion,"UPDATE new_user SET fiador = '$fiadorUser', quantity = '$quantity', tipo_credito = '$tipo_cred', cuotas_credito = '$cuotas_cred', nota = '$nota_cred', date = NOW(), status = 0 WHERE nit_user = '$nitUser'");
										
										if ($actualizarSolicitud) {
							?>
										<div class="alert alert-success text-center">
											<p><span class="icon-check"> </span>Usuario solicitado nuevamente exitosamente.</p>
										</div>
							<?php		
										}else{
							?>
										<div class="alert alert-danger text-center">
											<p><span class="icon-warning"> </span>Error al solicitar el usuario nuevamente.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
										</div>
							<?php		
										}

									}else{
										// insertar usuario Deudor
										
										$idNewUser = uniqid();

										$insertUD="INSERT INTO new_user(id_newuser,name,nit_user,address,city,phone_user,fiador,quantity,tipo_credito,cuotas_credito,nota) VALUES('$idNewUser','$name','$nitUser','$address','$city_usu','$phoneUser','$fiadorUser','$quantity','$tipo_cred','$cuotas_cred','$nota_cred')";
										$ejecut_insertUD=mysqli_query($conexion,$insertUD);
										
										if ($ejecut_insertUD) {
							?>
										<div class="alert alert-success text-center">
											<p><span class="icon-check"> </span>Usuario solicitado exitosamente.</p>
										</div>
							<?php		
										}else{
							?>
										<div class="alert alert-danger text-center">
											<p><span class="icon-warning"></span>Error al solicitar el usuario.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
										</div>
							<?php		
										}
									}
								}
							}
							?>
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