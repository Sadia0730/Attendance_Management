<?php
$conn = mysqli_connect('localhost','root','');
 
if(!$conn)
{
    die(mysqli_connect_error());
}
 mysqli_select_db($conn,"attedance");

echo "string";

$id=$_GET['id'] or die("eta ki");
echo $id;

  echo "ami if a";
     
      $q=mysqli_query($conn,"DELETE FROM teacher WHERE email='$id'")or die("kkjkjkj");
      if($q)
      {
  
           echo "<script type='text/javascript'>alert('It is deleted')</script>";
           echo "<script type='text/javascript'>window.open('showall.php','_self')</script>";
      }



?>
 

 