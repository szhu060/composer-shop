<?php
 require_once('db.php');
 
$db = new DBConnection();

$result = $db->getAllItemsReturnObj();


foreach($result as $thing) {
	if($thing->getId() == $_POST['idphp']){
		echo json_encode($thing->getDescription());
	}
}


?>