<?php 

  include '../php/conexion-bd.php';
  include '../function/funciones.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';

  if($_SESSION['usuario']){
		$nombre=$_SESSION['usuario'];
		if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
		
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Usuarios</title>
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
									<h1 class="animate-box" data-animate-effect="fadeInUp">Crea tus Usuarios</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes crear, ver, editar y eliminar los <em>Cobradores</em> y los <em>Deudores</em></h2>
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
					<h3 class="tittle_form1">Formulario para crear Cobradores o Deudores</h3>
					<p>¡Recuerda llenar bien todos los campos!</p>
					<form action="#" method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="name" name="name" class="form-control" placeholder="Nombre y Apellido">
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="email" name="email" class="form-control" placeholder="Correo para iniciar sesión">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="pass" name="pass" class="form-control" placeholder="Contraseña">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<select class="form-control" name="tipoUser" id="tipoUser">
									<option value="1">Administrador</option>
									<option value="2">Cobrador</option>
									<option value="3">Deudor</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="btnRegistrar" value="Registrar Usuario" class="btn btn-success btn-lg">
						</div>
					</form>		
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
							<!-- Validación si existe un usuario o no -->
							<?php 
							if (isset($_POST['btnRegistrar'])) {
								$name=$_POST['name'];
								$email=$_POST['email'];
								$pass=$_POST['pass'];
								$tipoUser=$_POST['tipoUser'];
								if ($name=="" || $email=="" || $pass=="" || $tipoUser=="") {
							?>
								<p class="mes_false"><span class="icon-warning"> </span>¡Recuerda llenar todos los campos!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
								}else{	

									$validarUsuario="SELECT * FROM inicio WHERE email='$email'";
									$ejecut_validarU=mysqli_query($conexion,$validarUsuario);
									$row=mysqli_num_rows($ejecut_validarU);

									if ($row==1) {
							?>
										<p class="mes_false"><span class="icon-remove-user"> </span>Correo o usuario existente.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
									}else{
										$insertU="INSERT INTO inicio(name,email,pass,id_roll) VALUES('$name','$email','$pass','$tipoUser')";
										$ejecut_insertU=mysqli_query($conexion,$insertU);
										
										if ($ejecut_insertU) {
							?>
										<p class="mes_true"><span class="icon-check"> </span>Usuario Creado exitosamente.</p>
							<?php		
										}else{
							?>
										<p class="mes_false"><span class="icon-warning"> </span>Error al crear el usuario.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
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
		
	<?php
		}elseif ($mostrar_usu['id_roll']==2) {
	?>
			<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
				<div class="overlay"></div>
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc">
									<h1 class="animate-box" data-animate-effect="fadeInUp">Usuarios</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver todos los <em>Cobradores</em> y también los <em>Deudores</em></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
	<?php 
		}
	?>
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

						<div class="table-responsive-xl"> 
					
							<table id="tbListaPrecios" class="table table-striped text-white">
								<thead class="thead-dark text-center">
									<tr>
										<th scope="col">Nombre</th>
										<th scope="col">Rol</th>
										<th scope="col">Estado</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php
										consultarUsuariosLista(3);
									?>
								</tbody>
							</table>
						</div>
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
				header("location:../index.php");
			}
        }else{
                header("location:../index.php");
        }
?>