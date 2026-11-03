<!DOCTYPE html>
<html>
<head>
	<?Php  session_start();
	if (isset($_SESSION['user_name'])) {
  }else{
  	header("location:login.php");
  }
  $_SESSION['useid']=$_GET['b'];
  $rell=$_SESSION['useid'];
	?>
	 <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">
	<link rel="icon" href="logo.png" type="image/x-icon"/>
	<title>R-chat-write</title>
	<style>
		.auter{
			background-image:url(paper.gif);
			width: 32%;
			height:60%;
			margin-left: 30%;
			border-radius: 30px 30px 30px 30px;
		}

#message_area{width:98%;
	padding: 0% 1%;
	
	height: 510px;
	overflow-y: scroll;

	}
	p{
		 border-radius: 18px;             
		 text-align:center;
	}
.sender{
	margin-top: -5%;
	min-width: 50%;
	float: left;
	font-weight: bold;
	border-style: none;
}
.receiver{
	margin-top: -5%;
	min-width: 50%;
	float: right;
	font-weight: bold;
	border-style: none;
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
  margin-top: -5%;

}
.t1:hover{
background-color: #17a2b8;
}
.profile{
	width: 94%;
	margin-left: 0.02%;
    background: aliceblue;
    margin-top: -4%;
    border-radius: 0px 0px 0px 10px;
    border-style: none;
  }
 .form-control {
  display: block;
  width: 100%;
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
.form-inline {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-flow: row wrap;
  flex-flow: row wrap;
  -ms-flex-align: center;
  align-items: center;
}

.form-inline .form-check {
  width: 100%;
}

@media (min-width: 576px) {
  .form-inline label {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    margin-bottom: 0;
  }
  .form-inline .form-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    -ms-flex-flow: row wrap;
    flex-flow: row wrap;
    -ms-flex-align: center;
    align-items: center;
    margin-bottom: 0;
  }
  .form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle;
  }
  .form-inline .form-control-plaintext {
    display: inline-block;
  }
  .form-inline .input-group,
  .form-inline .custom-select {
    width: auto;
  }
  .form-inline .form-check {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: auto;
    padding-left: 0;
  }
  .form-inline .form-check-input {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0;
    margin-top: 0;
    margin-right: 0.25rem;
    margin-left: 0;
  }
  .form-inline .custom-control {
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
  }
  .form-inline .custom-control-label {
    margin-bottom: 0;
  }
}
	</style>
</head>
<body style="background-color: azure;">
<div class="auter">

  <fieldset style="background-color: darkblue;
  height: 6%;width: 93%; margin-top: -1.5%; margin-left:0%;
  border-radius: 25px 25px 0px 0px;align-content: center;">
 	&nbsp;&nbsp;&nbsp;&nbsp;
  <?php
  include("direct.php");
  $i=$_SESSION['user_name'];
  $hh=mysqli_query($con,"SELECT id FROM message WHERE receiver='$i' AND status='unread' GROUP BY sender");
  $number=mysqli_num_rows($hh);
  ?>
 	<center><a class="t1" href="home.php"><i class="fa fa-home"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
 	<a class="t1" href="help.php"><i class="fa fa-question-circle"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
  <br></fieldset>
  
  <?php
  ?>
  <p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
  include("direct.php");
  $pro="SELECT * FROM `image` WHERE id='$id'";
  $pr1=mysqli_query($con,$pro);
  $rm=mysqli_fetch_assoc($pr1);
  $names=$rm['user_name'];
  $status=$rm['status'];
  $image=$rm['picsource'];
  if ($status=="Offline") {
  	?>
  	<fieldset class="profile">
  &nbsp;
<a href="<?php echo $image?>"><img src="<?php echo $image?>"width="50" height="50" style="border-radius: 360px;"></a>
<span style="float: right;margin-right:30%;">
  <b><?php echo $names; ?></b><br>
   <i style="color: red;font-weight: bold;"><?php echo $status; ?></i>
</span>
</fieldset>
<?php
  }else if ($status=="Online") {
  	?>
  	<fieldset class="profile">
  &nbsp;
<a href="<?php echo $image?>"><img src="<?php echo $image?>"width="50" height="50" style="border-radius: 360px;"></a>
<span style="float: right;margin-right:30%;">
  <b><?php echo $names; ?></b><br>
   <i style="color: green;font-weight: bold;"><?php echo $status; ?></i>
</span>
</fieldset>
<?php
  }else{
  ?>
  <fieldset class="profile">
  &nbsp;
<a href="<?php echo $image?>"><img src="<?php echo $image?>"width="50" height="50" style="border-radius: 360px;"></a>
<span style="float: right;margin-right:30%;">
  <b><?php echo $names; ?></b><br>
</span>
</fieldset>
<?php
}
?>
<div id="main">
<div id="message_area">
 <?Php
 include("direct.php") ;
 if(isset($_POST['submit'])){
  $mess=$_POST['message'];
    ?><p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
    $filename= $_FILES["upload"]["name"];
  $tempname= $_FILES["upload"]["tmp_name"];
  $folder= "Added/".$filename;
  $i=$_SESSION['user_name'];
  if (empty($mess) && !empty($filename)) {
    ?><p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
    $filename= $_FILES["upload"]["name"];
  $tempname= $_FILES["upload"]["tmp_name"];
  $folder= "Added/".$filename;
  $i=$_SESSION['user_name'];
  move_uploaded_file($tempname,$folder);
  $q2="SELECT user_name FROM `image` WHERE id='$id'";
    $j1=mysqli_query($con,$q2);
        $row1=mysqli_fetch_assoc($j1);
        $o=$row1['user_name'];
    $q7="SELECT date(now()) as k";
    $m=mysqli_query($con,$q7);
        $date=mysqli_fetch_assoc($m);
        $nd=$date['k'];
    $q3="SELECT time(now()) as l";
    $m1=mysqli_query($con,$q3);
        $time1=mysqli_fetch_assoc($m1);
        $nt=$time1['l'];
$images=mysqli_query($con,"INSERT INTO message(id,message,sender,receiver,date1,time1,status,timech,type) VALUES('','$folder','$i','$o','$nd','$nt','unread','last','photo')");
  }else if (!empty($mess) && empty($filename)) {
   
  
 			?><p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
		$q2="SELECT user_name FROM `image` WHERE id='$id'";
		$j1=mysqli_query($con,$q2);
        $row1=mysqli_fetch_assoc($j1);
        $o=$row1['user_name'];
        $q2="SELECT date(now()) as k";
		$m=mysqli_query($con,$q2);
        $date=mysqli_fetch_assoc($m);
        $nd=$date['k'];
        $q3="SELECT time(now()) as l";
		$m1=mysqli_query($con,$q3);
        $time1=mysqli_fetch_assoc($m1);
        $nt=$time1['l'];
	        $message = $_POST['message'] ;
			$q='INSERT INTO `message` (`id`, `message`, `sender`,`receiver`,`date1`,`time1`,`status`,`timech`,`type`)
			VALUES("", "'.$message.'", "'.$_SESSION['user_name'].'","'.$o.'","'.$nd.'","'.$nt.'","unread","last","text")
			';
		$new=$_SESSION['user_name'];
			$uu=mysqli_query($con,"UPDATE message SET timech='prev' WHERE sender='$new' AND receiver='$o' OR sender='$o' AND receiver='$new'");
			if(mysqli_query($con, $q)){
			$i=$_SESSION['user_name'];
		$q1="SELECT * FROM `message` WHERE receiver='$i' AND sender='$o' ORDER BY ID DESC" ;
		 $r1= mysqli_query($con, $q1) ;
		  while($row = mysqli_fetch_assoc($r1)){ 
		  	   $message = $row['message'];
			   $user_name = $row['sender'];
			   $u=$_SESSION['user_name'];
			}}
        }}
        $i=$_SESSION['user_name'];
       ?><p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
		$q2="SELECT user_name FROM `image` WHERE id='$id'";
		$j1=mysqli_query($con,$q2);
        $row1=mysqli_fetch_assoc($j1);
        $o=$row1['user_name'];
         $q1="SELECT * FROM `message` WHERE receiver='$i' AND sender='$o' OR receiver='$o' AND sender='$i' ORDER BY ID DESC" ;
         ?><p style="display: none;"><?php $p=$_GET['b'];?></p><?php
$fk=mysqli_query($con,"UPDATE message SET status='read' WHERE receiver='$i' AND sender='$o'");
		 $r1= mysqli_query($con, $q1) ;
		 $u=mysqli_num_rows($r1);
		  while($row = mysqli_fetch_assoc($r1)){ 
           $id=$row['id'];
		  	   $message = $row['message'];
           $extention=substr($message, -4);
			   $user_name = $row['sender'];
			   $u=$_SESSION['user_name'];
			   $type=$row['type'];
			   if ($type=="text" or $type=="notify") {
			   if ($user_name==$u) {
$s1=mysqli_query($con,"SELECT picsource FROM image WHERE user_name='$u'");
$s1=mysqli_fetch_array($s1);
$pr=$s1['picsource'];
			   	?>
			   	<fieldset class="sender"><br><br>
	<a href="<?php echo $pr; ?>"><img width="30" height="30" src="<?php echo $pr; ?>" style="margin-top: -100%;margin-right: 90%;border-radius: 360px;"></a>
	<p style="margin-left: 10%;margin-top: -4%;
background: white;color: black;text-align: center;
	" class="row"><?php echo $message; ?><br>
  </p>
  <hr style="opacity: 0%;margin-top: -5%;display:none;">
  <a href="mes-delete.php?b=<?php echo $id;?>"><i class="fa fa-trash" style="font-size: 11px;float: right;margin-right: 5%; padding: 1px" ></i></a>
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-right: 5%; padding: 1px" ></i></a>
  </p>
			   	</fieldset>
			   	<?php
			   }else if($user_name!=$u){
$s1=mysqli_query($con,"SELECT picsource FROM image WHERE user_name='$user_name'");
$s1=mysqli_fetch_array($s1);
$pr=$s1['picsource'];
				?> 
			   	<fieldset class="receiver"><br><br>
	<a href="<?php echo $pr; ?>"><img width="30" height="30" src="<?php echo $pr; ?>" style="margin-top: -100%;margin-left: 90%;border-radius: 360px;"></a>
	<p style="margin-right: 10%;margin-top: -2%;
background: dodgerblue;color:white;font-weight:bold;text-align: center;
	"><span><?php echo $message; ?></span></p><br>
  <hr style="margin-top: -16%;opacity: 0%;display: none;">
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-right: 13%;margin-top: -15%;" title="share" ></i></a><br>
			   	</fieldset>
			   	<?php
			   }
		  	}else{
		 if ($user_name==$u) {
$s1=mysqli_query($con,"SELECT picsource FROM image WHERE user_name='$u'");
$s1=mysqli_fetch_array($s1);
$pr=$s1['picsource'];
			   	?>
			   	<fieldset class="sender"><br><br>
	<a href="<?php echo $pr; ?>" target="new_black"><img width="30" height="30" src="<?php echo $pr; ?>" style="margin-top: -100%;margin-right: 90%;border-radius: 360px;"></a>
  <?php
if ($extention==".mp4") {
  ?>
  <a href="<?php echo $message ?>" target="new_black"><video style="margin-left: 10%;margin-top: -4%;border-radius: 8%;
background: white;color: black;text-align: center;
  " src="<?php echo $message ?>" width="140" height="150" controls></video></a>
  <hr style="opacity: 0%;margin-top: -5%;display:none;">
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-right: 45%;margin-top: -15%;" title="share" ></i></a><br>
  <a href="mes-delete.php?b=<?php echo $id;?>"><i class="fa fa-trash" style="font-size: 11px;float: right;margin-right: 45%;margin-top: -10%;" title="remove" ></i></a>
  <?php
}else if($extention==".mp3"){
  ?>
<a href="<?php echo $message ?>" target="new_black"><audio style="margin-left: 10%;margin-top: -4%;border-radius: 8%;
background: white;color: black;text-align: center;
  " src="<?php echo $message ?>" width="140" height="150" controls></audio></a>
  <hr style="opacity: 0%;margin-top: -2%;display:none;">
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="margin-left: 75%;font-size:11px;" title="share" ></i></a>
  <a href="mes-delete.php?b=<?php echo $id;?>"><i class="fa fa-trash" style="margin-left: 5%;font-size:11px;" title="remove" ></i></a>
  <?php

}else{
  ?>
	<a href="<?php echo $message ?>" target="new_black"><img style="margin-left: 10%;margin-top: -4%;border-radius: 8%;
background: white;color: black;text-align: center;
	" src="<?php echo $message ?>" width="140" height="150"></a>
  <hr style="opacity: 0%;margin-top: -5%;display:none;">
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-top: 42%;margin-right: 5%;" title="share" ></i></a>
  <a href="mes-delete.php?b=<?php echo $id;?>"><i class="fa fa-trash" style="font-size: 11px;float: right;margin-top: 60%;" title="remove" ></i></a>
			   	</fieldset>
			   	<?php
         }
			   }else if($user_name!=$u){
$s1=mysqli_query($con,"SELECT picsource FROM image WHERE user_name='$user_name'");
$s1=mysqli_fetch_array($s1);
$pr=$s1['picsource'];
				?>
			   	<fieldset class="receiver"><br><br>
	<a href="<?php echo $pr; ?>" target="new_black"><img width="30" height="30" src="<?php echo $pr; ?>" style="margin-top: -100%;margin-left: 90%;border-radius: 360px;"></a>
  <?php
if ($extention==".mp4") {
  ?>
<a href="<?php echo $message ?>" target="new_black"><video style="float:right;margin-right:19%;margin-top: -2%;border-radius: 8%;
background: dodgerblue;color:white;font-weight:bold;text-align: center;
  " src="<?php echo $message ?>" width="140" height="150"></video></a>
<a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-right: -45%;margin-top: 30%;" title="share" ></i></a>
  <?php
}else if($extention==".mp3"){
?>
<a href="<?php echo $message ?>" target="new_black"><audio style="margin-left: 5%;border-radius: 8%;
background: white;color: black;text-align: center;
  " src="<?php echo $message ?>" width="140" height="150" controls></audio></a>
   <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="margin-left: 85%;font-size:11px;" title="share" ></i></a>
  <?php
}else{
  ?>
	<a href="<?php echo $message ?>" target="new_black"><img style="margin-right: 10%;margin-top: -2%;border-radius: 8%;
background: dodgerblue;color:white;font-weight:bold;text-align: center;
	" src="<?php echo $message ?>" width="140" height="150"></a>
  <a href="forward.php?b=<?php echo $id;?>"><i class="fa fa-share-square" style="font-size: 11px;float: right;margin-right: 16%;margin-top: -10%;" title="share" ></i></a><br>
			   	</fieldset>
			   	<?php
			   } 		
		  	}}}
 ?>
</div>
<form method="post" style="margin-top: 0%;" class="form-inline flex-shrink" enctype="multipart/form-data">
  		<textarea  type="text" name="message" placeholder="Type your message....." class="form-control flex-shrink" style="width: 75%;" /></textarea>
      <button type="submit" name="submit" class="form-control flex-shrink" style="font-size: 147%;"/><i class=" fa fa-paper-plane"></i></button>
      <input type="file" name="upload"class="form-control flex-shrink" style="width: 100%;">
 
  	</form>
  <?php
 include("direct.php");
    if(isset($_POST['addpic'])){
    ?><p style="display: none;"><?php $id=$_GET['b']; ?></p><?php
    $filename= $_FILES["upload"]["name"];
	$tempname= $_FILES["upload"]["tmp_name"];
	$folder= "Added/".$filename;
	$i=$_SESSION['user_name'];
	move_uploaded_file($tempname,$folder);
	$q2="SELECT user_name FROM `image` WHERE id='$id'";
		$j1=mysqli_query($con,$q2);
        $row1=mysqli_fetch_assoc($j1);
        $o=$row1['user_name'];
    $q7="SELECT date(now()) as k";
		$m=mysqli_query($con,$q7);
        $date=mysqli_fetch_assoc($m);
        $nd=$date['k'];
    $q3="SELECT time(now()) as l";
		$m1=mysqli_query($con,$q3);
        $time1=mysqli_fetch_assoc($m1);
        $nt=$time1['l'];
$images=mysqli_query($con,"INSERT INTO message(id,message,sender,receiver,date1,time1,status,timech,type) VALUES('','$folder','$i','$o','$nd','$nt','unread','last','text')");
}
?>
  	 </form>
</div>
</div>
</body>
</html>