<?php
	session_start();	
	    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
               

	$currentUname=$_SESSION['tn'];
    $newEmail=$_POST[username];
	$fanme=$_POST[fname];
	$lanme=$_POST[lname];
	$passOld=$_POST[oldpassword];
	$passNew=$_POST[newpassword];
	$gender=$_POST[gender];
	$contact=$_POST[contact];


	 mysqli_select_db($con,"attedance");
	$query="SELECT * FROM teacher WHERE email='".$currentUname."'";
	echo $currentUname;
    $result=mysqli_query($con,$query) or die("result");
    $row=mysqli_fetch_array($result) or die("row");

   
    if($passNew=='')
    { 
    	
    	$passNew=$passOld;
    	

    }

    if($newEmail=='')
    {
    	echo "<script type='text/javascript'>alert('You must enter a valid username')</script>";
    	echo "<script type='text/javascript'>window.open('profileteacher.php','_self')</script>";
    	exit();
    }
    
    if($row['password']!=$passOld)
    {
    	echo "<script type='text/javascript'>alert('Please enter correct current password')</script>";
    	echo "<script type='text/javascript'>window.open('profileteacher.php','_self')</script>";
    	exit();
    }

   

	//if everthing so far is ok then update
	$sql="UPDATE teacher SET firstname = '$_POST[fname]' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
		$sql="UPDATE teacher SET lastname = '$_POST[lname]' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	$sql="UPDATE teacher SET password = '$passNew' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	
	$sql="UPDATE teacher SET Gender = '$_POST[gender]' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	
	$sql="UPDATE teacher SET Contact = '$_POST[contact]' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	$sql="UPDATE teacher SET email = '$_POST[username]' WHERE email='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}	
	
 	
	$_SESSION['tn']=$newEmail;
	$_SESSION['fn']=$fanme;
	$_SESSION['ln']=$lanme;
	$_SESSION['pw']=$passNew;
	$_SESSION['cn']=$contact;
	$_SESSION['gn']=$gender;

   	echo "<script type='text/javascript'>alert('Your informations are successfully updated.')</script>";
  	echo "<script type='text/javascript'>window.open('profileteacher.php','_self')</script>";

	mysqli_close($con);
?>
