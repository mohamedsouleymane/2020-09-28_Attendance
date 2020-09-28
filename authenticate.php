<?php session_start();?>
<?php
include 'db.php';

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT User_Name, password FROM customuser WHERE User_Name = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
	$stmt->bind_result($username, $password);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
		if ($_POST['password'] === $password) {
			// Verification success! User has loggedin!
			// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];

			//---------------------------------------------------------------------------
			if ($requete = $con->prepare('SELECT Employee_ID, Full_Name FROM team_member WHERE Team_Member_Username = ?')) {
				$requete->bind_param('s', $_POST['username']);
	 			$requete->execute();
	 			$requete->store_result();
	 			if ($requete->num_rows > 0) {
					$requete->bind_result($EmpID, $Full_Name);
					$requete->fetch();
					$_SESSION['EmployeeID'] = $EmpID;
					$_SESSION['Employee_fn'] = $Full_Name;
					//echo $_SESSION['loggedin'] ;
					//echo $_SESSION['name'] ;
					header('Location:menu.php');
				}
			}

			//---------------------------------------------------------------------------

			
		} else {
			// Incorrect password
			echo 'Incorrect username and/or password!';
		}
	} else {
		// Incorrect username
		echo 'Incorrect username and/or password!';
	}
	$stmt->close();
	
}
?>
