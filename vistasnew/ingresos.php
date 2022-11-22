<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';
  include '../php/mostrarfecha.php';

  if($_SESSION['usuario']){
		$nombre=$_SESSION['usuario'];
		
	if ($mostrar_usu['id_roll']==1) {
?>
<!DOCTYPE HTML>
<html>
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ingresos</title>
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
									<h1 class="animate-box" data-animate-effect="fadeInUp">Pagos</h1>
									<h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver todos los <em>Detalles</em>, <em>Fechas</em> y más de <?php if($mostrar_usu['id_roll']==3){ echo "tus pagos."; }else{echo "los pagos de cada usuario."; } ?></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

	<?php 
		// $objeto_DateTime=date_create($most_anuncios['fecha']);
		// $cadena_nuevo_formato = date_format($objeto_DateTime, "j/n");
		
		// $day=date("j");
		// $month=date("M");
		// $time=date (" - h:i a");
		// $dateToday=$day . "/" . $month . $time;
	?>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="gtco-section">
							<form action="#" method="POST" class="col-md-12 col-4">
								<div class="row form-group">
									<div class="col-md-8">
										<input type="date" class="form-control" name="date">
									</div>
									<div class="col-md-4">
										<input type="submit" class="btn btn-success" name="btnFiltrar" value="Filtrar">
									</div>
								</div>
								<div class="row form-group text-center">
									<div class="col-md-12">
										<h4 class="col-md-12 ">Fecha: <?php echo dateToday(); ?>.</h4>
									</div>
								</div>

							</form>
							<h3 class="tittle_form1 col-md-12 ">Pagos.</h3>


								<table class="tableUserEdit">
									<tr>
										<td class="titleEdit">Nombre</td>
										<td class="titleEdit">Dirección</td>
										<td class="titleEdit">Pago</td>
										<td class="titleEdit">Fecha</td>
									</tr>
									<?php 

										// --------------------------------filtro------------------------------------------

										if (isset($_POST['btnFiltrar'])) {

											$date=$_POST['date'];

											// consultar los pagos
											$consultaP="SELECT * FROM payment ORDER BY date ASC";
											$ejecut_consultaP=mysqli_query($conexion,$consultaP);
			
											while ($mostrarP=mysqli_fetch_array($ejecut_consultaP)) {

												$objeto_DateTime=date_create($mostrarP['date']);
												$date = date_format($objeto_DateTime, "j/M - h:i a");	
											?>
											<tr>
												<td"><?php echo $mostrarP['name']. " &#8212 Cel: " . $mostrarP['phone_user']; ?></td>
												<td"><?php echo $mostrarP['address']; ?></td>
												<td"><?php echo "$ ".$mostrarP['quantity']; ?></td>
												<td"><?php echo $date; ?></td>
											</tr>
											<?php
											}
										}else {
											
											// consultar los pagos
											$consultaP="SELECT * FROM payment ORDER BY date DESC";
											$ejecut_consultaP=mysqli_query($conexion,$consultaP);
			
											while ($mostrarP=mysqli_fetch_array($ejecut_consultaP)) {

												$objeto_DateTime=date_create($mostrarP['date']);
												$date = date_format($objeto_DateTime, "j/M - h:i a");	
									?>
											<tr>
												<td><?php echo $mostrarP['name']. " &#8212 Cel: " . $mostrarP['phone_user']; ?></td>
												<td><?php echo $mostrarP['address']; ?></td>
												<td><?php echo "$ ".$mostrarP['quantity']; ?></td>
												<td><?php echo $date; ?></td>
											</tr>
									<?php
											} 
										
										}
									?>
								</table>
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
<?php		}elseif($mostrar_usu['id_roll']==2 || $mostrar_usu['id_roll']==3) {
            	header("location:../vistasnew/index.php");
        	}
        }else{
                header("location:../index.php");
        }
?>