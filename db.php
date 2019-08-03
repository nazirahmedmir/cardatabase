<?php
define ('MYSQL_USER','root');
define ('MYSQL_PASSWORD','mysql');
define ('MYSQL_HOST','localhost');
define ('MYSQL_DATABASE','cars');

// mb_internal_encoding('UTF-8');
// mb_http_output('UTF-8');

try 
{
	$link = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE . ';charset=utf8mb4',
				MYSQL_USER,
				MYSQL_PASSWORD,
				array(
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_PERSISTENT => false
				)
			);
}
catch(PDOException $e)
{
	echo "Connection failed: " . $e->getMessage();
}

