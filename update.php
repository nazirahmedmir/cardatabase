<?php
require_once ("config.php");
global $db,$user;

if (!$user->is_logged())
{	
	//if the user is not logged in, redirect to login page
	header ('Location: login.php');
	exit;
}

$page_title="Update Database";
?>
<?php require_once ("header_script.php")?>
<?php require_once ("header_navigation.php")?>
<?php require_once ("header.php")?>
  

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">Car Database Manager</h1>
        <a href="" class="btn btn-warning" id="update-btn">Click Here to start update</a>
		<div id="output">
		</div>
		
		<!-- Modal -->
	<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		  <div class="modal-body text-center">
			<div class="loader"></div>
			<div clas="loader-txt">
			  <p>Please wait!<br><br><small>it may take several mintues for database to update</small></p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
      </div>
    </div>
  </div>

<?php require_once ("footer.php");?>