<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="fontawesome-free-5.15.4-web/css/all.css">
  <link rel="icon" href="logo.png" type="image/x-icon"/>
  <?php
  session_start();
  if (isset($_SESSION['user_name'])) {
  }else{
    header("location:login.php");
  }
  ?>
  <title>R-chat-Messages</title>
  <style>
    .auter{
      background-image:url(paper.gif);
      width: 32%;
      height:60%;
      margin-left: 30%;
      border-radius: 30px 30px 5px 30px;
     
    }

#users_list{width:98%;
  padding: 0% 1%;
  height: 580px;
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
  width: 83%;
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
.order{
  white-space: nowrap;
  width: 120px;
  text-overflow: ellipsis;
  overflow: hidden;
}
    
  </style>
</head>
<body style="background-color: azure;">
<div class="auter">

  <fieldset style="background-color: darkblue;
  height: 4%;width: 93.5%; margin-top: -1.5%; margin-left:-0.2%;
  border-radius: 25px 25px 0px 0px;">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <?php
  include("direct.php");
  $i=$_SESSION['user_name'];
  $hh=mysqli_query($con,"SELECT id FROM message WHERE receiver='$i' AND status='unread' GROUP BY sender");
         $number=mysqli_num_rows($hh);
  ?>
  <center>
    <a href="home.php" class="t1"><i class="fa fa-home"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
  </fieldset>
<div id="main">
<div id="users_list">
  <div id="pus">

  <div id="pus">

  </label>
</div>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for message..." title="Type in a name">
  
  <table  style="background-color: #f0f5f5;border-radius: 15px 15px 0px 0px;" id="myTable">
    <tr class='header'>
    <th style="width: 90%;background-color: darkblue;color: white;font-weight: bold;
    border-radius: 15px 0px 0px 0px;">Message</th>
    <th style="background-color: darkblue;color: white;font-weight: bold;
    border-radius: 0px 15px 0px 0px;">Profile</th></tr>

<?Php 
 include("direct.php") ;
        $i=$_SESSION['user_name'];
     //get almessage for you
        $select=mysqli_query($con,"SELECT * FROM message WHERE sender='$i' and timech='last' or receiver='$i'  and timech='last' ORDER BY id DESC");
        if (mysqli_num_rows($select)>0) {
         while ($fetch=mysqli_fetch_array($select)) {
           $sender=$fetch['sender'];
           $receiver=$fetch['receiver'];
           $time=$fetch['time1'];
           $date=$fetch['date1'];
          //find message and all other details for last message sent or received
          $select1=mysqli_query($con,"SELECT * FROM message WHERE sender='$sender' AND receiver='$receiver' AND timech='last' OR sender='$receiver' AND receiver='$sender' AND timech='last'");
          $fetch1=mysqli_fetch_array($select1);
           $san=$fetch1['sender'];
           $rec=$fetch1['receiver'];
           $mes=$fetch1['message'];
           $datee=$fetch1['date1'];
           $timee=$fetch1['time1'];
           $status=$fetch1['status'];
           $type=$fetch1['type'];
            ?>
            <tr>
            <td>
              <?php 
               if ($san==$i) {
            //get picture of receiver
          $q1="SELECT * FROM `image` WHERE user_name='$rec'";

               }else{
                //get picture of sender
                $q1="SELECT * FROM `image` WHERE user_name='$san'";
               } 

          $r1= mysqli_query($con, $q1) ;
          $row = mysqli_fetch_assoc($r1);
          $id=$row['id'];
          $picsource = $row['picsource'] ;
          $user_name = $row['user_name'] ;
          $line=$row['status'] ;
               ?><a href='index.php?b=<?php echo $id; ?>' style='text-decoration:none; color:black;
               font-weight:bold;'>
                 <?php
                 if ($san==$i) {
         $hh=mysqli_query($con,"SELECT count(id) AS kep FROM message WHERE sender='$rec' AND receiver='$i' AND status='unread'");
         $ro=mysqli_fetch_assoc($hh);
         $number=$ro['kep'];
//CHECK STATUS ONLINE /OFFLINE
if ($line=="Online") {
  echo "<i class='fa fa-circle' style='font-size:10px;color:darkgreen;float:right; margin-right:3%;margin-top:8%;'>Online</i>";
}else{//off line
}

                echo "$rec";

               }else{
          $hh=mysqli_query($con,"SELECT count(id) AS kep FROM message WHERE sender='$san' AND receiver='$i' AND status='unread'");
         $ro=mysqli_fetch_assoc($hh);
         $number=$ro['kep'];
//CHECK STATUS ONLINE /OFFLINE
if ($line=="Online") {
  echo "<i class='fa fa-circle' style='font-size:10px;color:darkgreen;float:right; margin-right:3%;margin-top:8%;'>Online</i>";
}else{//off line
}
                echo "$san";
               } 
          if (empty($number)) {
            //no unread message
          }else{
            
          ?><i style="color: red;font-weight: bold;"><?php
            
           echo ' ('.$number.')';
           ?></i> <?php
           
          }
                 ?>
               </a>
               <div class="order"><i><?php echo $mes; ?></i></div><br>
               <i><?php echo $datee." ".$timee;?></i>
            </td>
            <td>
              <a href="<?php echo $picsource;?>" target='new_black'><img src="<?php echo $picsource;?>" height='50' width='50' style='border-radius:360% ;'/></a>
            </td>
          </tr>
            <?php
         }
        }
        ?></table>
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