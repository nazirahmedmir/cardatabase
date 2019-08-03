<?php
require_once ("config.php");
global $db,$user;

if (isset ($_POST['Username']) and isset ($_POST['Password']))
{
	
	if ($user->CheckLogin())
	{
		header ('Location: index.php');
		exit;
	}
	else
	{
		$error="Invalid Username/Password, please try again!";
	}
}

if ($user->is_logged())
{	
	//if the user is not logged in, redirect to login page
	header ('Location: index.php');
	exit;
}
$page_title="Login";
?>
<?php require_once ("header_script.php")?>
<?php require_once ("header.php")?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-6 text-center">
        <h1 class="mt-5">User Login</h1>
        <p class="lead"><?php echo $error?></p>
        
		
		<form id="loginform" method="post" action="login.php">
			<div class="form-group">
			<label for="Username">Username</label>
			<input type="txt" class="form-control" name="Username" id="username" aria-describedby="usernameHelp" placeholder="Enter Username">
			<small id="usernameHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
			</div>
			<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
		
		
		
      </div>
    </div>
  </div>

<?php require_once ("footer.php");
