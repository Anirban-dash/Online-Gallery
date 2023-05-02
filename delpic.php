<?php
require("conn.php");
$id=$_POST['id'];
$res=mysqli_query($con,"DELETE FROM `image` WHERE `image`.`id` ='$id'") or die(mysqli_error($con));
?>