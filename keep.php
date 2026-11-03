<?Php
//search for friendship
    $getfr=mysqli_query($con,"SELECT * FROM friends WHERE 1st_friend='$names' or 2nd_friend='$names'");
    if (mysqli_num_rows($getfr)>0) {
    while($myfr=mysqli_fetch_array($getfr)){
      $st=$myfr['1st_friend'];
      $nd=$myfr['2nd_friend'];
//find remained users which are not your friends
if ($st==$names||$nd==$names) {
  $remain=mysqli_query($con,"SELECT * FROM user WHERE user_name!='$st' OR user_name!='$nd'");
}
      
      if (mysqli_num_rows($remain)>0) {
       while( $take=mysqli_fetch_array($remain)){
        $user_name=$take['user_name'];
      //get user picture of profile
$getprof=mysqli_query($con,"SELECT id,picsource,status FROM image where user_name='$user_name'");
if (mysqli_num_rows($getprof)>0) {
while($getpro=mysqli_fetch_array($getprof)){
  $id=$getpro['id'];
  $image=$getpro['picsource'];
  $stat=$getpro['status'];


?>
<tr>
  <td>
   <span><b><?php echo $user_name;?></b>
    <a href="add.php?b=<?php echo $id; ?>" style="margin-left: 40%;text-decoration: none;
    font-weight: bold;">Add friend</a>
   </span>
    </td>
    <td>
      <a href="<?php echo $image;?>" target="new_black"><img src="<?php echo $image;?>" width="50" height="50" style="border-radius: 360px;"></a>
    </td>
</tr>
<?php
}
}
      }
    }}

}else{
 //when user is the newest to the chat there is no friendship
      $remain=mysqli_query($con,"SELECT * FROM user where user_name!='$names'");
      if (mysqli_num_rows($remain)>0) {
       while($take=mysqli_fetch_array($remain)){
        $user_name=$take['user_name'];
      //get user picture of profile
$getprof=mysqli_query($con,"SELECT id,picsource,status FROM image where user_name='$user_name'");
if (mysqli_num_rows($getprof)>0) {
while($getpro=mysqli_fetch_array($getprof)){
  $id=$getpro['id'];
  $image=$getpro['picsource'];
  $stat=$getpro['status'];

?>
<tr>
  <td>
   <span><b><?php echo $user_name;?></b>
    <a href="add.php?b=<?php echo $id; ?>" style="float: right;margin-right:5%;text-decoration: none;
    font-weight: bold;">Add friend</a>
   </span>
    </td>
    <td>
      <a href="<?php echo $image;?>" target="new_black"><img src="<?php echo $image;?>" width="50" height="50" style="border-radius: 360px;"></a>
    </td>
</tr>
<?php
}

}
      }
    }

}
?>