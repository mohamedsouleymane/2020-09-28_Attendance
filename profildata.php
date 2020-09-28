<?php 
session_start();
include 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php
		$dt = date("Y.m.d");
	    $username = $_SESSION['name'];
	    $query= "SELECT * FROM attendance WHERE Employee_ID='$EmpID' AND attendance_date='$dt'";
		$query_run = mysqli_query($con,$query);
		        	while ($row = mysqli_fetch_array($query_run))
		        	{
		        		$login_time = $row['login_time'];
		        		$logout_time = $row['logout_time'];
		        	}
	    $sql= "SELECT * FROM team_member WHERE Employee_ID='$EmpID'";
		$query_run = mysqli_query($con,$sql);
		        	while ($row = mysqli_fetch_array($query_run))
		        	{
		        		$full_name = $row['full_name'];
		        	}
?>
					<tr>
					<td>$EmpID</td>
					<td>$full_name</td>
					<td>$login_time</td>
					<td>$logout_time</td>
					</tr>

					$_SESSION['full_name'] = $full_name;
					$_SESSION['login_time'] = $login_time;
		        	$SESSION['logout_time'] = $logout_time;