<?php
require_once("item.php");

	 class DBConnection {

		 	private $conn;

		 	private function getConnInstance(){
		 		if(!$this->conn){
		 			$this->conn = new PDO('mysql:host=localhost;dbname=iShop;charset=utf8mb4','root','root');
		 		}
		 		return $this->conn;
		 	}

		 	public function getAllItemsReturnArr(){
		 		
		 		$stmt = $this->getConnInstance()->query("SELECT * FROM iShop.item");
		 		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		 		return $result;
		 	}

		 	public function getAllItemsReturnObj(){
		 		
		 		$stmt = $this->getConnInstance()->query("SELECT * FROM iShop.item");
		 		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		 		$items = array();
		 		foreach($result as $row){
		 			$item = new Item();
		 			$items[] = $item->arrayAdapter($row);
		 		}
		 		return $items;
		 	}

	}




?>