 <?php
  $con = mysqli_connect("localhost","root","");
 
            if(!$con){
                    die("Connection Failed :" + mysqli_connect_error());
                }
        
                mysqli_select_db($con,"attedance");
                $response=array();
                $Courseno=$_GET['Courseno'];
                
                $sql_query= "SELECT * FROM regicourse WHERE Courseno = '$Courseno'";
                
                $result=mysqli_query($con,$sql_query);
                $num=mysqli_num_rows($result);
                
                if(mysqli_num_rows($result) > 0)
                {

                	$response['success']=1;
                	$students=array();
                	while ($row = mysqli_fetch_assoc($result)) {
                		array_push($students, $row);
                	}
                	$response['regicourse']=$students;
                    $response['message'] = $Courseno;
                }
                else{
                	$response['success'] = 0;
                	$response['message'] = 'sad';
                }
                echo json_encode($response);
                mysqli_close($con);
            
?>