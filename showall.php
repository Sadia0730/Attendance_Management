<?php
session_start();
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
  
    	#container
    	{
    		position: relative;
    		top: 120px;
    	}
    	#field
    	{
    	
    		
    		position: relative;
    		top: 20px;
    		left: 10%;
    		/*border:30px white solid;*/
    		min-height: 700px;
    		padding-left: 10px;
    		width: 1000px;
    		font-size: 25px;
    	}
    	#legend
    	{
    		font-size: 42px;
    		font-weight: bold;
    		color:white;
        background-color: black;
        padding: 15px;
        box-sizing: border-box;


    	}
    	#legend i
    	{
    		font-size: 42px;
    		text-transform:uppercase; 
    		color:#d0183b;
    	}
      #post
      {
        background-color: #f1f1f1;
        padding: 10px;
        border-top:5px solid white;
        border-bottom:5px solid white;
      }
    	#footer{
    		position: relative;
    		bottom: 0px;
    	}
    </style>
 </head>
 <body>
  <div id='header'></div>
  
<?php
$conn = mysqli_connect('localhost','root','');
 
if(!$conn)
{
    die(mysqli_connect_error());
}
 mysqli_select_db($conn,"attedance");
$u=$_GET['theuser'] or die("conn");
echo $u;
if($u=='teacher')
{
      $sql="SELECT * FROM teacher";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      
      echo $resultCheck;

      if($resultCheck>0)
      {
        $x=1;
        echo "<div class='container' id='container'>";
        echo "<h3>Teacher's Info...</h3><hr>";
  
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>No.</th>";
        echo "<th>Email</th>";
        echo "<th>firstname</th>";
        echo "<th>Lastname</th>";
        echo "<th>password</th>";
        echo "<th>Gender</th>";
        echo "<th>Contact</th>";
        echo "<th>#</th></tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                
                $fname=$row['firstname'];
                $lname=$row['lastname'];
                $email=$row['email'];
                $pass=$row['password'];
                $gender=$row['Gender'];
                $contact=$row['Contact'];
                $space=" ";

                echo "<tr>";
                echo "<td>$x</td>";
                echo "<td>$email</td>";
                echo "<td>$fname</td>";
                echo "<td>$lname</td>";
                echo "<td>$pass</td>";
                echo "<td>$gender</td>";
                echo "<td>$contact</td>";
                echo "<th><a href='deleteteacher.php?id=$email'>Delete</a></th>";
                echo "</tr>";
                $x=$x+1;
      
          }
          echo "</tbody></table></div></div>";
      }

}

if($u=='student')
{
      $sql="SELECT * FROM student";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      
      echo $resultCheck;

      if($resultCheck>0)
      {
        $x=1;
        echo "<div class='container' id='container'>";
        echo "<h3>Student's Info...</h3><hr>";
  
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>No.</th>";
        echo "<th>Roll Number</th>";
        echo "<th>Email</th>";
        echo "<th>firstname</th>";
        echo "<th>Lastname</th>";
        echo "<th>password</th>";
        echo "<th>Gender</th>";
        echo "<th>Contact</th>";
        echo "<th>#</th></tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                $roll=$row['Rollno'];
                $fname=$row['firstname'];
                $lname=$row['lastname'];
                $email=$row['email'];
                $pass=$row['password'];
                $gender=$row['Gender'];
                $contact=$row['Contact'];
                $space=" ";

                echo "<tr>";
                echo "<td>$x</td>";
                echo "<td>$roll</td>";
                echo "<td>$email</td>";
                echo "<td>$fname</td>";
                echo "<td>$lname</td>";
                echo "<td>$pass</td>";
                echo "<td>$gender</td>";
                echo "<td>$contact</td>";
                echo "<th><a href='deletestudent.php?id=$roll'>Delete</a></th>";
                echo "</tr>";
                $x=$x+1;
      
          }
          echo "</tbody></table></div></div>";
      }

}
      
if($u=='course')
{
      $sql="SELECT * FROM course";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      
      echo $resultCheck;

      if($resultCheck>0)
      {
        $x=1;
        echo "<div class='container' id='container'>";
        echo "<h3>Course's Info...</h3><hr>";
  
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>No.</th>";
        echo "<th>Course Number</th>";
        echo "<th>Course Name</th>";
        echo "<th>Type</th>";
        echo "<th>#</th></tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                
                $courseno=$row['Courseno'];
                $coursename=$row['Coursename'];
                $type=$row['Type'];
                

                echo "<tr>";
                echo "<td>$x</td>";
                echo "<td>$courseno</td>";
                echo "<td>$coursename</td>";
                echo "<td>$type</td>";
                echo "<th><a href='deletecourse.php?id=$courseno'>Delete</a></th>";
                echo "</tr>";
                $x=$x+1;
      
          }
          echo "</tbody></table></div></div>";
      }

}
      

if($u=='regicourse')
{
      $sql="SELECT * FROM regicourse";
      $result=mysqli_query($conn,$sql);
      $resultCheck=mysqli_num_rows($result);
      
      echo $resultCheck;

      if($resultCheck>0)
      {
        $x=1;
        echo "<div class='container' id='container'>";
        echo "<h3>Registered Studet's Info...</h3><hr>";
  
        echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>No.</th>";
        echo "<th>Course Number</th>";
        echo "<th>Roll no</th>";
        echo "<th>status</th>";
        echo "<th>#</th></tr></thead><tbody>";
          while($row=mysqli_fetch_array($result))
          {

                
                $courseno=$row['Courseno'];
                $rollno=$row['Rollno'];
                $status=$row['status'];
                

                echo "<tr>";
                echo "<td>$x</td>";
                echo "<td>$courseno</td>";
                echo "<td>$rollno</td>";
                echo "<td>$status</td>";
                echo "<th><a href='deleteregicourse.php?id=$courseno&&idr=$rollno'>Delete</a></th>";
                echo "</tr>";
                $x=$x+1;
      
          }
          echo "</tbody></table></div></div>";
      }

}

?>
 

 </body>