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
                      <h1 class="animate-box" data-animate-effect="fadeInUp">Ampliar prestamo</h1>
						  <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes <?php if($mostrar_usu['id_roll']==3){ echo "<em>Solicitar Ampliar tú prestamo.</em>"; }else{echo "<em>Solicitar Ampliar prestamo de cada usuario.</em>"; } ?></h2>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </header>
    <?php
        
            if (isset($_GET['accion']) && isset($_GET['id_newuser'])) {
                $accion=$_GET['accion'];
                $id_newuser=$_GET['id_newuser'];

                    // consultar usuario para verificar si existe
                $consulUser="SELECT * FROM balance WHERE id_newuser='$id_newuser'";
                $ejecutConsulUser=mysqli_query($conexion,$consulUser);
                $mostrar_U=mysqli_fetch_array($ejecutConsulUser);

                $deuda=formatoAPrecio($mostrar_U['total_quantity']);
                $cupo=formatoAPrecio($mostrar_U['b_quantity']);
            }
                
    ?>  
        <div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="gtco-section">
                        <?php
                            if (isset($_POST['btnRS'])) {
                                $quantityLoan=$_POST['cantidad'];
            
                                if ($quantityLoan=="") {
                                    echo '
                                        <div class="alert alert-warning text-center">
                                            <p><span class="icon-warning"> </span>¡Recuerda llenar el campo!<a href="javascript:history.go(-1)"> <br> Volver.</a></p>
                                        </div>
                                        ';
                                }else {
                                    // consultar los datos del usuario para guardarlos en la tabla extendloan
										$consultaP = mysqli_query($conexion,"SELECT * FROM balance WHERE id_newuser='$id_newuser'") or die('error');
                                        $mostrarP = mysqli_fetch_array($consultaP);
                                        
                                        $name=$mostrarP['name'];
                                        $nit_user=$mostrarP['nit_user'];
                                        $address=$mostrarP['address'];
                                        $phone_user=$mostrarP['phone_user'];
                                        $quantityP=$mostrarP['total_quantity'];
                                    
                                        $id_userRegis=$mostrar_usu['id_user'];

										$idExtendLoan = uniqid();

                                    // insertar datos y registrar la solicitud
                                        $insertAmpliarP="INSERT INTO extendloan(id_extendLoan,id_newuser,name,nit_user,address,phone_user,quantityP,quantityLoan,id_userRegis) VALUES('$idExtendLoan','$id_newuser','$name','$nit_user','$address','$phone_user','$quantityP','$quantityLoan','$id_userRegis')";
                                        $ejecut_insertAmpliarP=mysqli_query($conexion,$insertAmpliarP);

                                        if ($ejecut_insertAmpliarP) {
                                            echo '
                                                <div class="alert alert-success text-center">
                                                    <p><span class="icon-check"> </span>Solicitud Registrada exitosamente.</p> <a href="../vistasnew/saldoPendiente.php"><br> Vale.</a>
                                                </div>  
                                                ';
                                        }else {
                                            echo '
                                                <div class="alert alert-danger text-center">
                                                    <p><span class="icon-warning"> </span>¡Algo Falló al registrar la solicitud!<a href="javascript:history.go(-1)"> <br> Volver.</a></p>
                                                </div>
                                                ';
                                        }
                                    
                                }
                            }
                        ?> 
                        <div class="row form-group text-center">
							<div class="col-md-12">
								<h4 class="col-md-12 ">Fecha: <?php echo dateToday(); ?>.</h4>
							</div>
						</div>
                        <h3 class="tittle_form1 col-md-12 ">Solicitar ampliar el prestamo.</h3>
                        <p>Usuario: <b><em><?php echo $mostrar_U['name']; ?></em></b></p>
						<form action="#" method="POST">
                            <div class="row form-group text-center">
                                <div class="col-md-12">
                                    <p class="text-left lead">Cupo Actual:</p>
                                    <input type="text" disabled class="form-control text-center" value="<?php echo $cupo ; ?>">
                                </div>
                            </div>
                            <div class="row form-group text-center">
                                <div class="col-md-12">
                                    <p class="text-left lead">Deuda Actual:</p>
                                    <input type="text" disabled class="form-control text-center" value="<?php echo $deuda ; ?>">
                                </div>
                            </div>
                            <div class="row form-group text-center">
                                <div class="col-md-12">
                                <p class="text-left lead">Cupo deseado:</p>
                                    <input type="text" class="form-control text-center" name="cantidad" placeholder="Valor sin puntos ni comas">
                                </div>
                            </div>
                            <div class="row form-group text-center">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-lg" name="btnRS">
                                </div>
                            </div>
                        </form>
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
	
	<?php  include '../includes/footer.php'; ?>
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