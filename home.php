<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="icon" href="logo.png" type="image/x-icon"/>
	<title>R-chat-home</title>
	<style>
		.auter{
			background-color: pink;
			width: 32%;
			height:60%;
			margin-left: 30%;
			border-radius: 30px 30px 30px 30px;
			box-shadow: ;
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

}
.t1:hover{
background-color: #17a2b8;
color: white;
text-decoration: none;
}

		
	</style>
</head>
<body style="background-color: azure;">
<div class="auter">
<fieldset style="height: 658px;
background-image:url(paper.gif);
 width: 100%;
  border-radius:30px 30px 30px 30px;" class="card">
  <fieldset style="background-color: darkblue;
  height: 6%;width: 100%;
  border-radius: 25px 25px 0px 0px; ">
 	
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
    <a href="allmess.php" class="t1"><i class="fa fa-envelope"><span style="background: red;border-radius: 100%;font-weight: bold;margin-left:-6px;">&nbsp;<?php echo $number?>&nbsp;</span></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
  }
 	?>
 	<a href="help.php" class="t1"><i class="fa fa-question-circle"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 	 <?php
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
 <div class="form=-control">
  	<?Php
             if(isset($_SESSION['user_name'])){
				 echo '<h6 class="form-control col-lg-12" style="width:100%;">
				 You logged in as&nbsp;' .$_SESSION['user_name'].' ';
		echo '<a href="logout.php" style="float:right;">Log out</a></h6>' ;
			 }else{
				 header("location:login.php") ;
			 }

 ?>
</div>
  <form method="post" style="margin-top: -3%;"><br>
  	<input type="text" name="post" placeholder="Write your suggestion..."
    class="form-control w-100">	
  	<input type="submit" name="submit" value="Suggest" class="btn btn-info w-100">
 
  </form><br>
  <img src="science.jpg" class="card-image w-50">
  <img src="world.gif" class="card-image" style="height: 42%;width: 48%;margin-top: -72%;margin-left: 52%;">
  <img src="mtn.gif" class="card-image-bottom w-100">
  <h5 class="form-control"><center>Change profile picture</center></h5>
  <form method="POST" class="input-group" style="margin-top: -3%;" enctype="multipart/form-data">

    <input type="file" name="upload" placeholder="choose Photo" class="form-control"/>
    <button type="submit" name="change" class="form-control"><i class="fa fa-upload"/></i></button>
<?php
include("direct.php");
$i=$_SESSION['user_name'];
    if(isset($_POST['change'])){
  $filename= $_FILES["upload"]["name"];
  $tempname= $_FILES["upload"]["tmp_name"];
  $folder= "profiles/".$filename;
  move_uploaded_file($tempname,$folder);
$uu=mysqli_query($con,"UPDATE image SET picsource='$folder' WHERE user_name='$i'");
 ?>
<script>alert("Profile saved")</script>
<?php
  }
  ?>
  </form>
  <center><h3 class="form-control" style="border-radius: 0px 0px 25px 25px"><i>Powered by Ada byron</i><h3><br><br></center>

  	<!-- <?Php   
  	include("direct.php") ;
         $q1="SELECT * FROM `posts`" ;
		 $r1= mysqli_query($con, $q1) ;
		  while($row = mysqli_fetch_assoc($r1)){
			   $user_name = $row['user_name'] ;
			   $post = $row['post'] ;
			   }
        if(isset($_POST['submit'])){
	        $post = $_POST['post'] ;
			$q='INSERT INTO `posts` (`id`, `user_name`, `post`)
			 VALUES("","'.$_SESSION['user_name'].'","'.$post.'")
			';
			if(mysqli_query($con, $q)){
				echo '<h4 style="margin-top: -152%; margin-left: 25%; color: blue;"><img src="smiley.gif">your post will be seen by Adnim<h4>';

			}
        }
 
 ?> -->
</fieldset>
</div>
</body>
</html>