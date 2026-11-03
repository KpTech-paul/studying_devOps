<?php 
include("direct.php");
session_start() ;
if(isset($_SESSION['user_name'])){
	$i=$_SESSION['user_name'];
	$upd=mysqli_query($con,"UPDATE image SET status='Offline' WHERE status='Online' AND user_name='$i'");	
	unset($_SESSION['user_name']) ;
	header("location:login.php") ;
}else{
	header("location:login.php") ;
}



?>