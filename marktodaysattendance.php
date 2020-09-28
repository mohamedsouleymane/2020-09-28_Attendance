<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Attendance System</title>

    <!-- Bootstrap CSS CDN Link STARTS HERE -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Bootstrap CSS CDN Link ENDS HERE -->


    <!-- Our Custom CSS STARTS HERE -->
    <link rel="stylesheet" href="resources/css/attedance-style.css">
    <!-- Scrollbar Custom CSS ENDS HERE -->

    <!-- External CSS STARTS HERE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- External CSS ENDS HERE -->

</head>
<?php include 'menu.php';?>
<body>

        <div class="wrapper">
         <!-- PAGE CONTENT STARTS HERE -->
        <div id="content">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>Menu
                </button>
                <hr>
                <h2>Hi <?php echo $_SESSION['Employee_fn'];?>, Lets Mark Today's Attendence.</h2>
                
                <br>
                <!-- ATTENDANCE FORM STARTS HERE -->
                <form action="saveAttendance.php" method="post">  
                    <div class="row">
                        <div class="col">
                            <label>Today's Date</label><br>
                            <input value=" <?php echo date("F j, Y");?>"; class="form-control" readonly="">
                            
                        </div>
                        <div class="col">
                            <label>Employee ID</label>
                            <input class="form-control"; value=" <?php echo $_SESSION['EmployeeID'];?>" readonly="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>"Today Project"</label>
                            <input type="text" class="form-control" id="todays_project" name="todays_project" placeholder="Enter Todays Project">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Attendance For</label><br>
                            Login &nbsp;&nbsp;&nbsp; <input type="radio" id="" name="time" checked="" onclick="show1();"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="col">
                            <label>Time</label>
                            <input class="form-control"; value=" <?php $logtime = date("H:i"); $_SESSION['At_LoginTime']=$logtime; echo $_SESSION['At_LoginTime'];?>" readonly="" name="At_LoginTime">
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-info btn-lg btn-block">Submit</button>
                        </div>
                    </div>
                </form>
                <!-- ATTENDANCE FORM ENDS HERE -->
            </div>
        </div>
        <!-- PAGE CONTENT ENDS HERE -->

    </div>


    <!-- SCRIPTS START HERE -->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!--jQuery-->

    <!-- Bootstrap JS STARTS HERE -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Bootstrap JS ENDS HERE -->


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

    <!-- SCRIPTS ENDS HERE -->

</body>

</html>