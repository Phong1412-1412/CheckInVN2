<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
	require_once '../../config/database.php';
	include_once '../../class/user.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new user($db);
	if(isset($_GET['user_ID'])) 
	{
		$item = new user($db);
		$item->user_Email = $_GET['user_ID'];
		$item->get();
		if(isset($item->user_Name))
		{
			$rank_arr = array(
				"userID" =>(int)$item->user_ID,
				"userName"=>$item->user_Name,
				"userPassWord"=> (int)$item->user_PassWord,
				"userEmail"=>$item->user_Email,
			);
			http_response_code(200);
			echo json_encode($rank_arr);
		}
		 else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }

	}
	else
	{
		$result = $items->getAll();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$user_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
                	"userID" => (int)$row["user_ID"],
       				"userName" => $row["user_Name"],
       				"userPassWord" => (int)$row["user_PassWord"],
       			 	"userEmail" => $row["user_Email"],
                );
                array_push($user_arr,$e );
            }
            echo json_encode($user_arr);
            

        }
        else
        {
            http_response_code(404);
            echo json_encode(array("message"=>"Không tìm thấy bản ghi"));
        }
		
	}
?>