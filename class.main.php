<?php
	//Configuration File
	require_once("class.db.php");
	require_once("class.main.php");
	require_once("config.php");


	class main {
		public $link, $idx, $std_id, $api, $action;
		
		function __construct(){
			$db_connection = new db();
			$this->link = $db_connection->connect();
			return $this->link;
		} 
		
		//Main Function
		public function takecall(){
			if(strtolower($this->action) == 'show'){
				$query = " SELECT * FROM students WHERE std_id='$this->std_id' LIMIT 1";
				$results = SELF::fetch_by_query($query);
				if(count($results)==1) {
					return JSON_ENCODE($results);
				}
				else{
					$arr = array("error" => "No Student to display");
					return JSON_ENCODE($arr);
				}				
			}
			else if(strtolower($this->action) == 'delete'){
				$query = $this->link->prepare("DELETE FROM students WHERE std_id= :std_id");
				$query->bindParam(':std_id', $this->std_id, PDO::PARAM_STR);
				$query->execute($values);
				$count = $query->rowCount();
				$arr = array("error" => "Student record deleted.");
				return JSON_ENCODE($arr);				
			}
           else if(strtolower($this->std_id) == 'all'){
			  
			  $query = " SELECT * FROM students ";
				$results = SELF::fetch_by_query($query);
				return JSON_ENCODE($results);
			   				
		   }
           else if(strtolower($this->action) == 'firstname'){
				$query = " SELECT firstname FROM students WHERE std_id='$this->std_id' LIMIT 1";
				$results = SELF::fetch_by_query($query);
				if(count($results)==1) {
					return JSON_ENCODE($results);
				}
				else{
					$arr = array("error" => "No Record to display");
					return JSON_ENCODE($arr);
				}				
			}
			else if(strtolower($this->action) == 'lastname'){
				$query = " SELECT lastname FROM students WHERE std_id='$this->std_id' LIMIT 1";
				$results = SELF::fetch_by_query($query);
				if(count($results)==1) {
					return JSON_ENCODE($results);
				}
				else{
					$arr = array("error" => "No Record to display");
					return JSON_ENCODE($arr);
				}				
			}
			else if(strtolower($this->action) == 'email'){
				$query = " SELECT email FROM students WHERE std_id='$this->std_id' LIMIT 1";
				$results = SELF::fetch_by_query($query);
				if(count($results)==1) {
					return JSON_ENCODE($results);
				}
				else{
					$arr = array("error" => "No Record to display");
					return JSON_ENCODE($arr);
				}				
			}
			
		}
		
		

		public function fetch_by_query($query) {
			try {
				$query = $this->link->prepare($query);
				$query->execute();
				$results = $query->fetchAll();
				$this->column_name = $query->fetchColumn();
				$this->counter = $query->rowCount();
			}
			catch (Exception $e) {
				$results = array("ERROR");
			}	
			return $results;
		}

		
	}
?>