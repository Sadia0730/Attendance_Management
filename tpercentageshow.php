 <?php
session_start();
$roll = $_SESSION['un'];
    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
            mysqli_select_db($con,"attedance");

            $Courseno=$_GET['Courseno'];
            $sql_query= "SELECT * FROM schedule WHERE Courseno = '$Courseno'";

                $result=mysqli_query($con,$sql_query);
if($result){
                $num=mysqli_num_rows($result);
if($num){
$sql_query="SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
$resu=mysqli_query($con,$sql_query);
if($resu){
$count=mysqli_num_rows($resu);
if($count>0)
            {
              while ($row=mysqli_fetch_array($resu)) {
               $roll=$row['Rollno'];
                $sql= "SELECT * FROM track WHERE Courseno = '$Courseno' AND Rollno ='$roll'";
                
                $res=mysqli_query($con,$sql);
                if($res)
                {
                          $num2=mysqli_num_rows($res) or die("You were not present in any class..");
                            if($num2)
                            {
                                      $percentage=($num2/$num)*100;
                                      $sql="UPDATE regicourse SET status = '$percentage'  WHERE Rollno='$roll' AND Courseno = '$Courseno'" or die("sdsds");
                                       mysqli_query($con,$sql) or die("query");
                            }
                           else{  echo "you were not present in the class";  }
               }
               else {  echo "you were not present in the class";  }
              }
}
else{ echo  "No registration yet..."; }  
}
else{ echo  "No registration yet..."; }        
}
else{ echo  "No class has been taken..."; }
}
else{ echo  "No class has been taken..."; }
   

        

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script> 
        $(function(){
             $("#header").load("header.php"); 
             $("#footer").load("footer.php"); 
            });
    </script>
    <style type="text/css">
    #header
{
    height: 30px;
    width: 100%;
    position: absolute;
    top: 0px;

}
.main
{
    height: 1500px;
    width: 100%;
    position: relative;
    top: 100px;
    background-color:; 
}
h1
{
  color: white;
}
#content
{
width: 100%;
height: 50%;
position: absolute;
top: 80px;
padding: 100px;
}
.table
{ 
font-weight: bold;
font: 20px;
padding: 40px;
}
#btn
{
  width: 100%;
  height: 35px;
  background-color: #d0183b;
  font-weight: bold;
  color: white;

}
#footer
{
  position: relative;
 bottom: 0px;
}

</style>

</head>
<body>
  <div id="header"></div>
  <div class="main">

    <div class="table" >
<?php
  $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
                
                $Courseno=$_GET['Courseno'];
                echo "<h1 style='color:black'> Attendance Of all students of Course : ";
                echo $Courseno; 
                echo "</h1><hr>";
                $sql_query= "SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
                
                $result=mysqli_query($con,$sql_query);
                $num=mysqli_num_rows($result);
                
                if(mysqli_num_rows($result) > 0)
                {
                     $x=1;
        
        
        
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Roll Number</th>";
        echo "<th>percentage</th>";
        echo "</tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                $roll=$row['Rollno'];
                $percentage=$row['status'];
                echo "<tr>";
                echo "<td>$roll</td>";
                echo "<td>$percentage";
                echo "</td>";
                echo "</tr>";
               
      
          }
          echo "</tbody></table></div>";
       //   echo "<input type='button' name='submit' value='submit' id='btn'>";
         
      }
                else{
                  echo "NO student here";
                }
                
                mysqli_close($con);
            
?>


</div>
</div>
</body>
</html>

 
  
  



<!--<?php
/*session_start();
$roll = $_SESSION['un'];
    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
            mysqli_select_db($con,"attedance");

            $Courseno=$_GET['Courseno'];
            $sql_query= "SELECT * FROM schedule WHERE Courseno = '$Courseno'" or die("kkkk");
                
                $result=mysqli_query($con,$sql_query) or die("lll");
                $num=mysqli_num_rows($result) or die("mmm");

$sql_query="SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
$resu=mysqli_query($con,$sql_query) or die("You were not registered in this class..");
$count=mysqli_num_rows($resu) or die("You were not present in any class..");
if($count>0)
            {
              while ($row=mysqli_fetch_array($resu)) {
               $roll=$row['Rollno'];
                $sql= "SELECT * FROM track WHERE Courseno = '$Courseno' AND Rollno ='$roll'" or die("You were not present in any class..");
                
                $res=mysqli_query($con,$sql) or die("You were not present in any class..");
                $num2=mysqli_num_rows($res) or die("You were not present in any class..");

                $percentage=($num2/$num)*100;
                $sql="UPDATE regicourse SET status = '$percentage' WHERE Rollno='$roll' AND Courseno = '$Courseno'" or die("sdsds");
                mysqli_query($con,$sql) or die("query");
              }
               
        
            }
         

   

        

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script> 
        $(function(){
             $("#header").load("header.php"); 
             $("#footer").load("footer.php"); 
            });
    </script>
    <style type="text/css">
    #header
{
    height: 30px;
    width: 100%;
    position: absolute;
    top: 0px;

}
.main
{
    height: 1500px;
    width: 100%;
    position: relative;
    top: 100px;
    background-color:; 
}
h1
{
  color: white;
}
#content
{
width: 100%;
height: 50%;
position: absolute;
top: 80px;
padding: 100px;
}
.table
{ 
font-weight: bold;
font: 20px;
padding: 40px;
}
#btn
{
  width: 100%;
  height: 35px;
  background-color: #d0183b;
  font-weight: bold;
  color: white;

}
#footer
{
  position: relative;
 bottom: 0px;
}

</style>

</head>
<body>
  <div id="header"></div>
  <div class="main">

    <div class="table" >
<?php
  $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
                
                $Courseno=$_GET['Courseno'];
                echo "<h1 style='color:black'> Attendance Of all students of Course : ";
                echo $Courseno; 
                echo "</h1><hr>";
                $sql_query= "SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
                
                $result=mysqli_query($con,$sql_query);
                $num=mysqli_num_rows($result);
                
                if(mysqli_num_rows($result) > 0)
                {
                     $x=1;
        
        
        
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Roll Number</th>";
        echo "<th>percentage</th>";
        echo "</tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                $roll=$row['Rollno'];
                $percentage=$row['status'];
                echo "<tr>";
                echo "<td>$roll</td>";
                echo "<td>$percentage";
                echo "</td>";
                echo "</tr>";
               
      
          }
          echo "</tbody></table></div>";
       //   echo "<input type='button' name='submit' value='submit' id='btn'>";
         
      }
                else{
                  echo "NO student here";
                }
                
                mysqli_close($con);
            
?>


</div>
</div>
</body>
</html>

 
  
  
 
  
  
  