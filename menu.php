<?phpsession_regenerate_id();?>
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

<body>

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
                    <a href="logoutfortheday.php" class="btn btn-light">
                        <font color="#1B4965">Logout</font>
                    </a>
                </li>
            </ul>
        </nav>
        <!--SIDEBAR ENDS HERE-->
            <div id="content">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>Menu
                </button>
                <hr>
            </div>
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
