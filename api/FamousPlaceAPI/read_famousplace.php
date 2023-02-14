<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	require_once '../../config/database.php';
	require_once '../../class/famousplace.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new Place($db);
	if(isset($_GET['name'])) {
		$item = new Place($db);
		$item->name = $_GET['name'];
		$item->get();
		if($item->id != 0)
		{
			$arr = array(
				"id" =>(int)$item->id,
                "id_province" =>(int)$item->id_province,
				"name" =>$item->name,
                "address" =>$item->address,
				"description" =>$item->description,
				"image" =>$item->image,
				"ischecked" =>$item->ischecked
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
                    "id_province" =>(int)$row['id_province'],
					"name" =>$row['name_famous'],
                    "address" =>$row['address'],
					"description" =>$row['description'],
					"image" =>$row['image'],
                    "ischecked" =>(int)$row['ischecked']
                );
                array_push($province_arr,$e );
            }
            echo json_encode($province_arr);
    	}	
	}
		
?>