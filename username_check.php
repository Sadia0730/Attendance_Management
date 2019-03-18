<?php 
//connect to the database
mysql_connect("localhost", "root", "")or die("cannot connect to server"); 
mysql_select_db("attedance")or die("cannot select DB");

//get the value.. 
$txtUsername = $_POST["txtUsername"]; //txtUsername must be the same with ajax.php (data)	

//run a query to check the username from database
$query = "SELECT * FROM track WHERE Courseno='$txtUsername'";
$result = mysql_query($query);
$numrows = mysql_num_rows($result);

//If there is a record
if($numrows != 0)
{
	$query = "SELECT * FROM track WHERE Courseno='$txtUsername'";
	$result = mysql_query($query);
	 echo "<div class='table-responsive'>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Rollno</th>";
        echo "<th>Date</th>";
        echo "</tr></thead><tbody>";
	while ($row=mysqli_fetch_array($result)) {
		
         $date=$row['tarikh'];
         $roll=$row['Rollno'];
                echo "<tr>";
                 echo "<td>$roll</td>";
                echo "<td>$date</td>";
                echo "</tr>";

                 
	}
	echo "</tbody></table></div>";
 
}
else
{
	echo "You can use this as your username."; //else response this message..
}
?>
