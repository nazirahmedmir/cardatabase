<?php
class User extends Database
{
    protected $Username;
    protected $Password;
        
    function __construct ()
	{
		parent::__construct();
		
		if (isset ($_POST['Username']))
		{
			$this->SetUsername($_POST['Username']);
		}
		if (isset ($_POST['Password']))
		{
			$this->SetPassword($_POST['Password']);
		}		
		
	}
	
	function is_logged()
	{
		if (isset ($_SESSION['username']) and $_SESSION['username']!='')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * @return if falis return false if ok return session 
	 */
	function CheckLogin()
	{
		
		$stmt = $this->dbh->prepare("SELECT username, password FROM users
		WHERE username = :username AND password =  :password
		");
		$stmt->bindParam(':username', $this->Username);
		$stmt->bindParam(':password', $this->Password);
		$stmt->execute();
		
		if($stmt->rowCount() > 0 )
		{    
			
		
			$_SESSION['username'] = $this->Username;
			return true;
			
		}
		else
		{
			return false;
		}
		
	}
	
	function Logout()
	{
	  session_start();
	  unset($_SESSION['username']);
	}
	
    /**
     * @param $username
     * @return insert to private var
     */
    function SetUsername($username)
    {
        return $this->Username = mysql_real_escape_string($username);
    }
   
    /**
     * @param $password
     * @return isnert to private password var
     */
    function SetPassword($password)
    {
        return $this->Password = sha1(mysql_real_escape_string($password));
    }     
}


