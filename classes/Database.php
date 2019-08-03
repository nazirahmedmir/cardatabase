<?php
class Database
{
    private $dsn = 'mysql:dbname=test;host=localhost';
	private $user = 'mysql';
	private $password = '';
	
	protected $dbh;
    function __construct()
    {
		
		
		try 
		{			
			$this->dbh = new PDO($this->dsn, $this->user, $this->password);    
		} 
		catch (PDOException $e) 
		{
			echo 'Connection failed: ' . $e->getMessage();
			
		}
	}
}