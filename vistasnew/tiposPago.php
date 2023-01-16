<?php 

  include '../php/conexion-bd.php';
  include '../function/funciones.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';

  if($_SESSION['usuario']){
		$nombre=$_SESSION['usuario'];
		if ($mostrar_usu['id_roll']==1) {
		
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tipos Pago</title>
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
								<h1 class="animate-box" data-animate-effect="fadeInUp">Crea tus tipos de pago aquí</h1>
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
					<h3 class="tittle_form1">Formulario para crear diferemtes tipos de pago</h3>
					<p>¡Recuerda llenar bien todos los campos!</p>
					<form method="POST">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" id="nameTipoPago" name="nameTipoPago" class="form-control" placeholder="Nombre del tipo de pago">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="btnRegistrarTipoPago" value="Registrar Tipo Pago" class="btn btn-success btn-lg">
						</div>
					</form>		
				</div>
					<div class="col-md-5 col-md-push-1 animate-box">
						<div class="gtco-contact-info">
							<h3>Validación de Datos</h3>
							<?php 
							if (isset($_POST['btnRegistrarTipoPago'])) {
								$nameTipoPago=$_POST['nameTipoPago'];
								if ($nameTipoPago=="") {
							?>
								<p class="mes_false"><span class="icon-warning"> </span>¡Recuerda llenar todos los campos!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
								}else{	

									$validarCiudad="SELECT * FROM citys WHERE city_name='$nameTipoPago'";
									$ejecut_validarC=mysqli_query($conexion,$validarCiudad);
									$row=mysqli_num_rows($ejecut_validarC);

									$idCityNew = uniqid();

									if ($row==1) {
							?>
										<p class="mes_false"><span class="icon-remove-user"> </span>Ciudad existente.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
							<?php
									}else{
										$insertCiudad="INSERT INTO citys(city_id,city_name) VALUES('$idCityNew','$nameTipoPago')";
										$ejecut_insertCiudad=mysqli_query($conexion,$insertCiudad);
										
										if ($ejecut_insertCiudad) {
							?>
										<p class="mes_true"><span class="icon-check"> </span>Ciudad Creada exitosamente.</p>
							<?php		
										}else{
							?>
										<p class="mes_false"><span class="icon-warning"> </span>Error al crear la Ciudad.</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
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

						<div class="table-responsive-xl"> 
							<table id="tbTipoPagos" class="table table-striped text-white">
								<thead class="thead-dark text-center">
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nombre</th>
										<th scope="col">Estado</th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody class="text-center">
									<?php
										consultarTipoPagosLista(3);
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