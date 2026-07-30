<?php

header("Access-Control-Allow-Origin: *");

$id = $_GET["id"];

$xml_link = "https://websoft-publisher.s3.amazonaws.com/output/fbmarketplace/9c533a0c05406df4451fd55dd7ef3e0c-a72b02bdeeef5b3f3518037573acc15f.xml";
$doc = new DOMDocument();
$doc->load($xml_link);
$items = $doc->getElementsByTagName("listing");
foreach ($items as $item) {
	$vin = '';
	$vehicle_id = '';
    foreach($item->childNodes as $child) {
		
		if($child->nodeName == 'vin') $vin = $child->nodeValue;
		if($child->nodeName == 'vehicle_id') $vehicle_id = $child->nodeValue;
	}
	if(isset($_GET["id"])) {
		if($id == $vehicle_id) {echo $vin;} 
	} else {
		echo $vehicle_id."|".$vin."\r\n";
	}
	
}


?>
