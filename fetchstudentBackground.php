 <?php 
session_start();
$roll = $_SESSION['un'];
    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
            mysqli_select_db($con,"attedance");

    $sql = "CREATE TABLE IF NOT EXISTS schedule (
      Courseno varchar(30),
      tarikh date,
      PRIMARY KEY( tarikh,Courseno),
      FOREIGN KEY ( Courseno ) REFERENCES course (Courseno) on delete cascade
          )";
mysqli_query($con, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS track (
  
    Courseno varchar(30),
    Rollno integer,
    tarikh date,
    PRIMARY KEY (Rollno,tarikh,Courseno),
    FOREIGN KEY ( Courseno ) REFERENCES course (Courseno) on delete cascade,
    FOREIGN KEY (tarikh) REFERENCES schedule (tarikh) on delete cascade,
    FOREIGN KEY ( Rollno ) REFERENCES student (Rollno) on delete cascade
          )";
   mysqli_query($con, $sql);

      
        
            
         if(isset($_POST["submit"])){
          $roll=$_POST['team'];
          
          print_r($_POST);
          $Courseno=$_GET['Courseno'];
          
          $sql="INSERT INTO schedule (Courseno,tarikh) VALUES ('$Courseno',now())"; 
          mysqli_query($con,$sql) or die(mysqli_error($con));
          $newvalue= implode(",",$roll);
          $new=explode(",",$newvalue);
          print_r($new);

          foreach ( $new as $pop ) {
             $query="INSERT INTO track (Courseno,Rollno,tarikh) VALUES ('$Courseno','$pop',now())";     
              mysqli_query($con,$query) or die (mysqli_error($con));
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
                echo "<h1 style='color:black'> Attendance Of Course : ";
                echo $Courseno; 
                echo "</h1><hr>";
                $sql_query= "SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
                
                $result=mysqli_query($con,$sql_query);
                $num=mysqli_num_rows($result);
                
                if(mysqli_num_rows($result) > 0)
                {
                     $x=1;
        
        
        echo " <form action='fetchstudentBackground.php?Courseno=$Courseno' method='post' id='form'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Roll Number</th>";
        echo "<th>present/absent</th>";
        echo "</tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                $roll=$row['Rollno'];
               
                echo "<tr>";
                echo "<td>$roll</td>";
                echo "<td><input type='checkbox' name='team[]' value='";
                echo $roll;
                echo "'></td>";
                echo "</tr>";
               
      
          }
          echo "</tbody></table></div><button name='submit' id='btn'>Submit</button></form>";
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

 
  
 
 
  
  
  