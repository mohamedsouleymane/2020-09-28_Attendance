
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="resources/css/fstyle.css" />

</head>
<body>
<br />
<div class="form">
<h1  style="color: white;">Login</h1>
<h5  style="color: white;">Enter your user name and password </h5>
<h6  style="color: white;"><U>Login</U></h6>
<form action="authenticate.php" method="post" name="login">
<input type="text" name="username" placeholder="Enter User Name" required />
<input type="password" name="password" placeholder="Enter Password" required />
<input name="submit" type="submit" value="Login" />
<input name="submit" type="submit" value="Login with google" />
</form>

</body>
</html>
