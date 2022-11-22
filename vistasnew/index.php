<?php 

  include '../php/conexion-bd.php';
  include '../function/select_usuario.php';
  include '../function/select_notifications.php';

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

  <div id="gtco-features-3">
    <div class="gtco-container">
      <div class="gtco-flex">
        <div class="feature feature-1 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-search"></i>
            </span>
            <h3>Search</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
            <p><a href="#" class="btn btn-white btn-outline">Learn More</a></p>
          </div>
        </div>
        <div class="feature feature-2 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-announcement"></i>
            </span>
            <h3>Announcdement</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
            <p><a href="#" class="btn btn-white btn-outline">Learn More</a></p>
          </div>
        </div>
        <div class="feature feature-3 animate-box" data-animate-effect="fadeInUp">
          <div class="feature-inner">
            <span class="icon">
              <i class="ti-timer"></i>
            </span>
            <h3>Timer</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
            <p><a href="#" class="btn btn-white btn-outline">Learn More</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id="gtco-features">
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>Aesthetic Features</h2>
          <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-vector"></i>
            </span>
            <h3>Pixel Perfect</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-tablet"></i>
            </span>
            <h3>Fully Responsive</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-settings"></i>
            </span>
            <h3>Web Development</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="feature-center animate-box" data-animate-effect="fadeIn">
            <span class="icon">
              <i class="ti-ruler-pencil"></i>
            </span>
            <h3>Web Design</h3>
            <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="gtco-portfolio" class="gtco-section">
    <div class="gtco-container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>Our Latest Works</h2>
          <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
        </div>
      </div>

      <div class="row row-pb-md">
        <div class="col-md-12">
          <ul id="gtco-portfolio-list">
            <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_1.jpg); "> 
              <a href="#" class="color-1">
                <div class="case-studies-summary">
                  <span>Web Design</span>
                  <h2>View the Earth from the Outer Space</h2>
                </div>
              </a>
            </li>
            <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_2.jpg); ">
              <a href="#" class="color-2">
                <div class="case-studies-summary">
                  <span>Illustration</span>
                  <h2>Sleeping in the Cold Blue Water</h2>
                </div>
              </a>
            </li>


            <li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_3.jpg); ">
              <a href="#" class="color-3">
                <div class="case-studies-summary">
                  <span>Illustration</span>
                  <h2>Building Builded by Man</h2>
                </div>
              </a>
            </li>
            <li class="one-half animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_4.jpg); ">
              <a href="#" class="color-4">
                <div class="case-studies-summary">
                  <span>Web Design</span>
                  <h2>The Peaceful Place On Earth</h2>
                </div>
              </a>
            </li>

            <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_5.jpg); "> 
              <a href="#" class="color-5">
                <div class="case-studies-summary">
                  <span>Web Design</span>
                  <h2>I'm Getting Married</h2>
                </div>
              </a>
            </li>
            <li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(../images/img_6.jpg); ">
              <a href="#" class="color-6">
                <div class="case-studies-summary">
                  <span>Illustration</span>
                  <h2>Beautiful Flowers In The Air</h2>
                </div>
              </a>
            </li>
          </ul>   
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center animate-box">
          <a href="#" class="btn btn-white btn-outline btn-lg btn-block">See All Our Works</a>
        </div>
      </div>

      
    </div>
  </div>

  <div id="gtco-counter" class="gtco-section">
    <div class="gtco-container">

      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>Fun Facts</h2>
          <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
        </div>
      </div>

      <div class="row">
        
        <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-settings"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Creativity Fuel</span>

          </div>
        </div>
        <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-face-smile"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Happy Clients</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-briefcase"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Projects Done</span>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
          <div class="feature-center">
            <span class="icon">
              <i class="ti-time"></i>
            </span>
            <span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
            <span class="counter-label">Hours Spent</span>

          </div>
        </div>
          
      </div>
    </div>
  </div>

  <div id="gtco-products">
    <div class="gtco-container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
          <h2>Products</h2>
          <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
        </div>
      </div>
      <div class="row animate-box">
        <div class="owl-carousel owl-carousel-carousel">
          <div class="item">
            <img src="../images/img_1.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
          </div>
          <div class="item">
            <img src="../images/img_2.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
          </div>
          <div class="item">
            <img src="../images/img_3.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
          </div>
          <div class="item">
            <img src="../images/img_4.jpg" alt="Free HTML5 Bootstrap Template by GetTemplates.co">
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <div id="gtco-subscribe">
    <div class="gtco-container">
      <div class="row animate-box">
        <div class="col-md-8 col-md-offset-2 text-center gtco-heading">
          <h2>Subscribe</h2>
          <p>Be the first to know about the new templates.</p>
        </div>
      </div>
      <div class="row animate-box">
        <div class="col-md-12">
          <form class="form-inline">
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Your Email">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <div class="form-group">
                <label for="name" class="sr-only">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your Name">
              </div>
            </div>
            <div class="col-md-4 col-sm-4">
              <button type="submit" class="btn btn-default btn-block">Subscribe</button>
            </div>
          </form>
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
<?php
        }else{
                header("location:../index.php");
        }
?>