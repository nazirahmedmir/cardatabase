<?php
class Database
{
    private $dsn = 'mysql:dbname=cars;host=localhost';
	private $user = 'root';
	private $password = 'mysql';
	
	protected $dbh;
    function __construct()
    {
		
		
		try 
		{			
			$this->dbh = new PDO($this->dsn, $this->user, $this->password); 
			$this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		} 
		catch (PDOException $e) 
		{
			echo 'Connection failed: ' . $e->getMessage();
			
		}
	}
}