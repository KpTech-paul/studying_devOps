<!DOCTYPE html>
<html>
<head>
	<title>R-chat-create account</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="icon" href="logo.png" type="image/x-icon"/>
<style>
*{margin: 0px; padding: 0px;}

input{margin:5px;}
</style>
</head>
<body>
<?PHp
session_start();

      require_once("direct.php") ;
	  
	  
   if(isset($_POST['register'])){
	$first_name= $_POST['first_name'];
	$last_name= $_POST['last_name'] ;
	$user_name= $_POST['user_name'];
	$password= $_POST['password'] ;
	
	if($first_name !="" and $last_name != "" and $user_name !="" and $password !=""){
	$check=mysqli_query($con,"SELECT password,user_name FROM user");
	while($exist=mysqli_fetch_assoc($check)){
	$exp=$exist['password'];
	$na=$exist['user_name'];}
	if ($exp==$password and $na==$user_name) {
		?>
		<script>alert("Account Already exist! change crediials!")</script>
		<?php
	}else{
		$q="INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`)
		   VALUES('','".$first_name."', '".$last_name."', '".$user_name."', '".$password."')
		" ;
		if(mysqli_query($con, $q )){
			header("location:login.php");
		  }else{
			  echo $q ;
		  }
	}
	}else{
		
		echo "<h4 style='color: red;  
		margin-left:42%;'><img src='icon-warning.png' width='20' height='20'>&nbsp;&nbsp;&nbsp;please fill all the boxes</h4>" ;
	 	}
		
	}


?>
<center><fieldset class="card-header" style="width: 30%;">
<center><h5 class="card-header"><img src="logo.png" style="width: 30%;">Create any account</h5></center>
<form method="post" enctype="multipart/form-data" class="card-body">
<input type="text" name="first_name" placeholder="first name" required="" class="form-control" />
<br>
<input type="text" name="last_name" placeholder="last name" required="" class="form-control"/><br>
<input type="text" name="user_name" placeholder="user name" maxlength="15" minlength="5" required="" class="form-control"/><br>
<input type="password" name="password" placeholder="password" maxlength="6" minlength="6" required="" class="form-control"/>
<h6 class="card">Profile picture</h6>
<input type="file" name="upload" required="" style="" class="form-control-file"><br>
 	<input type="submit" name="register" value="Sign up" class="btn btn-info" />
 	<label class="card-footer"><h5>Already have any account?</h5><a href="login.php">Sign in</a></label>
 </form>
</fieldset></center>
<?php
 include("direct.php");
    if(isset($_POST['register'])){
    $filename= $_FILES["upload"]["name"];
	$tempname= $_FILES["upload"]["tmp_name"];
	$folder= "profiles/".$filename;
	$name=$_POST['user_name'];
	move_uploaded_file($tempname,$folder);
	$status="no status";
$q='INSERT INTO `image` (`id`, `user_name`, `picsource`,`status`)
			VALUES("","'.$name.'","'.$folder.'","'.$status.'")
			';
			if(mysqli_query($con, $q)){
				header("home.php");

   }}
     

?>
</form>
</body>
</html>