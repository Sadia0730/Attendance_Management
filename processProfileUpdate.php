<?php
	session_start();	
	    $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
               

	$currentUname=$_SESSION['un'];
    $newUname=$_POST['username'];
	$fanme=$_POST['fname'];
	$lanme=$_POST['lname'];
	$em=$_POST['email'];
	$passOld=$_POST['oldpassword'];
	$passNew=$_POST['newpassword'];
	$gender=$_POST['gender'];
	$contact=$_POST['contact'];


	 mysqli_select_db($con,"attedance");
	$query="SELECT * FROM student WHERE Rollno='".$currentUname."'";
	
    $result=mysqli_query($con,$query) or die("result");
    $row=mysqli_fetch_array($result) or die("row");

   
    if($passNew=='')
    { 
    	$passNew=$passOld;	
    }

    if($newUname=='')
    {
    	echo "<script type='text/javascript'>alert('You must enter a valid username')</script>";
    	echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";
    	exit();
    }
    if ($row['Rollno']!=$newUname) {
    	
    	echo "<script type='text/javascript'>alert('You can not change your roll number.')</script>";
    	echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";
    	exit();
    }
    if($row['password']!=$passOld)
    {
    	echo "<script type='text/javascript'>alert('Please enter correct current password')</script>";
    	echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";
    	exit();
    }

   

	//if everthing so far is ok then update
	$sql="UPDATE student SET firstname = '$_POST[fname]' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
		$sql="UPDATE student SET lastname = '$_POST[lname]' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	$sql="UPDATE student SET email = '$_POST[email]' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	$sql="UPDATE student SET password = '$passNew' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	
	$sql="UPDATE student SET Gender = '$_POST[gender]' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	
	$sql="UPDATE student SET Contact = '$_POST[contact]' WHERE Rollno='$currentUname'";
	if (!mysqli_query($con,$sql)){die('Error: ' . mysql_error());}
	
	

 	
	
	$_SESSION['fn']=$fanme;
	$_SESSION['ln']=$lanme;
	$_SESSION['em']=$em;
	$_SESSION['pw']=$passNew;
	$_SESSION['cn']=$contact;
	$_SESSION['gn']=$gender;

   	echo "<script type='text/javascript'>alert('Your informations are successfully updated.')</script>";
  	echo "<script type='text/javascript'>window.open('profile.php','_self')</script>";

	mysqli_close($con);
?>
