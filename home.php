<?php
session_start();

require_once('db.php');
if(isset($_POST['submit']))
{
	if($_POST['username'] != "" || $_POST['password'] != "")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM fonctionnaire WHERE username = ? AND password = ? AND group_id = 0 ";
		$query = $conn->prepare($sql);
		$query->execute(array($username,$password));
		$row = $query->rowCount();
		$fetch = $query->fetch(); 
		if($row > 0) {
			$_SESSION['fonctionnaire'] = $fetch['id_fonction'];
			$_SESSION['username'] = $username;
			header("Location: admin.php");
		}
		else{
			
			$errors [] = "Invalid username or password";
			
		}
	}	
	else{
		$errors [] ="Please complete the required field!";
		
	}
	if($_POST['username'] != "" || $_POST['password'] != "")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM fonctionnaire WHERE username = ? AND password = ? AND group_id = 1";
		$query = $conn->prepare($sql);
		$query->execute(array($username,$password));
		$row = $query->rowCount();
		$fetch = $query->fetch(); 
		if($row > 0) {

			$_SESSION['fonctionnaire'] = $fetch['id_fonction'];
			$_SESSION['username'] = $username;
			header("location: user_page.php");
		}
	}
}

?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body class="bg-dark">

	<div class="container h-100">
		<div class="row h-100 mt-5 justify-content-center align-items-center">
			<div class="col-md-5 mt-5 pt-2 pb-5 align-self-center border bg-light">
				<h1 class="mx-auto w-25" >Login</h1>
				<?php 
					if(isset($errors) && count($errors) > 0)
					{
						foreach($errors as $error_msg)
						{
							echo '<div class="alert alert-danger">'.$error_msg.'</div>';
						}
					}
				?>
				<form method="POST" action="<?php  $_SERVER['PHP_SELF'] ; ?>">
					<div class="form-group">
						<label>Username:</label>
						<input type="text" name="username" placeholder="Username" class="form-control">
					</div>
					<div class="form-group">
					<label>Password:</label>
						<input type="password" name="password" placeholder="Enter Password" class="form-control">
					</div>
					<div class = "container">
						<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
</body>
</html
 