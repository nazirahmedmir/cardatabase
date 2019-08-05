<?php
session_start();
ob_start();//for preventing unwanted output from supporting scripts
require_once "config.php";

if (isset ($_GET['ID']))
{
	$Entries=new Entries();
	$ID=$_GET['ID'];
	$ID=filter_var($ID, FILTER_VALIDATE_INT);
	$result=$Entries->DeleteEntry($ID);		
}
else
{
	$result=false;
}

$output=ob_end_clean();

if ($result)
{
	echo json_encode (array('status'=>'success'));
}
else
{
	echo json_encode (array('status'=>'error','error'=>$message));
}