<?php
require_once ("config.php");

global $user;
$user->Logout();
header ('Location: login.php');
	exit;