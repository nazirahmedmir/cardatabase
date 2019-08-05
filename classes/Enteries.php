<?php
class Entries extends Database
{	
	function __construct ()
	{
		parent::__construct();		
	}
	
	
	function GetList()
	{		
		$items=array();
		
		$stmt = $this->dbh->prepare("SELECT * FROM cars order by ID");
		$stmt->execute();
		
		if($stmt->rowCount() > 0 )
		{ 
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$items[]=$row;
			}
		}
		return $items;		
	}	
	
	function SearchList($qry)
	{		
		$items=array();
		
		$stmt = $this->dbh->prepare("SELECT Name, ID FROM cars where Name like '" . $qry . "%'");
		$stmt->execute();
		
		if($stmt->rowCount() > 0 )
		{ 
			while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$items[]=$row;
			}
		}
		return $items;		
	}	

	
	function GetEntry($ID)
	{		
		$items=array();
		
		$stmt = $this->dbh->prepare("SELECT * FROM cars where ID=:ID");
		$stmt->bindParam(':ID',$ID,PDO::PARAM_INT);
		$stmt->execute();
		
		if($stmt->rowCount() > 0 )
		{ 
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		else
		{
			return false;
		}
		
	}
	
	function DeleteEntry($ID)
	{		
		$stmt = $this->dbh->prepare("DELETE FROM cars where ID=:ID");
		$stmt->bindParam(':ID',$ID,PDO::PARAM_INT);
		try 
		{
			$this->dbh->beginTransaction();
			$result=$stmt->execute();		
			if ($result)
			{
				$this->dbh->commit();			
				return true;
			}
			else
			{
				$this->dbh->rollback();
				print_r($stmt->errorInfo());
				return false;
			}
		}
		catch (Exception $e)
		{			
			$this->dbh->rollback();
			throw $e;
			return false;
		}
	}	

	function prepareupdate ()
	{
		$this->dbh->query ("TRUNCATE cars");
		return true;
	}
	
	function InsertNew($Data)
	{	
		$stmt = $this->dbh->prepare("INSERT INTO cars (Make, Name, Trim, Year, Body, EnginePosition, EngineType, EngineCompression, EngineFuel, Image, Country, WeightKG, TransmissionType, Price, Tags) VALUES (:Make, :Name, :Trim, :Year, :Body, :EnginePosition, :EngineType, :EngineCompression, :EngineFuel, :Image, :Country, :WeightKG, :TransmissionType, :Price, :Tags)");
        
		$keys=array (
				'Make', 'Name', 'Trim', 'Year', 'Body', 'EnginePosition', 'EngineType', 'EngineCompression', 'EngineFuel', 'Image', 'Country', 'WeightKG', 'TransmissionType', 'Price', 'Tags');
				
		foreach ($keys as $key)
		{
			if (!isset ($Data[$key]))
			{
				$Data[$key]=null;
			}
		}
		
		try 
		{				
				$this->dbh->beginTransaction();
				$stmt->bindParam(':Make',$Data['Make'],PDO::PARAM_STR);
				$stmt->bindParam(':Name',$Data['Name'],PDO::PARAM_STR);
				$stmt->bindParam(':Trim',$Data['Trim'],PDO::PARAM_STR);
				$stmt->bindParam(':Year',$Data['Year'],PDO::PARAM_INT);
				$stmt->bindParam(':Body',$Data['Body'],PDO::PARAM_STR);
				$stmt->bindParam(':EnginePosition',$Data['EnginePosition'],PDO::PARAM_STR);
				$stmt->bindParam(':EngineType',$Data['EngineType'],PDO::PARAM_STR);
				$stmt->bindParam(':EngineCompression',$Data['EngineCompression'],PDO::PARAM_INT);
				$stmt->bindParam(':EngineFuel',$Data['EngineFuel'],PDO::PARAM_STR);
				$stmt->bindParam(':Image',$Data['Image'],PDO::PARAM_STR);
				$stmt->bindParam(':Country',$Data['Country'],PDO::PARAM_STR);
				$stmt->bindParam(':WeightKG',$Data['WeightKG'],PDO::PARAM_INT);
				$stmt->bindParam(':TransmissionType',$Data['TransmissionType'],PDO::PARAM_STR);
				$stmt->bindParam(':Price',$Data['Price'],PDO::PARAM_INT);
				$stmt->bindParam(':Tags',$Data['Tags'],PDO::PARAM_STR);
				
				$result=$stmt->execute(); 
				if ($result)
				{
					$this->dbh->commit();					
					return true;
				}
				else
				{
					$this->dbh->rollback();
					print_r($stmt->errorInfo());
					return false;
				}
				
		}
		catch (Exception $e)
		{			
			$this->dbh->rollback();
			throw $e;
			return false;
		}
		
	}
	
	function UpdateEntry($Data)
	{	
		$stmt = $this->dbh->prepare("UPDATE cars SET Make=:Make, Name=:Name, Trim=:Trim, Year=:Year, Body=:Body, EnginePosition=:EnginePosition, EngineType=:EngineType, EngineCompression=:EngineCompression, EngineFuel=:EngineFuel, Country=:Country, WeightKG=:WeightKG, TransmissionType=:TransmissionType, Price=:Price, Tags=:Tags where ID=:ID");
        
		$keys=array (
				'Make', 'Name', 'Trim', 'Year', 'Body', 'EnginePosition', 'EngineType', 'EngineCompression', 'EngineFuel', 'Image', 'Country', 'WeightKG', 'TransmissionType', 'Price', 'Tags');
				
		foreach ($keys as $key)
		{
			if (!isset ($Data[$key]))
			{
				$Data[$key]=null;
			}
		}
		
		try 
		{				
				$this->dbh->beginTransaction();
				$stmt->bindParam(':Make',$Data['Make'],PDO::PARAM_STR);
				$stmt->bindParam(':Name',$Data['Name'],PDO::PARAM_STR);
				$stmt->bindParam(':Trim',$Data['Trim'],PDO::PARAM_STR);
				$stmt->bindParam(':Year',$Data['Year'],PDO::PARAM_INT);
				$stmt->bindParam(':Body',$Data['Body'],PDO::PARAM_STR);
				$stmt->bindParam(':EnginePosition',$Data['EnginePosition'],PDO::PARAM_STR);
				$stmt->bindParam(':EngineType',$Data['EngineType'],PDO::PARAM_STR);
				$stmt->bindParam(':EngineCompression',$Data['EngineCompression'],PDO::PARAM_INT);
				$stmt->bindParam(':EngineFuel',$Data['EngineFuel'],PDO::PARAM_STR);
				
				$stmt->bindParam(':Country',$Data['Country'],PDO::PARAM_STR);
				$stmt->bindParam(':WeightKG',$Data['WeightKG'],PDO::PARAM_INT);
				$stmt->bindParam(':TransmissionType',$Data['TransmissionType'],PDO::PARAM_STR);
				$stmt->bindParam(':Price',$Data['Price'],PDO::PARAM_INT);
				$stmt->bindParam(':Tags',$Data['Tags'],PDO::PARAM_STR);
				
				$stmt->bindParam(':ID',$Data['ID'],PDO::PARAM_INT);
				
				$result=$stmt->execute(); 
				if ($result)
				{
					$this->dbh->commit();					
					return true;
				}
				else
				{
					$this->dbh->rollback();
					print_r($stmt->errorInfo());
					return false;
				}
				
		}
		catch (Exception $e)
		{			
			$this->dbh->rollback();
			throw $e;
			return false;
		}
		
	}
}


