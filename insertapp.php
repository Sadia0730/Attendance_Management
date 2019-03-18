<?php
                $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
            

$JSON_Received = $_POST["JSON"];
$obj = json_decode($JSON_Received, true);
foreach ($obj['contact'] as $key => $value) 
{
    //echo "<br>------" . $key . " => " . $value;
}
?>