<?php
$kk="messa";
setcookie($kk,"Remeber to logout when you leave");
if (isset($_COOKIE[$kk])) {
?>
<script>alert("Hy i'm Paul: <?php echo $_COOKIE[$kk];?>!")</script>
<?php	
}

?>