<?php
        session_start();
        $urerr = $eerr = $perr = $cperr = $fnerr ="";
        $uname = $pass ="";
    
        $boolen  = false;
       
    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            if(empty($_POST["username"])){
               $urerr = "Username Required...!";
                $boolen  = false;
            }else{
               $uname = $_POST["username"];
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
            if(isset($_POST["submit"])){
             

         $uname=$_POST['username'];
         $pass=$_POST['password'];
       
         if($uname=='admin')//if login successful store login informations into session variables
          {
            if ($pass=='admin') {
                    $_SESSION['admin']=$uname;
                    $_SESSION['adpw']=$pass;
                    echo  $_SESSION['admin']; 
                    echo "<script type='text/javascript'>alert('Welcome to your account')</script>";
                    echo "<script type='text/javascript'>window.open('addteacher.php','_self')</script>";
            }else{
               echo "<script type='text/javascript'>alert('Invalid password!')</script>";
            }
          
            
       /*  echo "<script type='text/javascript'>window.open('slide.php','_self')</script>";*/

           
          }else{
              echo "<script type='text/javascript'>alert('Invalid User name!')</script>";
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
    <form action="admin.php" method="post" id="form">
      <p>User name</p>
       <input type="text" name="username" placeholder="Enter your username to login" id="loginEmail" value="<?php echo $_COOKIE['username'];?>">
        <span id="span" style="color: red;"><?php echo $urerr; ?></span>
       <p>Password</p>
       <input type="password" name="password" placeholder="Enter your password to login" id="loginPassword" value="<?php echo $_COOKIE['password'];?>">
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