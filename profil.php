<?php
session_start()
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>My Profil</title>
	
	<!-- CSS FILES LINK FOR THE DATATABLE-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link rel="stylesheet" href=".style.css">	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<!-- JAVASCRIPT FOR JQUERY-->
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- SCRIPT FOR JQUERY DATATABLE-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<!-- Bootstrap CSS CDN Link STARTS HERE -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> 
	<!-- Bootstrap CSS CDN Link ENDS HERE -->

	<!-- Our Custom CSS STARTS HERE -->
	<link rel="stylesheet" href="resources/css/attedance-style.css">
	<!-- Scrollbar Custom CSS ENDS HERE -->

	<!-- External CSS STARTS HERE -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<!-- External CSS ENDS HERE -->


	
</head>
<body>
    <div class="wrapper">

        <!-- SIDEBAR  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>My Attendance Manager</h4>
            </div>
	            <ul class="list-unstyled components">

	                <li>
	                    <a close() href="marktodaysattendance.php">Today's Attendance</a>
	                </li>
	                <li>
	                    <a close() href="myattendance.php">My Attendance</a>
	                </li>

	                <li>
	                    <a close() href="myprofile.php">My Profile</a>
	                </li>

	            </ul>
	            <ul class="list-unstyled CTAs">
	                <li>
	                    <a href="" class="btn btn-light">
	                        <font color="#1B4965">Logout</font>
	                    </a>
	                </li>
	            </ul>
        </nav>
        <!--SIDEBAR ENDS HERE-->

        <!-- PAGE CONTENT STARTS HERE -->
        <div id="content">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-right"></i>Menu
                </button> 
                <hr>

                <div style="background-color: #EDEDED; display: inline-block;  border-width: 2px; text-align:left; padding-left:0px;"></div>
				       	<p style="font-size:60px;color:black" Text-align:left;>Hello, <?php echo $_SESSION['name']; ?></p>
						<p style=color:black>After you update your details you will logout from the session.</p>
				
					<br> <br>
				<div class="container mb-3 mt-3">
					<table id="mydatatable" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Employee ID</th>
								<th>Full Name</th>
								<th>UserName</th>
								<th>Password</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
						<?php
						include 'db.php';
							$dt = date("Y.m.d");
						    $username = $_SESSION['name'];
						    $EmpID = $_SESSION['EmployeeID'];
						    $query= "SELECT * FROM team_member WHERE team_member_username= '$username'";
							$query_run = mysqli_query($con,$query);
							        	while ($row = mysqli_fetch_array($query_run))
							        	{
							        		$fn = $row['Full_Name'];
							        		$_SESSION['full_name']=$fn;
							        	}

						    $sql= "SELECT * FROM customuser WHERE User_Name='$username'";
							$query_run = mysqli_query($con,$sql);
							        	while ($row = mysqli_fetch_array($query_run))
							        	{
							        		$pwd = $row['Password'];
							        		$_SESSION['password']=$pwd;
							        	}
					?>
										<tr>
										<td><?php echo $EmpID; ?></td>
										<td><?php echo $fn; ?></td>
										<td><?php echo $username; ?></td>
										<td><?php echo $pwd; ?></td>
										<button class="modal-btn">Edit</button>
										<!--<<td><input type="button" class="Modal-btn" value="Edit" background: blue></td>-->
										<!--<td><a href="form.php" class ="btn btn-info" style ="background: blue">Edit</a></td> -->
										</tr>							
					    </tbody>
					</table>
				</div>	
			</div>
		
		</div>
	</div>

        <!-- PAGE CONTENT ENDS HERE -->
        <!-- MODAL -->
	<div class="modal-bg">
		<div class="modal">
			 <h2>Edit User Data</h2>
			<label for="employeeid">Employee ID:</label>
			<input type="text" name="employeeid" readonly="">
			<label for="full_name">Full Name:</label>
			<input type="text" name="fullname" required>
			<label for="username">User Name:</label>
			<input type="text" name="usename" required>
			<label for="password">Password:</label>
			<input type="text" name="password" required>
			<button>Submit</button>
		</div>

	</div>	


    <!-- SCRIPTS START HERE -->

    <!-- jQuery Custom Scroller CDN STARTS HERE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

    </script>
    <!-- jQuery Custom Scroller CDN ENDS HERE -->

	<script>
		$(document).ready( function () {
		$('#mydatatable').DataTable();
		} );

	</script> 
    
  	<script src="app.js"></script>
  </body>
</html>