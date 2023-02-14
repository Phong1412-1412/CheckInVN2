<?php
class Place{
    private $conn;
    public $db_table="province";
    //model
    public $id;
    public $id_province;
    public $name;
    public $address;
    public $description;
    public $image;
    public $ischecked;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery= "SELECT * FROM famousplace ";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }  
    //get only
    public function get()
    {
    	if(isset($_GET['name'])){
    		$item = $_GET['name'];
    		$sqlQuery="SELECT * FROM famousplace WHERE name_famous like '%$item%'" ;
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->id = $row["id"];
                $this->id_province = $row["id_province"];
       			$this->name = $row["name_famous"];
                $this->address = $row["address"];
                $this->description = $row["description"];
                $this->image = $row["image"];
                $this->ischecked = $row["ischecked"];
       		}
       	}
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }

    public function GetNameAll()
    {
    	if(isset($_GET['name'])){
    		$item = $_GET['name'];
            $sqlQuery= "SELECT * FROM famousplace INNER JOIN coordinates WHERE famousplace.id = coordinates.id_famousplace AND name_famous like '%$item%'" ;
       		$result = $this->conn->query($sqlQuery);
            return $result;
       		
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }


    public function getIdProvice()
    {
    	if(isset($_GET['id_province'])){
    		$item = $_GET['id_province'];
            $sqlQuery= "SELECT * FROM famousplace INNER JOIN coordinates WHERE famousplace.id = coordinates.id_famousplace AND id_province = '$item'";
       		$result = $this->conn->query($sqlQuery);
       		return $result;
       		
    	}
    	else
    	{
    		echo "Không tìm thấy bản ghi";
    	}
        
    }

    public function getcoorFamouse()
    {
        $sqlQuery= "SELECT * FROM famousplace INNER JOIN coordinates WHERE famousplace.id = coordinates.id_famousplace";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }
}
?>