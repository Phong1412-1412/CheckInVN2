<?php
class Coordinates{
    private $conn;
    //model
    public $id;
    public $id_famouspalce;
    public $longitude;
    public $latitude;

    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery= "SELECT * FROM coordinates ";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }  
    //get only
    public function get()
    {
    	if(isset($_GET['id_famousplace'])){
    		$item = $_GET['id_famousplace'];
    		$sqlQuery="SELECT * FROM coordinates WHERE id_famousplace = '$item'" ;
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->id = $row["id"];
       			$this->id_famousplace = $row["id_famousplace"];
                $this->longitude = $row["longitude"];
                $this->latitude = $row["latitude"];
       		}
       	}
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }
}
?>