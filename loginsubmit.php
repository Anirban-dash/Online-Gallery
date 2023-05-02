<?php
require("conn.php");
session_start();
$email=$_POST['email'];
$pass=$_POST['pass'];
$res=mysqli_query($con,"SELECT * from user where email='$email' and password='$pass'") or die(mysqli_error($con));
if(mysqli_num_rows($res)==0){
    header("location:login.php?err=1");
}else{
    $row=mysqli_fetch_array($res);
    $_SESSION['id']=$row['id'];
    header("location:index.php");
}
?>