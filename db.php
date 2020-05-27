<?php 

class createDB{

	public $db_name;
	public $table_name;
	public $server ;
	public $user ;
	public $password ;

	public  $con;

	public function __construct(
		$db_name = "shopping",
		$table_name = "items",
	$server = "localhost",
	$user = "root",
	$password = ""

	){

			$this->db_name = $db_name;
			$this->server = $server;
			$this->table_name = $table_name;
			$this->user = $user;
			$this->password = $password;

			//create connection 
			$this->con = mysqli_connect($server,$user,$password);

			//check connection 

			if (!$this->con){
				die("Connection failed".mysqli_connect_error());
			}

			//create querry

			$sql = "CREATE DATABASE IF NOT EXISTS $db_name";

			//execute query 

			if(mysqli_query($this->con,$sql)){

				$this->con = mysqli_connect($server,$user,$password,$db_name);

				//sql to create table

				$sql =  "CREATE TABLE IF NOT EXISTS $table_name

					(
					id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					p_image VARCHAR(100),
					p_name VARCHAR(25) NOT NULL,
					sp_price FLOAT,
					p_rice FLOAT

					)					
					";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					
					echo "Unable to create table ".$table_name.": ".mysqli_error($this->con);
				}
			}

	}






	public function getData(){

		//query 
		$sql = "SELECT * FROM $this->table_name";
		//execute qery
		$result = mysqli_query($this->con,$sql);
		        	if (mysqli_num_rows($result)>0){
		        		return $result;
		        	}else 
		        	{
		        		//echo "Failed to Retrieve data : ". mysqli_error($this->con);
		        		return false;
		        	}

	}


}