<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
  <link rel="icon" href="logo.png" type="image/x-icon"/>
	<title>R-chat-help</title>
	<style>
		.auter{
			background-image:url(paper.gif);
			width: 30%;
			height:60%;
			margin-left: 30%;
			border-radius: 30px 30px 5px 30px;
			box-shadow: 10px 10px 10px 10px black;
		}

#users_list{width:97%;
	padding: 0% 1%;
	height: 680px;
	overflow-y: scroll;
	border-radius: 0px 0px 0px 25px;
	z-index: 1;

	}
/*style for search bar*/
#myInput {
  background-image: url('searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 82%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
.t1{
    color: #fff;
  background-color: #17a2b8;
    border-color: #17a2b8;
  text-decoration: none;
  display: inline-block;
    font-weight: 400;
  text-align: center;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
margin-top: -2%;
}
.t1:hover{
background-color: #17a2b8;
color: white;
text-decoration: none;
}
input[type=submit]:hover{
	color: red;
	border: none;
}
.form-control {
  display: block;
  width: 40%;
  height: calc(1.5em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #495057;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>

<body style="background-color: azure;">
<div class="card-body" style="width: 36%;margin-left: 30%;">
  <fieldset style="background-color: darkblue;
  height: 3%;width: 100%;margin-top: -5%;
  border-radius: 25px 25px 0px 0px;" class="card-header">
 	<?php
  include("direct.php");
  session_start() ;
  $i=$_SESSION['user_name'];
  $hh=mysqli_query($con,"SELECT id FROM message WHERE receiver='$i' AND status='unread' GROUP BY sender");
         $number=mysqli_num_rows($hh);
  ?>
 	<center><a href="home.php" class="t1"><i class="fa fa-home"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <?php
  if (empty($number)) {
    ?>
    <a href="allmess.php" class="t1"><i class="fa fa-envelope"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
  }else{
     ?>
    <a href="allmess.php" class="t1"><i class="fa fa-envelope"></i><span style="background: red;border-radius: 100%;font-weight: bold;margin-left:-6px;">&nbsp;<?php echo $number?>&nbsp;</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
  }
 	?>
 	<a href="help.php" class="t1"><i class="fa fa-question-circle"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
  $requestu=mysqli_query($con,"SELECT * FROM friends WHERE 2nd_friend='$i' and sign='tending'");
   $r=mysqli_num_rows($requestu);
if ($r>0) {
  ?>
  <a href="users.php" class="t1"><i class="fa fa-user"></i><span style="background: red;border-radius: 100%;font-weight: bold;">&nbsp;<?php echo $r;?>&nbsp;</span></a></center>
  <?php
}else{
  ?>
  <a href="users.php" class="t1"><i class="fa fa-user"></i></a></center>
<?php
}
  ?>
  </fieldset>
<?PHp

      require_once("direct.php") ;
	  
	  
   if(isset($_POST['submit'])){
	$user_name= $_POST['user_name'] ;
	$issue= $_POST['issue'];
	
	if($user_name !="" and $issue != "" ){
		
		$q="INSERT INTO `issue` (`id`, `user_name`, `issue`)
		   VALUES('', '".$user_name."', '".$issue."')
		" ;
		if(mysqli_query($con, $q )){
			echo "<h4 class='alert alert-danger'><img src='smiley.gif'>  it will be checked<h4>"; ;
		  }else{
			  echo $q ;
		  }
		
	}
}


?>
	</form>
<fieldset style="background-image:url(paper.gif);overflow-y: scroll;height: 580px;
border-radius: 0px 0px 0px 30px;text-align: center;">
<form method="post" class="input-group">
	<input type="text" name="user_name" placeholder=
"Set your names" required="" class="form-control" style="width: 60%;">
<input type="text" name="issue" placeholder=
"What you need us to help you... ?" style="width: 100%;" class="form-control"><br>
<input type="submit" name="submit" value="Ask to us"
	style="background: #006699;color: white;cursor: pointer;width: 100%;" class="form-control">
  <ol class="card">
<h4 class="card-header" style="margin-left: -12%;">How to create account</h4><br>
	. Click on log out link then click on create any account link.<br>
	  specify your first name, lastname,username and password.<br>

	. Click on register button<br>

	  !! if you skip any field you will not be registered<br>

   <h4 class="card-header" style="margin-left: -12%;">chat</h4>

     .This is the private chat so, every user<br> will heve his/her own friends.
     To start conversation, go to users button and click to user you want then start chat. 

    <h4 class="card-header" style="margin-left: -12%;">How to see new message</h4><br>
    .If there is new message you will see the number of message<br>
    .After read the number will disappeared accordingly
    <h4 class="card-header" style="margin-left: -12%;">Online/Offline</h4><br>
    .When user is online its light green<br>
    .When user is offline its light red
    .<span class="alert alert-danger">Please remember to log out when you leave otherwise you will seem like online user!</span>
</ol>
</fieldset>
</body>
</html>