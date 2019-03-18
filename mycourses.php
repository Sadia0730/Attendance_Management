<?php
session_start();
$roll = $_SESSION['un'];
    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
         mysqli_select_db($con,"attedance");
                $sql = "CREATE TABLE IF NOT EXISTS regicourse (
    id integer auto_increment primary key,
    Courseno varchar(30),
    Rollno integer,
    status FLOAT,
    FOREIGN KEY ( Courseno ) REFERENCES course (Courseno) on delete cascade,
    FOREIGN KEY ( Rollno ) REFERENCES student (Rollno) on delete cascade
          )";
          if (mysqli_query($con, $sql)) {
                 echo "Table Regi created successfully";
          } else {
                 echo "Error creating table: " . mysqli_error($con);
          }
  
            
         if(isset($_POST["confirm"])){
          $course=$_POST['team'];
         
          
          $newvalue= implode(",",$course);
          $new=explode(",",$newvalue);

          foreach ( $new as $pop ) {
             $query="INSERT INTO regicourse (Rollno,Courseno,status) VALUES ('$roll','$pop','0')";     
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
    top: 0px;
    background-color:#272822; 
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
background-color:#272822; 
font-weight: bold;
font: 20px;
padding: 40px;
}
.btn
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
@media (max-width: 768px) {
  #content
{
width: 100%;
height: 50%;
position: absolute;
top: 80px;
padding: 50px;
}
.table
{
background-color:#272822; 
font-weight: bold;
font: 20px;
padding: 20px;
}
}
</style>

</head>
<body>
  <div id="header"></div>
  <div class="main">
 <div class="table" id="content">
      <h1 style="color:white;">Select Your Registered Course..</h1>
<form action="mycourses.php" method="post" class="table">

<?php   
 $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
         mysqli_select_db($con,"attedance");
         $sql="SELECT * FROM course";  
         $query=mysqli_query($con,$sql);
         $num=mysqli_num_rows($query);
         if($num>0)
         {
          while ($row=mysqli_fetch_assoc($query)) {
            $courseno = $row['Courseno'];
            $coursename = $row['Coursename'];
            $type = $row['Type'];
            echo " <input type='checkbox'  value='";
            echo $courseno;
            echo "' NAME='team[]' >";
            echo $courseno;
            echo " ----- ";
            echo $type;
            echo " ----- ";
            echo $coursename;
            echo "<br><br>";
          }
         }


?>
   
        
       
<input name="confirm" type=submit class="btn" style='border:1px solid #000000;font-family:Verdana, Arial, Helvetica, sans-serif ;font-size:9px;' value='Confirm'>
</form>

</div>
</div>
</body>
</html>

 
  
  
 
  
  
  