<?php
class Province{
    private $conn;
    public $db_table="province";
    //model
    public $id;
    public $province_name;
    public $description;
    public $image;
    public $favorite_checked;

    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery= "SELECT * FROM province ";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }  
    //get only
    public function get()
    {
    	if(isset($_GET['id'])){
    		$item = $_GET['id'];
    		$sqlQuery="SELECT * FROM province WHERE id = '$item'" ;
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->id = $row["id"];
       			$this->province_name = $row["provinceName"];
                $this->description = $row["description"];
                $this->image = $row["image"];
                $this->favorite_checked = $row["favoriteChecked"];
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