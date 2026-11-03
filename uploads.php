<!DOCTYPE html>
<html>
<head>
	<title>profile image</title>
	<style type="text/css">
 		#pus{
 			background-color: darkblue;
 			color:white;
 		}
 	</style>
</head>
<body style="background-color: darkorange;">
 	<div id="pus">

 	<form action="" method="post" enctype="multipart/form-data">
 	<input type="file" name="upload" value=""/>
 	<input type="submit" name="submit" value="upload file"/>
 </form>

</div>
<?php
 include("direct.php");
session_start();
    if($_POST['submit']){
    $filename= $_FILES["upload"]["name"];
	$tempname= $_FILES["upload"]["tmp_name"];
	$folder= "profiles/".$filename;
	move_uploaded_file($tempname,$folder);
    
    echo"<center><img src='$folder' width='100' height='130'/></center>";
$q='INSERT INTO `image` (`id`, `user_name`, `picsource`)
			VALUES("","'.$_SESSION['user_name'].'","'.$folder.'")
			';
			if(mysqli_query($con, $q)){
				header("home.php");

   }}
     

?>
</body>
</html>