<?php
    session_start();
    include 'db.php';

    $EmpID = $_SESSION['EmployeeID'];
 
    $At_LoginTime = strval(date("H:i"));
    $dt = date("Y.m.d");
    if(empty($_POST['todays_project'])) {
        echo "Please fill Today's Project Field";
        }
    else {
    
            $todays_project = $con->real_escape_string($_POST['todays_project']);

            //$At_LoginTime = $_POST['At_LoginTime'];//
            $At_LoginTime_Marked = True;
            //$_SESSION['At_LoginTime'] = $_POST['At_LoginTime'];
            
            $sql = "SELECT * FROM attendance WHERE ((Employee_ID= '$EmpID') AND (attendance_login_time_marked IS NOT NULL) AND (attendance_date= '$dt'))";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    exit("Your Todays Attendance Is Already Marked!");
                    } else {
                        $sql = "INSERT INTO attendance (Employee_ID, attendance_date, attendance_login_time, attendance_logout_time, attendance_login_time_marked, attendance_logout_time_marked, attedance_date_two, todays_project, created_at, updated_at) VALUES ('$EmpID', '$dt', '$At_LoginTime', 'NULL', '$At_LoginTime_Marked', 'NULL', 'NULL', '$todays_project', 'NULL', 'NULL')";
                        if(mysqli_query($con, $sql)){
                            echo "Records added successfully.";
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
                        }
                     }
         }          
    $con->close();
?>
