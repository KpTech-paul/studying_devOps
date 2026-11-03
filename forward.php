<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome-free-5.0.9/web-fonts-with-css/css/fontawesome-all.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="icon" href="logo.png" type="image/x-icon"/>
  <?php
  session_start();
  if (isset($_SESSION['user_name'])) {

  }else{
    header("location:login.php");
  }
  ?>
	<title>users list</title>
	<style>
		.auter{
			background-image:url(paper.gif);
			width: 31%;
			height:60%;
			margin-left: 30%;
			border-radius: 30px 30px 5px 30px;
		}

#users_list{width:100%;
	padding: 0% 1%;
	height: 605px;
	overflow-y: scroll;
  overflow-x: hidden;
	border-radius: 0px 0px 0px 25px;
	z-index: 1;

	}
/*style for search bar*/
#myInput {
  background-image: url('searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
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
  margin-top: -5%;

}
.t1:hover{
background-color: #17a2b8;
}
	.profile{
    background: aliceblue;
    margin-top: -4%;
    border-radius: 0px 0px 10px 10px;
    border-style: none;
  }
.order{
  white-space: nowrap;
  width: 120px;
  text-overflow: ellipsis;
  overflow: hidden;
}
.comment{
  text-decoration: none;
  font-weight: bold;
  font-stretch: semi-condensed;
  }
	</style>

</head>
<body style="background-color: azure;">
<div class="auter">
  <fieldset style="background-color: darkblue;
  height: 6%;width: 100%; margin-top: -1.5%; margin-left:-0.2%;
  border-radius: 25px 25px 0px 0px;margin-top: 0.5%; ">
 	&nbsp;&nbsp;&nbsp;&nbsp;
 	<?php
  include("direct.php");
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
<div id="main">
<div id="users_list">
	<div id="pus">

 	<div id="pus">

 	</label>
</div>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
	<?php
include("direct.php");
$names=$_SESSION['user_name'];
$profile=mysqli_query($con,"SELECT user_name,status FROM image WHERE user_name='$names' order by user_name asc");
$n1=mysqli_fetch_assoc($profile);
$status=$n1['status'];
$nam=$n1['user_name'];
//select image that match with gotten username
$profile=mysqli_query($con,"SELECT picsource FROM image WHERE user_name='$names'");
$n1=mysqli_fetch_assoc($profile);
$image=$n1['picsource'];
?>
<fieldset class="profile">
  &nbsp;<a href="<?php echo $image?>" target='new_black'><img src="<?php echo $image?>"width="50" height="50" style="border-radius: 360px;"></a>
<span style="float: right;margin-right:65%;">
  <b><?php echo $nam; ?></b><br>
   <i style="color: green;font-weight: bold;"><?php echo $status; ?></i>
</span>
<i style="float: right;margin-right: 17%;margin-top: -5%;">Forward to...</i>
</fieldset>
<?php
//selct the request for friendship
$myf=mysqli_query($con,"SELECT * FROM friends WHERE 2nd_friend='$i' AND sign='confirmed' OR 1st_friend='$i' AND sign='confirmed'");
if (mysqli_num_rows($myf)>0) {

?>
   <div class="card" style="height: 503px;border-radius:0px 0px 0px 15px">
	<table  style="background-color: #f0f5f5;width: 100%;" id="myTable">
		<tr class='header'>
		<th></th>
    <th></th>
		<th></th>
  </tr>
  <ul class="list-group">
    <form method="POST">

    <?php
    while($get=mysqli_fetch_array($myf)){
      $id=$get['id'];
      $f1=$get['1st_friend'];
      $f2=$get['2nd_friend'];
      ?>
      
      
        <li class="list-group-item">
          <form method="POST">
      <?php
      if ($f1==$i) {
        $button="Forward".$id;
        ?>
        <i class="fa fa-clone" style="font-size: 10px;"></i><?php echo$f2;?>
        <input type="submit" name="Forward<?php echo $id;?>" Value="Forward" style="float: right;" class="btn btn-light" >
        <?php
      }else{
        $button="Forward".$id;
        ?>
        <i class="fa fa-clone" style="font-size: 10px;"></i> <?php echo $f1;?>
        <input type="submit" name="Forward<?php echo $id;?>" Value="Forward" style="float: right;" class="btn btn-light" >
        <?php
      }
      if (isset($_POST[$button])) {
      $_SESSION['myforward']=$f1;
      $receiver=$_SESSION['myforward'];
      $id=$_GET['b'];
      $nd=date("Y-m-d");
      //get time of message forward
      $q3="SELECT time(now()) as l";
    $m1=mysqli_query($con,$q3);
        $time1=mysqli_fetch_assoc($m1);
        $nt=$time1['l'];
      //find message to be forwarded
      $getmes=mysqli_query($con,"SELECT message FROM message WHERE id='$id'");
      if (mysqli_num_rows($getmes)>0) {
        $fet=mysqli_fetch_array($getmes);
        $message=$fet['message'];
        $extention=substr($message, -4);

$uu= mysqli_query($con,"UPDATE message SET timech='prev' WHERE sender='$i' AND receiver='$receiver' OR sender='$receiver' AND receiver='$i'");
if ($uu) {


if ($extention==".jpg" or $extention==".mp4" or $extention==".mp3" or $extention==".JPG" or $extention==".MP4" or $extention==".MP3") {
    $q='INSERT INTO `message` (`id`, `message`, `sender`,`receiver`,`date1`,`time1`,`status`,`timech`,`type`)
      VALUES("", "'.$message.'", "'.$i.'","'.$receiver.'","'.$nd.'","'.$nt.'","unread","last","photo")
      ';
        }else{
  $q='INSERT INTO `message` (`id`, `message`, `sender`,`receiver`,`date1`,`time1`,`status`,`timech`,`type`)
      VALUES("", "'.$message.'", "'.$i.'","'.$receiver.'","'.$nd.'","'.$nt.'","unread","last","text")
      ';
        }


if (mysqli_query($con,$q)) {
  ?>
  <script>alert("Sent")</script>
 <?php 
}
      }
      }}
      ?>
    </form>
    </li>
      <?php
    }
    }
    ?>
    </form>
  </ul>
      </table>
    </div>
</div>
</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>