<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_usuario_ex.php';
  include '../function/select_notifications.php';
  include '../php/mostrarfecha.php';

  if($_SESSION['usuario']){
        $nombre=$_SESSION['usuario'];
        if ($mostrar_usu['id_roll']==1 || $mostrar_usu['id_roll']==2) {
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
						  <h1 class="animate-box" data-animate-effect="fadeInUp">Saldos Pendientes</h1>
						  <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver <?php if($mostrar_usu['id_roll']==3){ echo "<em>tú saldo pendiente.</em>"; }else{echo "<em>los saldos pendientes de cada usuario.</em>"; } ?></h2>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </header>
    <?php
        
            if (isset($_GET['id_newuser'])) {
                $id_newuser=$_GET['id_newuser'];

                // consultar usuario para verificar si existe
                $consulUser="SELECT * FROM balance WHERE id_newuser='$id_newuser'";
                $ejecutConsulUser=mysqli_query($conexion,$consulUser);
                $mostrar_U=mysqli_fetch_array($ejecutConsulUser);

            }
                
    ?>  
        <div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="gtco-section">
                        <?php
                            if (isset($_POST['btnRegisVal'])) {
                                $quantity=$_POST['cantidad'];
            
                                if ($quantity=="" || $quantity=="0" || $quantity==0) {
                                    echo '
                                    <hr>
                                    <div class="alert alert-warning text-center">
                                        <p><span class="icon-warning"> </span>¡Recuerda llenar el campo!<a href="javascript:history.go(-1)"> <br> Volver.</a></p>
                                    </div>
                                    <hr>';
                                }else {
                                    // consultar los pagos
                                    $consultaP="SELECT * FROM balance WHERE id_newuser='$id_newuser'";
                                    $ejecut_consultaP=mysqli_query($conexion,$consultaP) or die('error');
                                    $mostrarP=mysqli_fetch_array($ejecut_consultaP);
                                    
                                    $name=$mostrarP['name'];
                                    $address=$mostrarP['address'];
                                    $phone_user=$mostrarP['phone_user'];
                                    $nit_user=$mostrarP['nit_user'];
                                    $id_userRegis=$mostrar_usu['id_user'];
                                    $idPayment = uniqid();
                                    $formaP=$_POST['formaPago'];
                                    if ($formaP<>2) {
                                        $formaP = 'Efectivo';
                                    }else{
                                        $formaP = 'Transferencia';
                                    }
                                    
                                    // Restarle a la deuda
                                    if ($mostrarP['total_quantity']<$quantity) {
                                            echo '
                                                <div class="alert alert-danger text-center">
                                                    <p><span class="icon-warning"> </span>¡El valor ingresado es mayor al saldo restante!</p><a href="javascript:history.go(-1)"> <br> Vale.</a>
                                                </div>    
                                                ';
                                    }else {
                                            // insertar datos y registrar el pago
                                            $insertPayment="INSERT INTO payment(id_payment,id_newuser,nit_user,name,address,quantity,phone_user,id_userRegis,forma_pago) VALUES('$idPayment','$id_newuser','$nit_user','$name','$address','$quantity','$phone_user','$id_userRegis','$formaP')";
                                            $ejecut_insertPayment=mysqli_query($conexion,$insertPayment);

                                            if ($ejecut_insertPayment) {
                                        
                                                $quantityResult=$mostrarP['total_quantity']-$quantity;
                                                $editarPay="UPDATE balance SET total_quantity='$quantityResult' WHERE id_newuser='$id_newuser'";
                                                $ejecut_editarPay=mysqli_query($conexion,$editarPay);

                                                if ($ejecut_editarPay) {
                                                    echo '
                                                        <div class="alert alert-success text-center">
                                                            <p><span class="icon-check"> </span>Pago Registrado exitosamente. </p> <a href="../vistasnew/saldoPendiente.php"><br> Vale.</a>
                                                        </div>    
                                                        ';
                                                }else {
                                                    echo '
                                                        <div class="alert alert-danger text-center">
                                                            <p><span class="icon-warning"> </span>¡¡Algo Falló en la resta del pago!!</p><a href="javascript:history.go(-1)"> <br> Vale.</a>
                                                        </div>    
                                                        ';
                                                }
                                            }else {
                                                echo '
                                                    <div class="alert alert-danger text-center">
                                                        <p><span class="icon-warning"> </span>¡Algo Falló en el registro del pago!</p><a href="javascript:history.go(-1)"> <br> Vale.</a>
                                                    </div>    
                                                    ';
                                            }  
                                        
                                    }
                                }
                            }
                            if (isset($_POST['btnRenovCred'])) {
            
                                if ($id_newuser=="" || $id_newuser=="0" || $id_newuser==0) {
                                    echo '
                                    <hr>
                                    <div class="alert alert-warning text-center">
                                        <p><span class="icon-warning"> </span>¡Algo salió mal!<a href="javascript:history.go(-1)"> <br> Volver.</a></p>
                                    </div>
                                    <hr>';
                                }else {
                                    // consultar el saldo total
                                    $consultaP = mysqli_query($conexion,"SELECT * FROM balance WHERE id_newuser='$id_newuser'");
                                    $mostrarP = mysqli_fetch_array($consultaP);
                                    
                                    $name=$mostrarP['name'];
                                    $address=$mostrarP['address'];
                                    $phone_user=$mostrarP['phone_user'];
                                    $nit_user=$mostrarP['nit_user'];
                                    $id_userRegis=$mostrar_usu['id_user'];
                                    $idPayment = uniqid();
                                    $quantityRes = $mostrarP['total_quantity'];
                                    $formaP = 'Efectivo';
                                    $cupo = $mostrarP['b_quantity'];
                                    
                                    if ($quantityRes > $cupo) {
                                        echo '
                                            <div class="alert alert-danger text-center">
                                                <p><span class="icon-warning"> </span>El monto que debe es mayor al cupo. </p> <a href="javascript:history.go(-1)"> <br> Vale.</a>
                                            </div>    
                                            ';
                                    }else {

                                        // Restarle a la deuda y setear todo de nuevo //
                                        // insertar datos y registrar el pago
                                        $insertPayment = mysqli_query($conexion,"INSERT INTO payment(id_payment,id_newuser,nit_user,name,address,quantity,phone_user,id_userRegis,razon_abono,forma_pago) VALUES('$idPayment','$id_newuser','$nit_user','$name','$address','$quantityRes','$phone_user','$id_userRegis',2,'$formaP')");

                                        if ($insertPayment) {
                                    
                                            $quantityResult = $mostrarP['b_quantity']+$mostrarP['interests'];
                                            $editarPay = mysqli_query($conexion,"UPDATE balance SET total_quantity='$quantityResult', date_renov = NOW() WHERE id_newuser='$id_newuser'");

                                            if ($editarPay) {
                                                echo '
                                                    <div class="alert alert-success text-center">
                                                        <p><span class="icon-check"> </span>Pago Registrado exitosamente. </p> <a href="../vistasnew/saldoPendiente.php"><br> Vale.</a>
                                                    </div>    
                                                    ';
                                            }else {
                                                echo '
                                                    <div class="alert alert-danger text-center">
                                                        <p><span class="icon-warning"> </span>¡¡Algo Falló en la resta del pago!!</p><a href="javascript:history.go(-1)"> <br> Vale.</a>
                                                    </div>    
                                                    ';
                                            }
                                        }else {
                                            echo '
                                                <div class="alert alert-danger text-center">
                                                    <p><span class="icon-warning"> </span>¡Algo Falló en el registro del pago!</p><a href="javascript:history.go(-1)"> <br> Vale.</a>
                                                </div>    
                                                ';
                                        }
                                    }
                                }
                            }
                        ?> 
                        <div class="row form-group text-center">
							<div class="col-md-12">
								<h4 class="col-md-12 ">Fecha: <?php echo dateToday(); ?>.</h4>
							</div>
						</div>
                        <h3 class="tittle_form1 col-md-12 ">Registrar abono.</h3>
                        <p>Usuario: <b><em><?php echo $mostrar_U['name']; ?></em></b></p>
						<form action="#" method="POST">
                            <div class="row form-group dp-flex jfy-ctn-center">
                                <div class="col-md-3 text-left">
                                    <input type="radio" class="mgr-3" name="formaPago" value="1" id="rFP1" checked><label for="rFP1">Efectivo</label>
                                    <br>
                                    <input type="radio" class="mgr-3" name="formaPago" value="2" id="rFP2"><label for="rFP2">Transferencia</label>
                                </div>
                            </div>
                            <div class="row form-group dp-flex jfy-ctn-center">
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="cantidad" placeholder="Valor sin puntos ni comas">
                                </div>
                            </div>
                            <div class="row form-group text-center dp-flex jfy-ctn-center">
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success btn-lg btn-block" name="btnRegisVal" value="Enviar abono">
                                    <a class="btn btn-primary btn-lg btn-block" id="btn-abrir-popup2">Renovar crédito</a>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
            <hr>
		</div>	
        <!-----------------------------------------  Popup para alerta de renovar ----------------------------------------->
				<div class="overlay" id="overlay2P">
					<div class="popup" id="popup2P">
						<a class="btn-cerrar-popup" id="btn-cerrar-popup2P"><i class="icon-cross"></i></a>
						<h3>¿Confirma renovar el crédito? </h3>
						<div class="content_enlaces">
                            <form  action="#" method="POST">
                                <div class="row">
                                    <div class="col-6 mgy-6">
                                        <input type="submit" class="btn btn-success" name="btnRenovCred" value="Renovar crédito">
                                        <input type="button" class="btn btn-danger"  id="btn-cerrar-popup2_1P" value="Cancelar">
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
				</div>
			<!----------------------------------------- / Popup para alerta de renovar ----------------------------------------->               
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
        }else{
                header("location:../index.php");
        }
?>