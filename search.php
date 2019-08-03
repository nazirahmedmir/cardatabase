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
        <h1 class="mt-5">Car Database Manager</h1>
        <p class="lead">Insert New Password</p>
		<form id="newaccount">
			<div class="form-group row">
				<label class="control-label col-2" for="accountname">Account Name</label>
				<div class="col-6">
				<input  class="form-control type="text" id="accountname" name="accountname" value="" /></div>
				</div>
				
				<div class="form-group row">
				<label class="control-label col-2" for="accountpassword">Account Password</label>
					<div class="col-6">
					<input  class="form-control type="password" id="accountpassword" name="accountpassword" value="" />
					</div>
				</div>
				<div class="col-1">
					<button class="account_insert_btn btn btn-primary">Save</button>
				</div>					
		</form>
		
		<p class="lead">Existing Accounts</p>
		
        <?php
			$Entry=new Entries();
			$entries=$Entry->GetList();
			if (count ($entries))
			{
				echo '<ul>';
				foreach ($entries as $entry)
				{
					$crypted_token=$entry['password'];
					$username=$entry['name'];
					
					list($crypted_token, $enc_iv) = explode("::", $crypted_token);;
					$cipher_method = 'aes-128-ctr';
					$enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
					$token = openssl_decrypt($crypted_token, $cipher_method, $enc_key, 0, hex2bin($enc_iv));
					unset($crypted_token, $cipher_method, $enc_key, $enc_iv);				  
					echo '<li>' . $username . ' - ' . '<input type="text" id="password_"' . $entry['ID'] . ' value="' . $token . '" /></li>';
					
					
				}
				echo '</ul>';
			}
		?>
      </div>
    </div>
  </div>

<?php require_once ("footer.php");?>