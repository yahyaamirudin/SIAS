<?php  
	class CRUD 
	{
		public $connection;
		function __construct($host,$user,$pass,$db)
		{
			$this->connection = new mysqli($host,$user,$pass,$db);
		}
	}
?>