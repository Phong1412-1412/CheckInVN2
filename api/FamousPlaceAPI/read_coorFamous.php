<?php 
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	require_once '../../config/database.php';
    require_once '../../class/coordinates.php';
	require_once '../../class/famousplace.php';
	$database = new Database();
	$db = $database->getConnection();
    $coor = new Coordinates($db);
	$place = new Place($db);
	if(isset($_GET['name'])) {
		$result = $place->GetNameAll();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$coorFamous_arr = array();
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
                    "ischecked" =>(int)$row['ischecked'],
					"coordinates" => array(
						"longitude" =>(double)$row['longitude'],
						"latitude" =>(double)$row['latitude'],
					)
                );
                array_push($coorFamous_arr,$e );
            }
            echo json_encode($coorFamous_arr);
    	}	
	}


	else if(isset($_GET['id_province'])) {
		$result = $place->getIdProvice();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$coorFamous_arr = array();
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
                    "ischecked" =>(int)$row['ischecked'],
					"coordinates" => array(
						"longitude" =>(double)$row['longitude'],
						"latitude" =>(double)$row['latitude'],
					)
                );
                array_push($coorFamous_arr,$e );
            }
            echo json_encode($coorFamous_arr);
    	}	
	}

	else 
	{
		$result = $place->getcoorFamouse();
		$itemCount = $result->num_rows;
		if($itemCount > 0) {
			$coorFamous_arr = array();
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
                    "ischecked" =>(int)$row['ischecked'],
					"coordinates" => array(
						"longitude" =>(double)$row['longitude'],
						"latitude" =>(double)$row['latitude'],
					)
                );
                array_push($coorFamous_arr,$e );
            }
            echo json_encode($coorFamous_arr);
    	}	
	}
		
?>