<?php
set_time_limit (200);
require_once "config.php";
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