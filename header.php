<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylem.css" />
</head>

<body>
	 <header>
<?php
    
        if(isset($_SESSION['un']))//available for loggid in users
        {
          echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="image.jpg" height="60px" width="60px" ></a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-main">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="active" href="profile.php">Profile</a></li>
				<li><a href="mycourses.php">Courses</a></li>
				<li><a href="courselist.php">My Status</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				
     		     
			</ul>
		</div>
	</div>
</nav>
';
        }
         elseif(isset($_SESSION['tn']))//available for loggid in teacher
        {
          echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="image.jpg" height="60px" width="60px" ></a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-main">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="active" href="profileteacher.php">Profile</a></li>
				<li><a href="courses.php">Attendance</a></li>
				<li><a href="coursesshowpercentage.php">Show_percentage</a></li>
				<li><a href="logout.php">Logout</a></li>
				
				
     		     
			</ul>
		</div>
	</div>
</nav>
';
        }
         elseif(isset($_SESSION['admin']))//available for loggid in users
        {
          echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="image.jpg" height="60px" width="60px" ></a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-main">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="active" href="index.html">Home</a></li>
				<li><a href="addteacher.php">Add Teacher</a></li>
				<li><a href="addstudent.php">Add Student</a></li>
				<li><a href="addcourse.php">Add Course</a></li>
				<li><a href="show.php">Show</a></li>
				<li><a href="logout.php">Logout</a></li>
     		     
			</ul>
		</div>
	</div>
</nav>
';
        }
        else //available for not-loggid in users
        {
          echo '<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#"><img src="image.jpg" height="60px" width="60px" ></a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>

		</button>
		
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-main">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="active" href="index.html">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="teacher.php">Teacher</a></li>
				<li><a href="student.php">Student</a></li>
				<li><a href="admin.php">Admin</a></li>
				
     		     
			</ul>
		</div>
	</div>
</nav>
';
  }
   
  ?>
</header>
</body>
</html>
