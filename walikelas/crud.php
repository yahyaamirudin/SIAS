<?php  
	class CRUD 
	{
		public $connection;
		function __construct($host,$user,$pass,$db)
		{
			$this->connection = new mysqli($host,$user,$pass,$db);
		}

		public function fetch($table,$where = null){
			$sql = "SELECT*FROM $table";
			if($where !=null){
				$sql .="WHERE $where";
			}
			$query= $this->connection->query($sql) or die($this->connection->error);
			return $query->fetch_all(MYSQLI_BOTH);
		}

		public function insert($table,$row = null){
			$sql= "INSERT INTO $table";
			$row = null;
			$value = null;
			foreach ($row as $key => $nilai) {
				$row .=",".$key;
				$value .= ",'".$nilai."'";
			}

				$sql.= "(".substr($row, 1).")";
				$sql.= "VALUES(".substr($value,1).")";
				$query = $this->connection->prepare($sql)or die($this->connection->error);
				$query->execute();
			}
		}
?>