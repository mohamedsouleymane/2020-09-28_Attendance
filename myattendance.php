<?php
    session_start();
    include 'db.php';
    $query = "SELECT * FROM attendance ORDER BY attendance_date asc";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>

<head>
  	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>My Attendance...<</title>
	
	<!-- CSS FILES LINK FOR THE DATATABLE-->	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
	<!-- JAVASCRIPT FOR JQUERY-->
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<!-- SCRIPT FOR JQUERY DATATABLE-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script> 
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
                    <a close() href="profil.php">My Profile</a>
                    
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
                <div style="height:30px; display:inline; float: left; text-align:left; font-size:200%;">My Attendence |
                </div>
                <div  align="right" id="bar2"; style="display:inline; float: right;" >
	                <button type="button" id="sidebarCollapse" class="btn btn-info" style="background-color: #4CAF50;">
	                <i class="fas fa-align-right"; align-rignt;></i>Export Excel
	                </button>
                </div>
                <div style="clear:both"></div>
                <br>
                <div class="input-daterange">
	                <div class="col-md-3" style="position:absolute; display:inline; margin-left:100px; width:260px">
	                   <input type="text" name="from_date" id="from_date" class="form-control"/>
	                </div>
	                <div class="col-md-3" style="position:absolute; display:inline; margin-left:450px; width:260px">
	                   <input type="text" name="to_date" id="to_date" class="form-control" />
	                </div>
                </div>
			     </div>

            <div class="col-md-5"; style="position:absolute; display:inline; margin-left:740px;">
                <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />
            </div>
            <div style="clear:both"></div>

				<br />
        <br />
        <br />
                        
				<div id="order_table">
				<table id="mydatatable" class="table table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th>Project</th>
							<th>Login</th>
							<th>Logout</th>
						</tr>
					</thead>
          <?php
            $i=1;
            while($row = mysqli_fetch_array($result))
            {
              ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["attendance_date"]; ?></td>
                    <td><?php echo $row["todays_project"]; ?></td>
                    <td><?php echo $row["attendance_login_time"]; ?></td>
                    <td><?php echo $row["attendance_logout_time"]; ?></td>
                </tr>
              <?php 
              $i=$i+1;
            }
            ?>
				</table>
			</div>
		</div>

    </div>

        <!-- PAGE CONTENT ENDS HERE -->

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


    <!-- SCRIPTS ENDS HERE -->
 
  </body>
</html>
<script>
      $(document).ready(function(){
          $.datepicker.setDefaults({          
            format: 'yyyy-mm-dd'
          });
          $(function(){
            $("#from_date").datepicker();
            $("#to_dat e").datepicker();
          });
          
          $('#filter').click(function(){
             var from_date = $('#from_date').val();
             var to_date = $('#to_date').val();
             if(from_date != '' && to_date != '')
             {
                $.ajax({
                  url:"filter.php",
                  method:"POST",
                  data:{from_date:from_date, to_date:to_date}
                  success:function(data)
                  {
                    $('#order_table').html(data);
                  }
              });
          }
          else
          {
            alert("Please Select Date");
            success:function(data)
            {
                $('#order_table').html(data);
            }
          }
      });
    });

  </script> 