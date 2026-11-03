<?php
include("direct.php");
$select=mysqli_query($con,"SELECT * FROM image");
if (mysqli_num_rows($select)>0) {
	while ($fetch=mysqli_fetch_array($select)) {
		$img=$fetch['picsource'];
		$b=substr($img,-4);
		echo "$b<br>";
	}
}
?>