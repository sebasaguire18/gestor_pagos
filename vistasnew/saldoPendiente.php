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
  <title>Saldos Pendientes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Website Template by gettemplates.co"/>
  <meta name="keywords" content=""/>
  <meta name="author" content="semaelvatosoft.ga"/>

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
						  <h1 class="animate-box" data-animate-effect="fadeInUp">Saldos Pendientes</h1>
						  <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver <?php if($mostrar_usu['id_roll']==3){ echo "<em>tú saldo pendiente.</em>"; }else{echo "<em>los saldos pendientes de cada usuario.</em>"; } ?></h2>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </header>
    <?php
        if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {

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
						<div class="row form-group text-center">
							<div class="col-md-12">
								<h4 class="col-md-12 ">Fecha Última Actualización: <?php echo dateToday(); ?>.</h4>
							</div>
						</div>
						<h3 class="tittle_form1 col-md-12 ">Usarios deudores.</h3>
						<div class="table-responsive-xl"> 
							<table class="table table-striped " id="tableSaldosPendientes">
								<thead>
									<tr>
										<td class="titleEdit">Identificación</td>
										<td class="titleEdit">Nombre</td>
										<td class="titleEdit">Dirección</td>
										<td class="titleEdit">Resta</td>
										<td class="titleEdit">Abonar</td>
									</tr>
								</thead>
								<tbody>
								<?php 
									consultarSaldosPendLista(3);
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
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
											
											$pagoNumero=$mostrarP['b_quantity'];
											$pago=number_format($pagoNumero,0,",",".");
											
											$interestsNumero=$mostrarP['interests'];
											$interests=number_format($interestsNumero,0,",",".");

											$saldoTotalNumero=$mostrarP['b_quantity']+$mostrarP['interests'];
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
										</table>
									<?php
										}else {
											header ('location:usuarios.php');
										}
									?>
								
									<?php
										// --------------------------------filtro------------------------------------------

										if (isset($_POST['btnFiltrar'])) {

											$date=$_POST['date'];

											// consultar los pagos
											$consultaP="SELECT * FROM payment WHERE id_user ORDER BY date ASC";
											$ejecut_consultaP=mysqli_query($conexion,$consultaP);
			
											while ($mostrarP=mysqli_fetch_array($ejecut_consultaP)) {

												$objeto_DateTime=date_create($mostrarP['date']);
												$date = date_format($objeto_DateTime, "j/M - h:i a");	
											?>
											<tr>
												<td"><?php echo $mostrarP['name']. " &#8212 " . $mostrarP['phone_user']; ?></td>
												<td"><?php echo $mostrarP['address']; ?></td>
												<td"><?php echo "$ ".$mostrarP['quantity']; ?></td>
												<td"><?php echo $date; ?></td>
											</tr>
											<?php
											}
										}
									?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>
    <?php       
        }if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
	?>
		<div id="gtco-subscribe">
			<div class="gtco-container">
				<div class="row">
					<div class="col-12 mg-5 text-center">
						<div class="gtco-section">
							<h3 class="tittle_form2">Clientes de la plataforma</h3>
							<p>¡Recuerda tratar los datos de forma segura!</p>

							<div class="table-responsive-xl"> 
						
								<table class="table table-striped text-white tbListaClientes">
									<thead class="thead-dark text-center">
										<tr>
											<th scope="col">Identificación</th>
											<th scope="col">Nombre</th>
											<th scope="col">Ciudad</th>
											<th scope="col">Saldo</th>
											<th scope="col">Estado</th>
											<?php if ($mostrar_usu['id_roll']==1){ ?>
												<th scope="col"></th>
											<?php } ?>
										</tr>
									</thead>
									<tbody class="text-center">
										<?php
											consultarClientesLista(1);
										?>
									</tbody>
								</table>
							</div>
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