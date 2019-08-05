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
		
		$stmt = $this->dbh->prepare("SELECT * FROM cars");
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
					
				}
				else
				{
					$this->dbh->rollback();
					print_r($stmt->errorInfo());					
				}
				
		}
		catch (Exception $e)
		{			
			$this->dbh->rollback();
			throw $e;
		}
		
		
        return true;
	}
}


