<?php
session_start();

	$em=$_SESSION['tn'];
	$fname=$_SESSION['fn'];
	$lname=$_SESSION['ln'];
	$contact=$_SESSION['cn'];
	$gender=$_SESSION['gn']; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>

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
    <style type="text/css"> /*profile style*/
     #header
	{
    height: 300px;
    width: 100%;
    position: absolute;
    top: 0px;
	}

   .main
   {  
    color: white;
    height: 1700px;
    width: 100%;
    background-color:#272822; 
    }
      
	.profile
	{
		position: absolute;
		top: calc(30% - 75px);
		left: calc(30% - 50px);
		height: 1300px;
		width: 650px;
		padding: 10px;
		color: white;
		background-color:#272822;
		/*z-index: -1;*/
	}
	.profile p
	{
		color: white;
	}
	.profile input[type=text]{
		width: 600px;
		height: 30px;
		background: #F4F4F4;
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
.profile input[type=radio]{
		width: 20px;
		height: 20px;
		background: #F4F4F4;
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
		margin-right: 70px;
		margin-left: 70px;
		
	}
	.profile input[type=password]{
		width: 600px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile input[type=tel]{
		width: 600px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile select{
		width: 600px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile button[type=submit]{
		width: 600px;
		height: 45px;
		background: #d0183b;
		border: 1px solid #fff;
		cursor: pointer;
		border-radius: 2px;
		color: #fff;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 6px;
		margin-top: 30px;
		margin-bottom: 20px;
	}

	.profile button:hover
	{
		background-color: #d2b236;
	}

	.profile form
	{
		color: black;
		font-family: antic;
		font-size: 20px;
		padding-left: 30px;
	   box-sizing: border-box;
	}
	#footer{
		position:relative;
		bottom: 0px;
		left: 0px;
		width: 100%;
	}
	@media (max-width: 768px) {
	.profile
	{
		position: absolute;
		top: calc(10% );
		left: calc(10% );
		height: 1300px;
		width: 350px;
		
	}

   .main
   {  
    color: white;
    height: 1700px;
    width: 100%;
    background-color:#272822; 
    }
     	.profile input[type=text]{
		width: 320px;
		height: 30px;
		background: #F4F4F4;
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 10px;
		margin-bottom: 10px;
	}
.profile input[type=radio]{
		width: 20px;
		height: 20px;
		background: #F4F4F4;
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
		margin-right: 70px;
		margin-left: 70px;
		
	}
	.profile input[type=password]{
		width: 320px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile input[type=tel]{
		width: 320px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile select{
		width: 320px;
		height: 30px;
		background: #F4F4F4;/*background color for password input field*/
		border: 1px solid rgba(255,255,255,0.6);
		border-radius: 2px;
		color:#124191;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 4px;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.profile button[type=submit]{
		width: 320px;
		height: 45px;
		background: #d0183b;
		border: 1px solid #fff;
		cursor: pointer;
		border-radius: 2px;
		color: #fff;
		font-family: 'Antic';
		font-size: 16px;
		font-weight: 400;
		padding: 6px;
		margin-top: 30px;
		margin-bottom: 20px;
	}

	.profile form
	{
		font-size: 20px;
		padding-left: 30px;
	   box-sizing: border-box;
	} 

</style>
</head>
<body>
	<div id="header"></div>

<div class="main">
<div class="profile" >
	<h3> Welcome <?php echo $fname; echo " "; echo $lname; ?> </h3>
		<hr style="background-color: white">
		<br>
	<form method="post" action="processProfileUpdateteacher.php" style="float: right;">

	  <h6 style="font-family: 'Antic';color: red;">The fields marked with * must be filled</h6>
  	  <p>Email <b style="color:red;">*</b></p>
  	  <input type="text" value= "<?php echo htmlspecialchars($em); ?>" name="username" class="grad"><br>
  	  <p>First Name </p>
  	  <input type="text" value="<?php echo htmlspecialchars($fname); ?>" name="fname"><br>
  	  <p>Last Name </p>
  	  <input type="text" value="<?php echo htmlspecialchars($lname); ?>" name="lname"><br>
  	  <p>Gender</p>
  	  <input type="text" name="gender" value="<?php echo htmlspecialchars($gender); ?>"><br>
  	 
  	  <p>Contact</p>
  	  <input type="tel" name="contact" maxlength="11" pattern="[0-9]{11}" value="<?php echo htmlspecialchars($contact); ?>"><br>
  	  <p>Old Password <b style="color:red;">*</b></p> <input type="text" name="oldpassword" autocomplete="off"><br>
  	  <p>New Password </p> 
  	  <input type="text" name="newpassword" autocomplete="off" placeholder="Leave empty if you don't want to change"><br>
  	  <button type="submit" class="btn" name="reg_user">Update</button>
  	</form>
</div>		
 </div>   
    <div id="footer"></div>
</body>
</html>
