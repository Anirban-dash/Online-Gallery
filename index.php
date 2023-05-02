<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
	header("location:login.php");
	die();
}
$id=$_SESSION['id'];
$res=mysqli_query($con,"SELECT * from image where user='$id'") or die(mysqli_error($con));

?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Memories</title>
	<meta charset="UTF-8">
	<meta name="description" content="Boto Photo Studio HTML Template">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/fresco.css"/>
	<link rel="stylesheet" href="css/slick.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
	<header class="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 col-md-3 order-2 order-sm-1">
					<div class="header__social">
					</div>
				</div>
				<div class="col-sm-4 col-md-6 order-1  order-md-2 text-center">
					<a href="./index.html" class="site-logo">
					<h2>Photo memories</h2>
					</a>
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
						<a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
			<nav class="main__menu">
				<ul class="nav__menu">
					<li><a href="./index.php" class="menu--active">Home</a></li>
					<li><a href="./about.php">About</a></li>
					<li><a href="./gallery.php">Gallery</a></li>
					<li><a href="./contact.php">Feedback</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header Section end -->

	<!-- Hero Section -->
	<section class="hero__section">
		<?php
		if(mysqli_num_rows($res)==0){
			echo '<p class="text-center">You does not have any photo in your Gallery</p>';
		}
			while($row=mysqli_fetch_array($res)){
				echo '<div class="hero-slider">
				<div class="slide-item">
					<a class="fresco" href="img/'.$row['file'].'" data-fresco-group="projects">
						<img src="img/'.$row['file'].'" alt="">
					</a>
				</div>
				
			</div>';
			}
		?>
		<div class="hero-text-slider">
			<?php
			$res=mysqli_query($con,"SELECT * from image where user='$id'") or die(mysqli_error($con));
			while($row=mysqli_fetch_array($res)){
				echo '<div class="text-item">
				<h2>'.$row['title'].'</h2>
				<p>Photography</p>
			</div>';
			}
?>
			
			
		</div>
	</section>
	<!-- Hero Section end -->

	<!-- Footer Section -->
	<footer class="footer__section">
		<div class="container">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			<div class="footer__copyright__text">
				<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved </p>
			</div>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
		</div>
	</footer>
	<!-- Footer Section end -->

	<!-- Search Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search End -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/fresco.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
