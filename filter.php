<?php
session_start()
include 'db.php';
if (isset($_POST["from_date"], $_POST["to_date"]))
{
	$query = "
		SELECT * FROM attendance
		WHERE attendance_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";

	$result = mysqli_query($con, $query);
	$output .= "
		<table class="table table-bordered">
			<tr>
				<th>#</th>
				<th>Date</th>
				<th>Project</th>
				<th>Login</th>
				<th>Logout</th>
			</tr>
		";
		if(mysqli_num_row($result) > 0)
		{
			$i=1;
			while($row = mysqli_fetch_array($result))
			{
				$output .='
						
						$test = date('Y-m-d h:i', $row["attendance_date"];
						$array = explode(' ', $test);
						$date_temp = $array[0];
					<tr>
						<td>'. $i .'</td>
						<td>'. $date_temp .'</td>
						<td>'. $row["todays_project"] .'</td>
						<td>'. $row["attendance_login_time"] .'</td>
						<td>'. $row["attendance_logout_time"] .'</td>

					</tr>
				';
				$i=$i+1;
			}
		}
		else
			{
				$output .= '
					<tr>
						<td colspan="5">No Records Found</td>
					</tr>
				';
			}
			$output .= '</table>';
			echo $output;
}

?>