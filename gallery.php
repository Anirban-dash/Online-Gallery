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
	<style>
		.bottomright {
  position: absolute;
  bottom: 8px;
  right: 16px;
}
.image-preview-container {
    width: 100%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container img {
    display: none;
    text-align: center;
}
.image-preview-container input {
    display: none;
}

.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    text-align: center;
    background: #8338ec;
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
	</style>


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
					<a href="./index.php" class="site-logo">
						<h2>Photo memories</h2>
					</a>
				</div>
				<div class="col-sm-4 col-md-3 order-3 order-sm-3">
					<div class="header__switches">
						<a href="#" class="" onclick="openalert();"><i class="fa fa-share"></i></a>
						<a href="#" class="nav-switch"><i class="fa fa-bars"></i></a>
					</div>
				</div>
			</div>
			<nav class="main__menu">
				<ul class="nav__menu">
					<li><a href="./index.php">Home</a></li>
					<li><a href="./about.php">About</a></li>
					<li><a href="./gallery.php" class="menu--active">Gallery</a></li>
					<li><a href="./contact.php">Feedback</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header Section end -->

	<!-- About Page -->
	<div class="gallery__page">
		<div class="gallery__warp">
			<div class="row">
				<?php
				if(mysqli_num_rows($res)==0){
					echo '<p class="text-center">You does not have any photo in your Gallery</p>';
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
			<form action="add_photo.php" method="post" enctype="multipart/form-data">
			<label class="form-label" for="file-upload">Upload a new photo<i class="fa fa-image"></i></label>
			
		   <div class="image-preview-container">
			   <div class="form-outline mb-4">
				   <input type="file" required name="image" id="file-upload" accept="image/*" onchange="previewImage(event);" class="form-control" />
				   <label class="form-label" for="file-upload">Browse&nbsp;<i class="fa fa-folder-open"></i></label>
			   </div>
			   <div class="preview">
				   <img id="preview-selected-image"  height="200" width="200"/>
			   </div>
		   </div>
		   <input type="text" placeholder="Enter your title" class="form-group" name="title" required>
		   <button type="submit" class="btn btn-info btn-block mb-4">Add this photo <i class="fa fa-plus"></i></button>
		</form>
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
	<script>
        const previewImage = (event) => {
    const imageFiles = event.target.files;
    const imageFilesLength = imageFiles.length;
    if (imageFilesLength > 0) {
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        const imagePreviewElement = document.querySelector("#preview-selected-image");
        imagePreviewElement.src = imageSrc;
        document.getElementById("preview-selected-image").style.display="block";
    }
};
function openalert(){
Swal.fire({
  title: '<strong>Share your gallery by copy this url</strong>',
  icon: 'info',
  html:
    '<input type="text" value="'+window.location.hostname+'/Gallery/galleryView.php?id=<?php echo $id; ?>" disabled id="myInput"> ' +
    '<button onclick="myFunction()"> <i class="fa fa-copy"></i></button>',
  showCloseButton: true,
  focusConfirm: false
})
}
function myFunction() {
  // Get the text field
  var copyText = document.getElementById("myInput");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  alert("Copied the text: " + copyText.value);
}
function delpic(id){
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
			location.reload();
		}
	};
	xhttp.open("POST", "delpic.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("id="+id);
}
    </script>
	</body>
</html>
