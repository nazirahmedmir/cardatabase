<?php
set_time_limit (200);
require_once "config.php";
$Entries=new Entries();
$Entries->prepareupdate();

$url="https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getMakes";
$Makes=json_decode(getData($url),true);
$Makes=$Makes['Makes'];
foreach ($Makes as $Make)
{	
	$url="https://www.carqueryapi.com/api/0.3/?callback=?&cmd=getModels&make=" . $Make['make_id'];
	$Models=json_decode(getData($url),true);	
	$Models=$Models['Models'];
	foreach ($Models as $Modal)
	{		
		$url="https://www.carqueryapi.com/api/0.3/?callback=&cmd=getModel&model=" . $Modal['model_name'];		
		$Cars=getData($url);		
		$Cars=json_decode($Cars,true);
		foreach ($Cars as $Car)
		{
			$Data=array();
			
			isset ($Car['model_make_id']) ? $Data['Make']=$Car['model_make_id'] : $Data['Make']='';
			isset ($Car['model_name']) ? $Data['Name']=$Car['model_name'] : $Data['Name']='';
			isset ($Car['model_trim']) ? $Data['Trim']=$Car['model_trim'] : $Data['Trim']='';
			isset ($Car['model_year']) ? $Data['Year']=$Car['model_year'] : $Data['Year']='';
			isset ($Car['model_body']) ? $Data['Body']=$Car['model_body'] : $Data['Body']='';
			isset ($Car['model_engine_position']) ? $Data['EnginePosition']=$Car['model_engine_position'] : $Data['EnginePosition']='';
			isset ($Car['model_engine_type']) ? $Data['EngineType']=$Car['model_engine_type'] : $Data['EngineType']='';
			isset ($Car['model_engine_compression']) ? $Data['model_engine_compression']=$Car['model_make_id'] : $Data['EngineCompression']=null;
			isset ($Car['model_engine_fuel']) ? $Data['EngineFuel']=$Car['model_engine_fuel'] : $Data['EngineFuel']='';
			isset ($Car['make_country']) ? $Data['Country']=$Car['make_country'] : $Data['Country']='';
			isset ($Car['model_weight_kg']) ? $Data['WeightKG']=$Car['model_weight_kg'] : $Data['WeightKG']=null;
			isset ($Car['model_transmission_type']) ? $Data['TransmissionType']=$Car['model_transmission_type'] : $Data['TransmissionType']='';
			$Data['Price']=rand(5000, 15000);
			
			$Entries->InsertNew($Data);
			
			unset ($Data);			
			
		}
	}
}

function getData($url) 
{	
	// Initialize session and set URL.
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);

	
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch,CURLOPT_USERAGENT,getRandomUserAgent());
		
	$response = curl_exec($ch);
	curl_close($ch);
	$response=trim ($response,'?;)(');
	return $response;
}

function getRandomUserAgent()
{
 $userAgents=array(
 "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6",
 "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
 "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
 "Opera/9.20 (Windows NT 6.0; U; en)",
 "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",
 "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",
 "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",
 "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48" 
 );
 $random = rand(0,count($userAgents)-1);
 
 return $userAgents[$random];
}


?>