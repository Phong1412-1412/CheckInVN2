<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	require_once '../../config/database.php';
	require_once '../../class/coordinates.php';
	$database = new Database();
	$db = $database->getConnection();
	$items = new Coordinates($db);
	if(isset($_GET['id_famousplace'])) {
		$item = new Coordinates($db);
		$item->id = $_GET['id_famousplace'];
		$item->get();
		if($item->id != 0)
		{
			$arr = array(
				"id" =>(int)$item->id,
				"id_famousplace" =>$item->id_famousplace,
				"longitude" =>$item->longitude,
				"latitude" =>$item->latitude,
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
					"id_famousplace" =>(int)$row['id_famousplace'],
					"longitude" =>$row['longitude'],
					"latitude" =>$row['latitude'],
                    
                );
                array_push($province_arr,$e );
            }
            echo json_encode($province_arr);
    	}	
	}
		
?>