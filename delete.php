<?php
include("direct.php");
$id=$_GET['b'];
$DELETE=mysqli_query($con,"DELETE FROM friends WHERE id='$id'");
header("location:users.php");
?>