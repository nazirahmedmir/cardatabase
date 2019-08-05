<?php
session_start();
require_once "config.php";

if (isset ($_GET['query']))
{
	ob_start();//for preventing unwanted output from supporting scripts
	$Entries=new Entries();
	$query=$_GET['query'];
	$query=filter_var($query, FILTER_SANITIZE_STRING);
	$result=$Entries->DeleteEntry($ID);	
	$rows=$Entries->SearchList($query);
	$found=array();
	
	if (count($rows))
	{
		foreach ($rows as $row)
		{
			$found[]=array ('value'=>$row['Name'],'data'=>$row['ID']);						
		}
	}
	
	$output=ob_end_clean();
	$result=array();
	$result["suggestions"]=$found;
	echo json_encode ($result);
}