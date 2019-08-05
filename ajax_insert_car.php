<?php
session_start();
ob_start();//for preventing unwanted output from supporting scripts
require_once "config.php";

$errors=false;
// print_r ($_FILES);
if ($_FILES['image']['name']) 
{
	if (!$_FILES['image']['error']) 
	{
		
		if (!is_uploaded_file($_FILES['image']['tmp_name']))
		{
			header("HTTP/1.1 400 Invalid file upload.");			
			exit;
		}
		
		$name = md5(rand(100, 200));
		$ext = explode('.', $_FILES['image']['name']);
		$filename = $name . '.' . $ext[1];
		
		$destination = 'uploads/' . $filename; //change this directory	
		
		// echo $destination;
		
		
		$location = $_FILES["image"]["tmp_name"];
		// echo $destination;exit;
		// Sanitize input
		if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $_FILES['image']['name'])) {
			header("HTTP/1.1 400 Invalid file name.");			
			exit;
		}
		$ext =pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		// Verify extension
		if (!in_array(strtolower($ext), array("gif", "jpg", "png"))) {
			header("HTTP/1.1 400 Invalid extension.");
			exit;
		}
		
		$folderPath="uploads/";
		$fileNewName=$name;
		$file=$destination;
		
		$moved =move_uploaded_file($location, $destination);
		if( $moved )
		{
			$protocol = isset( $_SERVER['HTTPS'] ) ? 'https://' : 'http://';
			$domain=$_SERVER['HTTP_HOST'];
						
			$sourceProperties = getimagesize($destination);
			$imageType = $sourceProperties[2];

			switch ($imageType) 
			{
				case IMAGETYPE_PNG:
					$imageResourceId = imagecreatefrompng($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
					break;


				case IMAGETYPE_GIF:
					$imageResourceId = imagecreatefromgif($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
					break;


				case IMAGETYPE_JPEG:
					$imageResourceId = imagecreatefromjpeg($file); 
					$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
					imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". $ext);
					break;
					
				default:
					echo "Invalid Image type.";
					exit;
					break;

			}
			
		}
		else
		{
			$message = 'Ooops!  Error uploading the file :  '.$_FILES['image']['error'];
			$errors=true;
		}
	}
	else
	{
		$message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['image']['error'];
		$errors=true;
	}
}
//end file uploading
if (1==1)
{
	$year=$_POST['year'];
	$make=$_POST['make'];		
	$name=$_POST['name'];
	$body=$_POST['body'];		
	$trim=$_POST['trim'];		
	$tags=$_POST['tags'];			
	$engineposition=$_POST['engineposition'];			
	$enginecompression=$_POST['enginecompression'];			
	$enginetype=$_POST['enginetype'];			
	$enginefuel=$_POST['enginefuel'];			
	$country=$_POST['country'];			
	$weight=$_POST['weight'];			
	$transmissiontype=$_POST['transmissiontype'];			
	$price=$_POST['price'];			
	
	$Entries=new Entries();
	$Data=array();
			
	isset ($make) ? $Data['Make']=$make : $Data['Make']='';
	isset ($name) ? $Data['Name']=$name : $Data['Name']='';
	isset ($trim) ? $Data['Trim']=$trim : $Data['Trim']='';
	isset ($year) ? $Data['Year']=$year : $Data['Year']='';
	isset ($body) ? $Data['Body']=$body : $Data['Body']='';
	isset ($engineposition) ? $Data['EnginePosition']=$engineposition : $Data['EnginePosition']='';
	isset ($enginetype) ? $Data['EngineType']=$enginetype : $Data['EngineType']='';
	isset ($enginecompression) ? $Data['model_engine_compression']=$enginecompression : $Data['EngineCompression']=null;
	isset ($enginefuel) ? $Data['EngineFuel']=$enginefuel : $Data['EngineFuel']='';
	isset ($country) ? $Data['Country']=$country : $Data['Country']='';
	isset ($weight) ? $Data['WeightKG']=$weight : $Data['WeightKG']=null;
	isset ($transmissiontype) ? $Data['TransmissionType']=$transmissiontype : $Data['TransmissionType']='';
	
	!empty ($price) ? $Data['Price']=$price : $Data['Price']=rand(5000, 15000);
	
	!empty ($filename) ? $Data['Image']=$filename : $Data['Image']='';
	
	
	
	$result=$Entries->InsertNew($Data);
	
	unset ($Data);		
	
	$message="Record saved";
}
else
{
	$result=false;
}

$output=ob_end_clean();

if ($result)
	echo json_encode (array('status'=>'success'));
else
	echo json_encode (array('status'=>'error','error'=>$message));


function imageResize($imageResourceId,$width,$height) {


    $targetWidth =200;

    $targetHeight =120;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);

    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;

}
