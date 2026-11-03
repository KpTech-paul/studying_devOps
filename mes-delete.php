<?php
session_start();
include("direct.php");
$id=$_GET['b'];
$prev=$_SESSION['useid'];
$select=mysqli_query($con,"SELECT * FROM message WHERE id='$id'");
$fetch=mysqli_fetch_array($select);
$sender=$fetch['sender'];
$receiver=$fetch['receiver'];
$up=mysqli_query($con,"DELETE FROM message WHERE id='$id'");

$getlast=mysqli_query($con,"SELECT * FROM message where sender='$sender' AND receiver='$receiver' OR sender='$receiver' AND receiver='$sender' ORDER BY id desc");
if (mysqli_num_rows($getlast)>0) {
$fetch1=mysqli_fetch_array($getlast);
$lastid=$fetch1['id'];
$message=$fetch1['message'];
$update=mysqli_query($con,"UPDATE message SET timech='last' WHERE id='$lastid'");
if ($update) {
	header("location:index.php?b=$prev");
}
}else{
	$up1=mysqli_query($con,"DELETE FROM friends WHERE 1st_friend='$sender' AND 2nd_friend='$receiver' OR 1st_friend='$receiver' AND 2nd_friend='$sender'");
	header("location:index.php?b=$prev");
	}


?>