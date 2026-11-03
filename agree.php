<?php
session_start();
include("direct.php");
$id=$_GET['b'];
$i=$_SESSION['user_name'];
$c=mysqli_query($con,"SELECT 1st_friend from friends where id='$id'");
$b=mysqli_fetch_array($c);
$o=$b['1st_friend'];
$agree=mysqli_query($con,"UPDATE friends SET sign='confirmed' where id='$id'");
$q7="SELECT date(now()) as k";
    $m=mysqli_query($con,$q7);
    $date=mysqli_fetch_assoc($m);
    $nd=$date['k'];
    $q3="SELECT time(now()) as l";
    $m1=mysqli_query($con,$q3);
    $time1=mysqli_fetch_assoc($m1);
    $nt=$time1['l'];
$notify=mysqli_query($con,"INSERT INTO message(id,message,sender,receiver,date1,time1,status,timech,type) VALUES('','Now we can chat!!!','$i','$o','$nd','$nt','unread','last','notify')");
if ($agree && $notify) {
	header("Location:allmess.php");
}
?>