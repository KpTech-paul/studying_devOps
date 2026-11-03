<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">
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
    position: sticky;
    position: -webkit-sticky;
    top: 0;
    box-shadow: 0px  1px 15px -5px darkblue;
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
$profile=mysqli_query($con,"SELECT user_name,status,picsource FROM image WHERE user_name='$names' order by user_name asc");
if(mysqli_num_rows($profile)){
$n1=mysqli_fetch_assoc($profile);
$status=$n1['status'];
$nam=$n1['user_name'];
$image=$n1['picsource'];
?>
<fieldset class="profile">
  &nbsp;<a href="<?php echo $image?>" target='new_black'><img src="<?php echo $image?>"width="50" height="50" style="border-radius: 360px;"></a>
<span style="float: right;margin-right:30%;">
  <b><?php echo $nam; ?></b><br>
   <i style="color: green;font-weight: bold;"><?php echo $status; ?></i>
</span>
</fieldset>
<?php
}else{
  echo "we do not know you";
}
//selct the request for friendship
$myf=mysqli_query($con,"SELECT * FROM friends WHERE 2nd_friend='$i' and sign='tending'");
if (mysqli_num_rows($myf)>0) {

?>
<fieldset class="alert alert-info" style="overflow-y: auto;height: 80px;">
  <table>
    <tr>
    <th></th>
    <th></th>
  </tr>
<?php
while($getf=mysqli_fetch_array($myf)){
$num=$getf['1st_friend'];
$id=$getf['id'];
?>
<tr>
  <td>
<b><?php echo $num?></b> set a request 
</td>
<td>
<a href="agree.php?b=<?php echo $id;?>" class="comment" style="text-decoration: none">Confirm</a>&nbsp;&nbsp;&nbsp;<a href="Delete.php?b=<?php echo $id;?>" class="comment" style="text-decoration: none;">Delete</a></td>
</tr>
<?php
}}
 ?>
</table>
</fieldset>
	<table  style="background-color: #f0f5f5;border-radius: 15px 15px 0px 0px;" id="myTable">
		<tr class='header'>
		<th style="width: 55%;background-color: darkblue;color: white;font-weight: bold;
    border-radius: 15px 0px 0px 0px;">Names</th>
    <th style="width: 90%;background-color: darkblue;color: white;font-weight: bold;
    border-radius: 0px 0px 0px 0px;"></th>
		<th style="background-color: darkblue;color: white;font-weight: bold;
    border-radius: 0px 15px 0px 0px;">Profile</th></tr>
    <?php
    $select=mysqli_query($con,"SELECT * FROM user where user_name!='$names'");
      //all users of system
      if (mysqli_num_rows($select)>0) {
       while( $take=mysqli_fetch_array($select)){
        $user_name=$take['user_name'];
      //get user picture of profile
    $getprof=mysqli_query($con,"SELECT id,picsource,status FROM image where user_name='$user_name'");
    if (mysqli_num_rows($getprof)>0) {
$getpro=mysqli_fetch_array($getprof);
  $id=$getpro['id'];
  $image=$getpro['picsource'];
  $stat=$getpro['status'];
 
  $selectag=mysqli_query($con,"SELECT * FROM friends WHERE 1st_friend='$user_name' AND 2nd_friend='$names' OR 1st_friend='$names' AND 2nd_friend='$user_name' ORDER BY id DESC");
  if (mysqli_num_rows($selectag)>0) {
  }else{
    ?>
<tr>
  <td>
   <span><b><?php echo $user_name;?></b>
   </span>
    </td>
    <td><a href="add.php?b=<?php echo $id; ?>" style="margin-left: 40%;text-decoration: none;
    font-weight: bold;">Add friend</a></td>
    <td>
      <a href="<?php echo $image;?>" target="new_black"><img src="<?php echo $image;?>" width="50" height="50" style="border-radius: 360px;"></a>
    </td>
</tr>
<?php

  }

}}}
    ?>
      </table>
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