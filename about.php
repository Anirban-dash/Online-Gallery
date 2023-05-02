<?php
require("conn.php");
session_start();
if(!isset($_SESSION['id'])){
	header("location:login.php");
	die();
}
$id=$_SESSION['id'];
$res=mysqli_query($con,"SELECT * from user where id='$id'") or die(mysqli_error($con));
$row=mysqli_fetch_array($res);
$cc=mysqli_query($con,"SELECT * from image where user='$id'") or die(mysqli_error($con));
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
					<li><a href="./index.php">Home</a></li>
					<li><a href="./about.php" class="menu--active">About</a></li>
					<li><a href="./gallery.php">Gallery</a></li>
					<li><a href="./contact.php">Feedback</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header Section end -->

	<!-- About Page -->
	<section class="about__page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="about__text">
						<h3 class="about__title">About Me</h3>
						<div class="about__meta">
							<img src="img/profile/<?php echo $row['photo']; ?>" alt="">
							<div class="about__meta__info">
								<h5><?php echo $row['name']; ?></h5>
								<p>PHOTOGRAPHER / DESIGNER</p>
								<p><?php echo $row['email']; ?></p>
								<p>Total Images: <?php echo mysqli_num_rows($cc); ?>
							</div>
						</div>
						
					</div>
				</div>
			
			</div>
		</div>
	</section>
	<footer class="footer__section">
		<div class="container">
			<div class="footer__copyright__text">
				<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved </p>
			</div>
		
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
	<script src="js/main.js"></script>

	</body>
</html>
