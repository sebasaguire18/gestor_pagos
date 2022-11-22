<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';	
  include '../function/select_notifications.php';

  if($_SESSION['usuario']){
				$nombre=$_SESSION['usuario'];
		if ($_GET['id_user']) {
			$id_userEdit=$_GET['id_user'];
				// consultar y traer los datos del usuario a editar
				$consultUserEdit="SELECT * FROM inicio WHERE id_user='$id_userEdit'";
				$ejecut_consultaUserEdit=mysqli_query($conexion,$consultUserEdit);
				$mostrar_UserEdit=mysqli_fetch_Array($ejecut_consultaUserEdit);
				$verifUsuario=mysqli_num_rows($ejecut_consultaUserEdit);
			if ($verifUsuario){
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Usuarios</title>
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
  	<?php 
		if ($mostrar_usu['id_roll']==1) {
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc">
									<h1 class="animate-box" data-animate-effect="fadeInUp">Edita tus Usuarios</h1>
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
					<h3 class="tittle_form1">Formulario para editar Usuarios</h3>
					<p>¡Recuerda que ningún campo puede quedar en blanco!</p>
					<form action="#" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="name" name="name" class="form-control" Value="<?php echo $mostrar_UserEdit['name']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" name="email" class="form-control" Value="<?php echo $mostrar_UserEdit['email']; ?>">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<select class="form-control" name="status" id="status">
                                    <option value="2">Seleccionar Estado...</option>
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
                        </div>
						<input type="hidden" name="id_userE" value="<?php echo $mostrar_UserEdit['id_user']; ?>">
						<div class="form-group">
							<input type="submit" name="btnEditar" value="Editar Usuario" class="btn btn-success btn-outline btn-lg">
                            <input type="submit" name="btnEliminar" value="Eliminar Usuario" class="btn btn-danger btn-outline btn-lg">
						</div>
					</form>		
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
                            <h3>Validación de Datos</h3>
                            <table class="tableUserEdit">
                                <tr>
                                    <td class="titleEdit">Nombre</td>
                                    <td class="titleEdit">Email</td>
                                    <td class="titleEdit">Tipo de Usuario</td>
                                    <td class="titleEdit">Estado</td>
                                </tr>
                                <tr>
                                    <td class=""><?php echo $mostrar_UserEdit['name']; ?></td>
                                    <td class=""><?php echo $mostrar_UserEdit['email']; ?></td>
                                    
                                <?php
                                    if ($mostrar_UserEdit['id_roll']==1) {
                                        $tipo_userEdit='Administrador';
                                    }elseif ($mostrar_UserEdit['id_roll']==2) {
                                        $tipo_userEdit='Cobrador';
                                    }elseif ($mostrar_UserEdit['id_roll']==3) {
                                        $tipo_userEdit='Deudor';
                                    }if ($mostrar_UserEdit['status'] == 1) {
                                        $statusUserEdit='<td class="tdactive"><span class="icon-check"></span></td>';
                                    }elseif ($mostrar_UserEdit['status'] == 0)  {
                                        $statusUserEdit='<td class="tdinactive"><span class="icon-cross"></span></td>';
                                    }
                                ?>
                                    <td class=""><?php echo $tipo_userEdit; ?></td>
                                    <?php echo $statusUserEdit; ?>
                                </tr>
                            </table>

                            <?php 
    //------------------------------------------------ Validación si la edición fué correcta -----------------------------------------------//
							if (isset($_POST['btnEditar'])) {
								$name=$_POST['name'];
								$email=$_POST['email'];
								$status=$_POST['status'];
								if ($name=="" || $email=="" || $status=="") {
							?>
								<p class="mes_false"><span class="icon-warning"> </span>¡Recuerda llenar todos los campos!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
								}else{	
										// consultar y traer los datos para validar el estado en este momento
										$consultUserE="SELECT * FROM inicio WHERE id_user='$id_userEdit'";
										$ejecut_consultaUserE=mysqli_query($conexion,$consultUserE);
										$mostrar_UserE=mysqli_fetch_Array($ejecut_consultaUserE);
                                    if($status==2){
                                        $status=$mostrar_UserE['status'];
                                    }
                                    $updateUser="UPDATE inicio SET name='$name', email='$email', status='$status' WHERE id_user='$id_userEdit'";
                                    $ejecut_updateUser=mysqli_query($conexion,$updateUser);

									if (!$ejecut_updateUser) {
							?>
										<p class="mes_false"><span class="icon-remove-user"> </span>Error al modificar el usuario.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
									}else{
							?>
										<p class="mes_true"><span class="icon-check"> </span>Usuario modificado exitosamente.</p>
										<p>¡Recuerda recargar la página para visualizar los cambios!</p>
										<a class="volver" href="">Recargar</a>
							<?php		
										}
									}
								}
    //------------------------------------------------ Si oprimen el botón de eliminar ------------------------------------------------// 
                            if (isset($_POST['btnEliminar'])) {
								$id_userE=$_POST['id_userE'];
								
								if ($id_userE==null || $id_userE=="") {
							?>
								<p class="mes_false"><span class="icon-warning"> </span>¡Error al Eliminar el Usuario!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
								}else{	

									$validarUser="SELECT * FROM inicio WHERE id_user='$id_userE'";
									$ejecut_validarUser=mysqli_query($conexion,$validarUser);
									$filas_vU=mysqli_num_rows($ejecut_validarUser);
									

									if ($filas_vU==0) {
							?>
										<p class="mes_false"><span class="icon-remove-user"> </span>¡El Usuario ya fue eliminado o hubo algún error!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
									}else{
										$deletUser="DELETE FROM inicio WHERE id_user='$id_userE'";
										$ejecut_deletUser=mysqli_query($conexion,$deletUser);
										
										if ($ejecut_deletUser) {
							?>
										<p class="mes_true"><span class="icon-check"> </span>Usuario Eliminado exitosamente.</p>
										<a class="volver" href="../vistasnew/usuarios.php">Ok.</a>
							<?php		
										}else{
							?>
										<p class="mes_false"><span class="icon-warning"> </span>Error al eliminar el usuario.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php		
										}
									}
								}
                            }
							?>

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
								<td><a href="?id_user=<?php echo $mostrar_UE['id_user'];?>"><span class="icon-creative-commons-share"></span></a></td>
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
				}else {
					header ('location:../vistasnew/usuarios.php');
				}
			}else {
				header ('location:../vistasnew/usuarios.php');
			}
        }else{
                header("location:../index.php");
        }
?>