<!doctype html>
<html>
<title>R-chat-login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">
	<link rel="icon" href="logo.png" type="image/x-icon"/>
<style>
*{margin:0px;padding:0px;}
input[type=text]{width:50%; margin-left:28%;}
input[type=password]{width:50%; margin-left:28%;}
input[type=submit]{font-size:25px;margin-left:28%;}
.outer{
	width:90%;
	height: 90%;
    margin: 145px auto;
    background:white;
    color:white;
    border-radius:20px;
	box-shadow: 5px 5px orange;
}
</style>
  <body>
  	<fieldset class="card-header" style="width: 40%;margin:10% auto;">
<?Php session_start() ;
  require_once("direct.php") ;
if(isset($_POST['login'])){
	$user_name = $_POST['user_name'] ;
	$password =$_POST['password'] ;
	
	$q='SELECT * FROM `user` where `user_name`="'.$user_name.'" and `password`="'.$password.'"';
	$r = mysqli_query($con, $q) ;
	if(mysqli_num_rows($r) > 0){
		$io=mysqli_fetch_array($r);
		$id=$io['id'];
		$_SESSION['user_name'] = $user_name;
		$_SESSION['password']=$password;
$upd=mysqli_query($con,"UPDATE image SET status='Online' WHERE status='no status'||status='Offline' AND user_name='$user_name'");
		header("location:home.php") ;	
}else{
	echo '<h5 class="alert alert-danger">
<img src="angry.gif" width="20" height="20">
	your creditials don`t match<h5>' ;
}

}
?>

<div class="card-header alert-success text-center">
<h6>You must login first to continue!!</h6>
</div>
<h2 style="text-align: center;" class="card-header"><img src="logo.png" style="width: 30%;">Log in</h2><br>
<form method="post">

<input type="text" name="user_name" 
style="border-radius: 8px;" required="required" placeholder="user name" required class="form-control"/><br><br>

<input type="password" required="required" id="password" maxlength="6" name="password" 
style="border-radius: 8px;" placeholder="password" class="form-control" /><br>
<input type="submit" name="login" value="Login" class="btn" class="form-control" />&#8667;<br><br>
<center><a href="registration.php" style="color: blue" class="card-header">create any account</a></center>
</form>

</fieldset>
</body>
</html>