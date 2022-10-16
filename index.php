<?php 
	session_start();
	error_reporting(0); 
	if ($_SESSION['usuario']) {
		$nombre=$_SESSION['usuario'];
		header("location:vistasnew/index.php");
	
	}else{


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

	
	<?php include 'includes/links.php'; ?>

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	<div id="page">
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				

				<!-----------------------------------------  Inicio de sesión overlay login ----------------------------------------->
					<div class="overlay active" id="overlay">
						<div class="popup active" id="popup">
							<h3>Iniciar Sesión</h3>
							<form action="php/iniciarsesion.php" method="POST">
								<div class="contenedor-inputs">
									<input type="email" name="email" placeholder="Email">
									<input type="password" name="password" placeholder="********">
								</div>
								<input type="submit" name="btn-iniciar" class="btn-submit-popup btn-block" value="Validar">
							</form>
						</div>
					</div>
				<!----------------------------------------- / Inicio de sesión overlay login ----------------------------------------->

				
			</div>
		</nav>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
		<?php include 'includes/script.php'; ?>
	</body>
</html>
<?php 	} ?>
