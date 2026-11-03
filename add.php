<?php
session_start();
include("direct.php");
$st_friend=$_SESSION['user_name'];
$id=$_GET['b'];
$getndf=mysqli_query($con,"SELECT user_name from image where id='$id'");
$name=mysqli_fetch_array($getndf);
$nd_friend=$name['user_name'];
$check=mysqli_query($con,"SELECT * FROM friends where 1st_friend='$st_friend' and 2nd_friend='$nd_friend' or 1st_friend='$nd_friend' and 2nd_friend='$st_friend'");
if (mysqli_num_rows($check)>0) {
	header("Location:users.php");
}else{

$request=mysqli_query($con,"INSERT INTO friends(id,1st_friend,2nd_friend,sign) values('','$st_friend','$nd_friend','tending')");
header("Location:users.php");
}
?>