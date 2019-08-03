<?php
class Entries extends Database
{
    public $password_list;
	public $username;
	public $password;
	
	function __construct ()
	{
		parent::__construct();
		
		$stmt = $this->dbh->prepare("SELECT * FROM accounts");		
		$stmt->execute();
		
		if($stmt->rowCount() > 0 )
		{ 
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$this->password_list[]=$row;			
			}
		}
		else
		{
			$this->password_list=array ();
		}
		
	}
	
	
	function GetList()
	{		
		return $this->password_list;		
	}

	function InsertNew()
	{		
		$stmt = $this->dbh->prepare("INSERT INTO accounts (name, password) VALUES (:username,    
        :password)");
        
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);        
        $stmt->execute();        
        return true;
	}
}


