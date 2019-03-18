<!DOCTYPE html>
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
             $("#footer").load("fooer.php"); 
            });
    </script>
    <style type="text/css">
     #header
    {
    height: 300px;
    width: 100%;
    position: absolute;
    top: 0px;
    }

  
     
        .row
        {
            position: absolute;
            top: 60px;
            left: 15px;
            height: 800px;
            width: 100%;
            background-color:#272822; 
        }
        #list{
            padding: 50px;
        }
        #footer
        {
           position:relative;
           bottom: 0px;
           left: 0px;
           width: 100%;
        }
        #listed:hover{
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
<div id="header"></div>
<div class="row">
      <br>   
  <h2 style="color: white;padding: 10px">  All Information gathers here!!!</h2>
<div class="col-9 firstCol m-auto">
  
  <div class="list-group" id="list">
    <a href="showall.php?theuser=teacher" class="list-group-item list-group-item-action" id="listed">Teacher</a>
    <a href="showall.php?theuser=student" class="list-group-item list-group-item-action" id="listed">Student</a>
    <a href="showall.php?theuser=course" class="list-group-item list-group-item-action" id="listed">Course</a>

     <a href="showall.php?theuser=regicourse" class="list-group-item list-group-item-action" id="listed">Registered Students</a>
  </div>

    </div>
   
</div>
<div id="footer"></div>
</body>
</html>