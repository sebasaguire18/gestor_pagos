<?php 
	session_start();
	error_reporting(0);
	if ($_SESSION['usuario']) {
		$nombre=$_SESSION['usuario'];
		header("location:vistasnew/index.php");
	

	}else{


?>
<!DOCTYPE HTML>
<!---->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Aesthetic &mdash; Free Website Template, Free HTML5 Template by gettemplates.co</title>
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

	<?php include('../includes/linksnew.php'); ?>

	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 text-right gtco-contact">
					<ul class="">
						<li><a href="#"><i class="ti-mobile"></i> +1 (0)123 456 7890 </a></li>
						<li><a href="http://twitter.com/gettemplatesco"><i class="ti-twitter-alt"></i> </a></li>
						<li><a href="#"><i class="icon-mail2"></i></a></li>
						<li><a href="#"><i class="ti-facebook"></i></a></li>
					</ul>
				</div>
			</div>
			
			
			<?php include '../includes/nav.php'; ?>
			
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-xs" role="banner" style="background-image:url(../images/backDinero2.png);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc">
							<h1 class="animate-box" data-animate-effect="fadeInUp">Our Portfolio</h1>
							<h2 class="animate-box" data-animate-effect="fadeInUp">Free HTML5 Bootstrap Templates Made <em>by</em> <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
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
					<a href="#" class="btn btn-primary btn-lg btn-block">Have a project? Let's get started</a>
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

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-pb-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About Us</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Links</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Knowledge Base</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Terms of services</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@gettemplates.co</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small> 
						<small class="block">Designed by <a href="http://gettemplates.co/" target="_blank">GetTemplates.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<?php include '../includes/scriptnew.php'; ?>


	</body>
</html>


<?php 	} ?>
