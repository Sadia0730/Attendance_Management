<?php
session_start();
$roll = $_SESSION['un'];
    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
         mysqli_select_db($con,"attedance");
               
  

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
     
}
h1
{
  color: white;
}

.table
{ 
font-weight: bold;
font: 20px;
padding: 40px;
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
<div class="table">
    
<?php
  $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
                
                $Courseno=$_GET['Courseno'];
                $roll=$_SESSION['un'];
                echo "<h1 style='color:black'> Attendance Of Course : ";
                echo $Courseno; 
                echo "</h1><hr>";
                $sql_query= "SELECT * FROM schedule WHERE Courseno = '$Courseno'" or die("kkkk");
                
                $result=mysqli_query($con,$sql_query) or die("lll");
                $num=mysqli_num_rows($result) or die("mmm");
                
                if(mysqli_num_rows($result) > 0)
                {
                     $x=1;
                
        echo "<h2 style='color:blue'> Classes held Of Course ";
        echo $Courseno;
        echo "in following dates</h2><hr>";
        echo " <form id='form'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "</tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {    
            $date=$row['tarikh'];
                  
                echo "<tr>";
                echo "<td>$date</td>";
                echo "</tr>";
          }
          echo "<tr><td style='color:red'>Total classes: ";
          echo $num;
          echo "</td></tr>";
          echo "</tbody></table></div></form>";
       
         
      }
       else{
                  echo "NO student here";
                }

//second part   
       $sql= "SELECT * FROM track WHERE Courseno = '$Courseno' AND Rollno ='$roll'" or die("You were not present in any class..");
                
                $res=mysqli_query($con,$sql) or die("You were not present in any class..");
                $num2=mysqli_num_rows($res) or die("You were not present in any class..");
                 if(mysqli_num_rows($res) > 0)
                {
                     $x=1;
                
                     echo "<h2 style='color:blue'> Classes you were present Of Course ";
        echo $Courseno;
        echo "in following dates</h2><hr>";
        echo " <form id='form'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Date</th>";
        echo "</tr></thead><tbody>";
          while($row2=mysqli_fetch_array($res))
          {    
                $presentDate=$row2['tarikh'];
                echo "<tr>";
                echo "<td>$presentDate</td>";
                echo "</tr>";    
          }
           echo "<tr><td style='color:red'>Total attended classes: ";
          echo $num2;
          echo "</td></tr>";
          echo "</tbody></table></div></form>";
         
      }
       else{
                  echo "NO student here";
                }
                
$percentage=($num2/$num)*100;
$sql="UPDATE regicourse SET status = '$percentage' WHERE Rollno='$roll' AND Courseno = '$Courseno'" or die("sdsds");
mysqli_query($con,$sql) or die("query");
echo "<h3 style='text-align:center; color:red'>percentage: ";
echo $percentage;
echo "%</h3>";
if($percentage<60)
{
  echo "<h3 style='text-align:center; color:red'>You are below deadline</h3>";

}
else{
  echo "<h3 style='text-align:center; color:green'>you are in safe zone</h3>";
}
                mysqli_close($con);
            
?>


</div>
</div>
</body>
</html>

 
  
  
 
  
  
  