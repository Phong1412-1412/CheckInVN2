<?php 
	session_start();
	require_once("../../config/database.php");
	$database = new Database();
	$db = $database->getConnection();

	if(isset($_POST['email']) && isset($_POST['pass'])) {
		$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
		$pass = hash('sha256', $pass);

		$stmt = $db->prepare("SELECT * FROM user WHERE user_Email = ? AND user_PassWord = ?");
        $stmt->bind_param("ss", $email, $pass);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows >= 1) {
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;
            while ($row = mysqli_fetch_assoc($res)) {
                $_SESSION['user_ID'] = $row['user_ID'];
            }
            echo json_encode(array('token' => $token));
        } else {
            echo json_encode("error");
        }
	}
?>