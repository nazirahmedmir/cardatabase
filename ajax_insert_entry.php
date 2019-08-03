<?php
session_start();
require_once "config.php";
global $user;
if (!$user->is_logged())
{	
	exit;
}

$entry=new Entries();


$accountname=$_POST['accountname'];		
$accountpassword=$_POST['accountpassword'];		

if ($accountname!='' and $accountpassword!='')
{
	
	$cipher_method = 'aes-128-ctr';
	$enc_key = openssl_digest(php_uname(), 'SHA256', TRUE);
	$enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
	$crypted_token = openssl_encrypt($accountpassword, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);
	unset($accountpassword, $cipher_method, $enc_key, $enc_iv);

	
	$entry->username=$accountname;
	$entry->password=$crypted_token;
	$result=$entry->InsertNew();	
}

if ($result)
	echo json_encode (array('status'=>'success'));
else
	echo json_encode (array('status'=>'error','qry'=>$update_query));