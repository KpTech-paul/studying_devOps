<script>
	var a;
if(window.confirm("You will need to send friend request again!\nClick Ok, if want to delete")){
	a="yes";
}else{
	a="no";
}
if (a=="yes") {
document.write("<?php echo 'Yes'?>");
}else{
	document.write("<?php echo 'no'?>");
}
</script>