<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
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
  <title>Inicio</title>
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

  <header id="gtco-header" class="gtco-cover" role="banner" style="background-image:url(../images/backDinero2.png);">
    <div class="overlay"></div>
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-12 col-md-offset-0 text-left">
          <div class="display-t">
            <div class="display-tc">
              <h1 class="animate-box" data-animate-effect="fadeInUp">Tú negocio a otro nivel</h1>
              <h2 class="animate-box" data-animate-effect="fadeInUp">Gestor de control de <em>pagos</em></h2>
              <p class="animate-box" data-animate-effect="fadeInUp"><a href="#" class="btn btn-white btn-lg btn-outline">Pagos</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>Datos Curiosos</h2>
        </div>
      </div>

      <div class="row">
        
        <!-- <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-settings"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Creativity Fuel</span>

          </div>
        </div> -->
        <div class="col-md-2"></div>
        <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="icon-user"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="<?php echo conteoClientes(1); ?>" data-speed="1000" data-refresh-interval="50">1</span>
            <span class="counter-label">Clientes</span>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-receipt"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="<?php echo conteoPagos(1); ?>" data-speed="1000" data-refresh-interval="50">1</span>
            <span class="counter-label">Pagos Realizados</span>
          </div>
        </div>
        <div class="col-md-2"></div>
        <!-- <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-time"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Hours Spent</span>

          </div>
        </div> -->
          
      </div>
    </div>
  </div>
  
  <?php include '../includes/footer.php'; ?>

  <div class="gototop js-top">
    <a class="js-gotop cursor"><i class="icon-arrow-up"></i></a>
  </div>

    <?php include '../includes/scriptnew.php'; ?>
  </body>
</html>
<?php
        }else{
                header("location:../index.php");
        }
?>