<?php
class user{
    private $conn;
    private $db_table="user";
    //model
    public $user_ID;
    public $user_Name;
    public $user_PassWord;
    public $user_Email;
    public function __construct($db)
    {
        $this->conn=$db;
    }
    //GET ALL
    public function getAll()
    {
        $sqlQuery="SELECT * from user";
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function get()
    {
    	if(isset($_GET['user_ID'])){
    		$item = $_GET['user_ID'];
    		$sqlQuery="SELECT user_ID, user_Name, user_PassWord, user_Email, user_Point, hang_user.Ten_Hang  from user, hang_user WHERE user_ID =  ".$item ." AND user.user_Rank = hang_user.Hang_ID";
       		$result = $this->conn->query($sqlQuery);
       		$itemCount = $result->num_rows;
       		if ($itemCount > 0) {
       		while($row = $result->fetch_assoc()) {
       			$this->user_ID = $row["user_ID"];
       			$this->user_Name = $row["user_Name"];
       			$this->user_PassWord = $row["user_PassWord"];
       			$this->user_Email = $row["user_Email"];
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