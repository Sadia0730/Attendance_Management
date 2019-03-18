<?php
        session_start();
        $urerr = $eerr = $perr = $cperr = $fnerr ="";
        $uname = $pass ="";
    
        $boolen  = false;
       
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["rollno"])){
               $urerr = "Roll Number Required...!";
                $boolen  = false;
            }else{
               $uname = $_POST["rollno"];
                $boolen  = true;
            }

             if(empty($_POST["password"])){
                $perr = "Password Field Required...!";
                $boolen  = false;
            }else{
              if($boolen){
                $pass = $_POST["password"];
                $boolen = true;
              }
            }
        }
         if($boolen){
          
            
                $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
            
        
            
            if(isset($_POST["submit"])){
              
            

         $roll=$_POST['rollno'];
         $pass=$_POST['password'];
       $sql="SELECT * FROM student WHERE Rollno='$roll'";
      //$resultCheck=$result;
      $result=mysqli_query($con,$sql);
      $resultCheck=mysqli_num_rows($result);
      if($resultCheck<1)//if no rows selected
      {
        echo "<script type='text/javascript'>alert('Invalid login information')</script>";
       /*  header('location: slide.php');*/
       echo "<script type='text/javascript'>window.open('student.php','_self')</script>";
        exit();
      }
      else
      {
        if($row=mysqli_fetch_assoc($result))
        {
          $query="SELECT * FROM student WHERE Rollno='".$roll."' AND password='".$pass."'";
          $result=mysqli_query($con,$query);
          $row=mysqli_fetch_array($result);
          
            
          if(!($row['password']==$pass))//if the input password does not match with the database-stored password
          {  
            /* header('location: slide.php');*/
             echo "<script type='text/javascript'>alert('Invalid password')</script>";
             echo "<script type='text/javascript'>window.open('student.php','_self')</script>";
             exit();
          }
          else if($row['password']==$pass)//if login successful store login informations into session variables
          {
            //echo "accessed into session";
            $_SESSION['un']=$row['Rollno'];
            $_SESSION['fn']=$row['firstname'];
            $_SESSION['ln']=$row['lastname'];
            $_SESSION['em']=$row['email'];
            $_SESSION['pw']=$row['password'];
            $_SESSION['cn']=$row['Contact'];
            $_SESSION['gn']=$row['Gender'];
            if($_POST["checkbox"]=='1'||$_POST["checkbox"]=='on')
            {
              
              $hour=time() + 86400*30;
              setcookie('susername',$roll,$hour);
              setcookie('spassword',$pass,$hour);
            }
             echo "<script type='text/javascript'>alert('Welcome to your account')</script>";
              echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";
       /*  echo "<script type='text/javascript'>window.open('slide.php','_self')</script>";*/

           
          }
        }
      }
            }    
        }
    ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script> 
        $(function(){
             $("#header").load("header.php"); 
             $("#footer").load("foer.php"); 
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
    height: 100%;
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
.loginbox input[type="text"],input[type="password"]
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
  width:400px;
  height: 500px;
  background-color: rgba(35,65,92,0.5);
  top:60%;
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

</style>

	
</head>

<body>
    <div id="header" ></div>
    <div class="main">
  <fieldset >
  
  <div class ="loginbox">
    <h1 class="hone">Login here</h1>
    <hr>
<br>
    <form action="student.php" method="post" id="form">
      <p>Roll Number</p>
       <input type="text" name="rollno" placeholder="Enter your Roll No to login" id="loginEmail" value="<?php echo $_COOKIE['susername'];?>">
        <span id="span" style="color: red;"><?php echo $urerr; ?></span>
       <p>Password</p>
       <input type="password" name="password" placeholder="Enter your password to login" id="loginPassword" value="<?php echo $_COOKIE['spassword'];?>">
        <span id="span" style="color: red;"><?php echo $perr; ?></span>
         <label id="label">
             <input type="checkbox" name="checkbox" id="check">Remember me
         </label>
       <br><br>

      <input type="submit" name="submit" value="login"><br>
     

    </form>

      <button onclick="window.location.href = 'index.html'">Back to home?</button><br>
      
    
  </div> 
   </fieldset> 
 </div>
    <div id="footer" ></div>
</body>
</html>