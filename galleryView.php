<?php
require("conn.php");
if(!isset($_GET['id'])){
    header("location:index.php");
}
$id=$_GET['id'];
$res=mysqli_query($con,"SELECT * from image where user='$id'") or die(mysqli_error($con));
$us=mysqli_query($con,"SELECT * from user where id='$id'") or die(mysqli_error($con));
$user=mysqli_fetch_array($us);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Mmories</title>
	<meta charset="UTF-8">
	<meta name="description" content="Boto Photo Studio HTML Template">
	<meta name="keywords" content="photo, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/fresco.css"/>

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
					<a href="" class="site-logo">
						<h2>Photo memories</h2>
                        <p><?php echo $user['name'] ?></p>
					</a>
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
						
					</div>
				</div>
			</div>
		
		</div>
	</header>
	<div class="gallery__page">
		<div class="gallery__warp">
			<div class="row">
				<?php
				if(mysqli_num_rows($res)==0){
					echo '<p class="text-center">User Does not have any images</p>';
				}
				while($row=mysqli_fetch_array($res)){
					echo '<div class="col-lg-3 col-md-4 col-sm-6">
					<a class="gallery__item fresco" href="img/'.$row['file'].'" data-fresco-group="gallery">
						<img src="img/'.$row['file'].'" alt="">
						
					</a>
					<div style="cursor:pointer;" class="bottomright" onclick="delpic('.$row['id'].');"><i class="fa fa-trash text-danger"></i></div>
				</div>';
				}
				?>
				
				
			</div>
			
		</div>
	</div>
	<!-- About Page end -->

	<!-- Footer Section -->
	<footer class="footer__section">
		<div class="container">
			<div class="footer__copyright__text">
				<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> </p>
			</div>
		</div>
	</footer>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/fresco.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	</body>
</html>
