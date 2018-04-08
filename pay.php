<?php

$button = $_POST["paytophp"];

if($button){

	$response = array(
	"paytophp" => $button	
);

echo json_encode($response);
}

?>