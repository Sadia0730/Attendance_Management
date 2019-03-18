<?php
session_start();
        $urerr = $eerr = $perr = $cperr = $fnerr =  " ";
        $urname = $email = $passwd = $fname = $lname ="";
    
        $boolen  = false;
       
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["urname"])){
               $urerr = "Username Required...!";
                $boolen  = false;
            }else{
                $boolen  = true;
            
            $urname = validate_input($_POST["urname"]);
            }
            
            if(empty($_POST["email"])){
                $eerr = "Email Required...!";
                $boolen  = false;
            }elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $eerr = "Invalid Email...!";
                $boolen  = false;
            }else{
                  if($boolen){
                $boolen  = true;
                 
            }
            $email = validate_input($_POST["email"]);
            }
            
            if(empty($_POST["fname"]) || empty($_POST["lname"])){
                  
                $fnerr = "First &amp; Last Name both Required...!";
                $boolen  = false;
            }else{
                  if($boolen){
                $fname = validate_input($_POST["fname"]);
                $lname = validate_input($_POST["lname"]);
                $boolen  = true;
                 
            }
            }
            
           
            
        
     } 
        function strlenght($str){
            $ln = strlen($str);
            if($ln >15){
                return "Passwod should less than 15 charecter";
            }elseif($ln <=3 && $ln >= 1){
                return "Password should greater then 3 charecter";
            }
            return;
        }
        function validate_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
    echo $boolen;
        if($boolen){
        
             
                $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
         mysqli_select_db($con,"attedance");
                $sql = "CREATE TABLE IF NOT EXISTS student (
          Rollno integer  PRIMARY KEY, 
          email VARCHAR(50) NOT NULL,
          firstname VARCHAR(30) NOT NULL,
          lastname VARCHAR(30) NOT NULL,
          password VARCHAR(30) NOT NULL,
          Gender VARCHAR(12),
          Contact VARCHAR(11)
          )";
          if (mysqli_query($con, $sql)) {
                 echo "Table student created successfully";
          } else {
                 echo "Error creating table: " . mysqli_error($con);
          }

            
           function NewUser(){
                $sql = "INSERT INTO student (Rollno,email,firstname,lastname,password,Gender,Contact) VALUES ('$_POST[urname]','$_POST[email]','$_POST[fname]','$_POST[lname]','$_POST[urname]','NULL','NULL')";
                
                $query = mysqli_query($GLOBALS['con'],$sql);

                $uname=$_POST["urname"];
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $email=$_POST["email"];
                $pass=$_POST["urname"];

                if($query){

                    
                
                       echo "<script>alert ('Record Inserted Successfully...!')</script>";
                       echo "<script type='text/javascript'>window.open('addstudent.php','_self')</script>";
                
                    
                }
            }
            
           function SignUP(){
                $sql = "SELECT * FROM student WHERE Rollno = '$_POST[urname]' AND email = '$_POST[email]'";
                
                $result = mysqli_query($GLOBALS['con'],$sql);
              
                $row = mysqli_fetch_array($result);
                if(!$row){
                    NewUser();
                }else{
                    echo "<script>
                        alert ('You Are Already Registered User......!');
                    </script>";
                }
            }
            
            if(isset($_POST["submit"])){
                
                SignUp();
              
                mysqli_close($GLOBALS["con"]);
                $boolen = false;
            }    
        }
    ?>
<html>
<head>
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
    background-color: #272822;
  }
  .hone
  {
    color:white;
  }
 .loginbox p
{

  margin:0;
  padding: 0;
  font-weight: bold;

}
.loginbox input
{
  width:100%;
  margin-bottom: 15px;

}
.loginbox input[type="text"],input[type="password"],input[type="email"]
{
  border:none;
  border-bottom: 1px solid;
  background:transparent;
  outline: none;
  height:30px;
  color:white;
  font-size: 15px;

}
.loginbox input[type="submit"]
{
  border:none;
  outline: none;
  height:35px;
  background:#d0183b;
  border-radius: 20px; 
  color:#fff;
  font-size: 18px;

}
.loginbox input[type="submit"]:hover
{
  cursor: pointer;
  background:#d2b236;
  color:#000;
}
.loginbox button
{
  text-decoration: none;
  color:white;
  line-height: 20px;
  border-style: none;
  background-color: transparent;

}
.loginbox button:hover
{
  cursor: pointer;
  background:transparent;
  color:#d2b236;
  border-style: none;
}
#check
{
  left-border:1px;
  width: 10px;
  height: 20px;
}
#label
{
 color:#dfd4d8;
 font-size: 14px;
}
fieldset
{
  width:450px;
  height: 700px;
  background-color: rgba(35,65,92,0.5);
  top:30%;
  left: 50%;
  position:absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  padding-top: 20px;
 

}
.loginbox
{
  background-color:;
  padding:20px 20px;
}
.loginbox p
{
  color: white;
  font-size: 18px;
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
<fieldset>

  <div class ="loginbox">
      <h1 class="hone" >Add student's info here</h1>
      <hr>
      <br>
    <form action="addstudent.php" method="post" id="form">
         <p>Roll Number:</p>
         <input type="text" id="txtuser" name="urname" placeholder="Roll Number">
         <span id="span" style="color: red;"><?php echo $urerr;?></span>
         <br><br>

          <p>Email Address:</p>
          <input type="text" id="txtemail" name="email" placeholder="Email Address">
          <span id="span" style="color: red;"><?php echo $eerr;?></span>
          <br><br>

          <p>First Name &amp; Last Name:</p>
          <input type="text" id="txtfname" name="fname" placeholder="First Name" pattern="[A-Z]*[a-z ]*" title="Letters and space can be used" style="width: 160px;">
          <input type="text" id="txtlname" name="lname" placeholder="Last Name" pattern="[A-Z]*[a-z ]*" title="Letters and space can be used" style="float: right;width: 160px;"><br>
          <span id="span" style="color: red;"><?php echo $fnerr;?></span> 
          <br><br>

         <input type="submit" name="submit" id="btnsub" value="Submit"><br>
     

    </form>

      
     
  
</div> 
   </fieldset> 
   </div>
   <div id="footer"></div>
</body>
</html>