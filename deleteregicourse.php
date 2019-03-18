<?php
$conn = mysqli_connect('localhost','root','');
 
if(!$conn)
{
    die(mysqli_connect_error());
}
 mysqli_select_db($conn,"attedance");

$id=$_GET['id'] or die("eta ki");
$idr=$_GET['idr'] or die("eta ki");

      
     $q=mysqli_query($conn,"DELETE FROM regicourse WHERE Courseno='$id' AND Rollno=$idr")or die("kkjkjkj");
      if($q)
      {
  
           echo "<script type='text/javascript'>alert('It is deleted')</script>";
           echo "<script type='text/javascript'>window.open('showall.php?theuser=regicourse','_self')</script>";
      }


?>
 

 