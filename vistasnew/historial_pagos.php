<?php 
  include '../php/conexion-bd.php';
  include '../function/funciones.php';
  
  session_start();
  error_reporting(0); 
  
  if ($_SESSION['usuario']) {
    $nombre=$_SESSION['usuario'];

    $consultar_usu=mysqli_query($conexion,"SELECT * FROM inicio WHERE name='$nombre' AND status=1");
    $mostrar_usu=mysqli_fetch_array($consultar_usu);

    include '../function/select_usuario.php';
    include '../function/select_usuario_ex.php';
    include '../function/select_notifications.php';
  }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historial de Pagos</title>
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
        <?php if ($_SESSION['usuario']) {
            $nombre=$_SESSION['usuario'];
        ?>
            <?php include '../includes/popupnew.php'; ?>

            <?php include '../includes/navnew.php'; ?>
        <?php }?>
        </div>
    </nav>
    <header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
        <div class="overlay"></div>
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc">
                            <h1 class="animate-box" data-animate-effect="fadeInUp">Historial de pagos</h1>
                            <h2 class="animate-box" data-animate-effect="fadeInUp">Aquí puedes ver todos los <em>Detalles</em> de los de pagos realizados</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="gtco-subscribe">
        <div class="gtco-container">
            <?php 
                if (isset($_GET['nit_user'])) {
                    $nit_user = $_GET['nit_user'];
                    if ($nit_user=="") {
            ?>
                        <div class="alert alert-danger text-center">
                            <p><span class="icon-warning"> </span>¡Hubo un error!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
                        </div>
            <?php
                    }else{
                        $consultarDatosHistorialUsuario = mysqli_query($conexion,"SELECT * FROM payment INNER JOIN balance ON payment.nit_user = balance.nit_user INNER JOIN new_user ON payment.nit_user = new_user.nit_user WHERE payment.nit_user = $nit_user");
                        $resultRows = mysqli_num_rows($consultarDatosHistorialUsuario);
                        if ($resultRows<1) {
            ?>
                            <div class="alert alert-danger text-center">
                                <p><span class="icon-warning"> </span>¡El usuario no existe o hubo un error!</p><a class="volver" href="javascript:history.go(-1);">Volver</a>
                            </div>
            <?php
                        }else{
                        $mostrarDHU=mysqli_fetch_Array($consultarDatosHistorialUsuario);
            ?>
                        <div class="row dp-flex jfy-ctn-center">
                            <div class="col-md-5">
                                <div class="part">
                                    <h2 class="txt-white">Datos del usuario</h2>
                                    <table class="table table-striped text-white text-center">
                                        <tr>
                                            <th class="bg-white text-black">Identificación</th>
                                            <th><?php echo $mostrarDHU['nit_user']; ?></th>
                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Nombre</th>
                                            <th><?php echo $mostrarDHU['name']; ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Contacto</th>
                                            <th><a href="tel:<?php echo $mostrarDHU['phone_user']; ?>"><?php echo $mostrarDHU['phone_user']; ?></a></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Dirección</th>
                                            <th><?php echo $mostrarDHU['address']; ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Ciudad</th>
                                            <th><?php consultarNombreCiudad($mostrarDHU['city']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Fiador</th>
                                            <th><?php consultarNombreUsuario($mostrarDHU['fiador']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Cupo</th>
                                            <th><?php echo formatoAPrecio($mostrarDHU['b_quantity']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Interes</th>
                                            <th><?php echo formatoAPrecio($mostrarDHU['interests']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Saldo actual</th>
                                            <th><?php echo formatoAPrecio($mostrarDHU['total_quantity']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Tipo crédito</th>
                                            <th><?php echo consultarNombreTipoPago($mostrarDHU['tipo_credito']); ?></th>

                                        </tr>
                                        <tr>
                                            <th class="bg-white text-black">Cuotas</th>
                                            <th><?php echo $mostrarDHU['cuotas_credito']; ?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="part">
                                    <div class="table-responsive-xl">
                                        <table class="table table-striped tblPagosRealizados">
                                            <thead class="thead-dark text-center">
                                                <tr>
                                                    <th scope="col">ID Pago</th>
                                                    <th scope="col">Pagó</th>
                                                    <th scope="col">Razón Pago</th>
                                                    <th scope="col">Forma Pago</th>
                                                    <th scope="col">Fecha</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <?php
                                                    consultarPagosLista(3,$nit_user);
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                        </div>
            <?php
                    }}
                }else{
            ?>
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
                                            <?php if($mostrar_usu['id_roll']==1){ ?>
                                                <th scope="col"></th>
                                            <?php } ?>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                            consultarClientesLista(1,1);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
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