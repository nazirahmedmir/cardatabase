<?php
require_once ("config.php");
global $db,$user;

if (!$user->is_logged())
{	
	//if the user is not logged in, redirect to login page
	header ('Location: login.php');
	exit;
}

$page_title="Search Cars";
?>
<?php require_once ("header_script.php")?>
<?php require_once ("header_navigation.php")?>
<?php require_once ("header.php")?>
  

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <p class="mt-5">Car Database Search</p>
		<br /><br />
        
		<form id="newaccount">
			<div class="form-group row">
				<label class="control-label col-2" for="searchqry">Name:</label>
				<div class="col-3">
					<input  class="form-control type="text" id="searchqry" name="searchqry" value="" />
				</div>
				
			</div>
			
			
		</form>
      </div>
    </div>
  </div>

<?php
$custom_scripts=<<<SCRIPTS
$( document ).ready(function() 
{
	$('#searchqry').autocomplete(
	{
		serviceUrl: 'ajax_search.php',
		onSelect: function (suggestion) 
		{
			
			// alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
		}
	});
});
SCRIPTS;
?>

<?php require_once ("footer.php");?>