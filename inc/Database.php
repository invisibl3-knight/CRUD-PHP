<?php

Class Database{
	public $host   = DB_HOST; 
	public $name   = DB_USER; 
	public $pass   = DB_PASS; 
	public $dbname = DB_NAME; 
	
	public $link;
	public $error;
	
	public function __construct(){
		$this->connectDB();
	}
	
	private function connectDB(){
		$this->link = new mysqli($this->host, $this->name,$this->pass,$this->dbname);
		if(!$this->link){
			$this->error  = "Connection Failed".$this->link->connect_error;
			return false;
		}
	}
	
	
	
	
	//Read Data.
	
	public function read($query){
		$read_row = $this->link->query($query) or die ($this->link->error__LINE__);
		if($read_row->num_rows > 0){
			return $read_row;
		}
		else{
			return false;
		}
	}
	
	//Create Data.
	
	public function create($query){
		$create_row = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($create_row){
			header("Location:index.php?msg=".urlencode('Data Inserted Successfully !!'));
			exit();
		}
		else{
			die("Error :(".$this->link->errno.")");
		}
	}
	
	
	
	
}