<?php
session_start();
        $cerr = $nerr = $terr =  " ";
        $cname = $cno = $type ="";
    
        $boolen  = false;
       
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["cno"])){
               $cerr = "Course Number Required...!";
                $boolen  = false;
            }else{
                $boolen  = true;
            
            $cno = validate_input($_POST["cno"]);
            }
            
           
            
            if(empty($_POST["cname"])){
                  
                $nerr = "Course Name  Required...!";
                $boolen  = false;
            }else{
                  if($boolen){
                $cname = validate_input($_POST["cname"]);
                $boolen  = true;
                 
            }
            }
            
             if(empty($_POST["type"])){
                  
                $nerr = "Type Required...!";
                $boolen  = false;
                
            }else{
                  if($boolen){
                            $type = validate_input($_POST["type"]);
                            $boolen  = true;
                    
                              }
            }
            
            
           
           
        
     } 
       
        function validate_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
     
  
        if($boolen){
        
             
                $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
            mysqli_query($con,"CREATE DATABASE IF NOT EXISTS attedance");
         mysqli_select_db($con,"attedance");
                $sql = "CREATE TABLE IF NOT EXISTS course (
          Courseno varchar(20)  PRIMARY KEY, 
          Coursename VARCHAR(30) NOT NULL,
          Type VARCHAR(6) NOT NULL         
          )";
          if (mysqli_query($con, $sql)) {
                 echo "Table course created successfully";
          } else {
                 echo "Error creating table: " . mysqli_error($con);
          }

            
           function NewUser(){
                $sql = "INSERT INTO course (Courseno,Coursename,Type) VALUES ('$_POST[cno]','$_POST[cname]','$_POST[type]')";
                
                $query = mysqli_query($GLOBALS['con'],$sql);

                $cname=$_POST["cname"];
                $cno=$_POST["cno"];
                $type=$_POST["type"];
                

                if($query){                
                       echo "<script>alert ('Record Inserted Successfully...!')</script>";
                       echo "<script type='text/javascript'>window.open('addcourse.php','_self')</script>";                                    
                }
            }
            
           function SignUP(){
                $sql = "SELECT * FROM course WHERE Courseno = '$_POST[cno]'";
                
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
    color:white;
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
select
{
   background: transparent;
   width: 100%;
   height: 35px;
   color: inherit;
   font: inherit;
   outline: none;
   border-style: none;
   border-bottom: 1px solid;
}
select.solid {
  
}
option
{
  font: inherit;

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
      <h1 class="hone" >Add Course info here</h1>
      <hr>
      <br>
    <form action="addcourse.php" method="post" id="form">
         <p>Course Number:</p>
         <input type="text" id="txtuser" name="cno" placeholder="Course Number" pattern="[A-Z]+[0-9]+" title="Entry should be CSE1101 or HUM1101 like this">
         <span id="span" style="color: red;"><?php echo $urerr;?></span>
         <br><br>

          <p>Course Name:</p>
          <input type="text" id="txtfname" name="cname" placeholder="Course Name" pattern="[A-Z]*[a-z ]*" title="Letters and space can be used">
          <span id="span" style="color: red;"><?php echo $fnerr;?></span> 
          <br><br>
           <select  class="solid" name="type">
                <option value="lab">Lab</option>
                <option value="theory">Theory</option>
            </select>
            <span id="span" style="color: red;"><?php echo $trerr;?></span>
            <br><br><br>
         <input type="submit" name="submit" id="btnsub" value="Submit"><br>
     

    </form>

  
     
  
</div> 
   </fieldset> 
   </div>
   <div id="footer"></div>
</body>
</html>