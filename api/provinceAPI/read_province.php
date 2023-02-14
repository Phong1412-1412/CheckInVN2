<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	require_once '../../config/database.php';
	require_once '../../class/province.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new Province($db);
	if(isset($_GET['id'])) {
		$item = new Province($db);
		$item->id = $_GET['id'];
		$item->get();
		if($item->province_name != null)
		{
			$arr = array(
				"id" =>(int)$item->id,
				"provinceName" =>$item->province_name,
				"description" =>$item->description,
				"image" =>$item->image,
				"favoriteChecked" =>(int)$item->favorite_checked
			);
			http_response_code(200);
			echo json_encode($arr);
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
			$province_arr = array();
			while ($row = $result->fetch_assoc())
            {
                extract($row);
                $e = array(
					"id" =>(int)$row['id'],
					"provinceName" =>$row['provinceName'],
					"description" =>$row['description'],
					"image" =>$row['image'],
                    "favoriteChecked" =>(int)$row['favoriteChecked']
                );
                array_push($province_arr,$e );
            }
            echo json_encode($province_arr);
    	}	
	}
		
?>