<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../../config/database.php';
    include_once '../../class/user.php';
    
    $database = new Database();
    $db = $database->getConnection();
    mysqli_set_charset($db, "utf8");
    // Kiểm tra nếu dữ liệu được gửi lên là POST
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        var_dump($_POST);
        $username = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['pass'] ?? null;


         //Kiểm tra người dùng đã nhập liệu đầy đủ chưa
        if(empty($username)) {
            echo json_encode("Vui lòng nhập tên đăng nhập");
            exit;
        }
        if(empty($password)) {
            echo json_encode("Vui lòng nhập mật khẩu");
            exit;
        }
        if(empty($email)) {
            echo json_encode("Vui lòng nhập địa chỉ email");
            exit;
        }
        
        //Kiểm tra tên đăng nhập này đã có người dùng chưa
        $sqlQuery = "SELECT * FROM user WHERE user_Email = '$email'";
        $res = mysqli_query($db, $sqlQuery);
        $count = mysqli_num_rows($res);
        if ($count >= 1) {
            echo json_encode("Tài khoản đã tồn tại", JSON_UNESCAPED_UNICODE);
            exit;
        }

        //Mã hóa mật khẩu
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //Lưu thông tin thành viên vào bảng
        $sqlQuery = ("
            INSERT INTO user 
            VALUES (
                null,
                '$username',
                '$password',
                '$email'
            )
        ");
        $addmemberSuccess = mysqli_query($db, $sqlQuery);

        //Thông báo quá trình lưu
        if($addmemberSuccess) {
            echo json_encode("success");
        } else {
            echo json_encode("Có lỗi xảy ra khi lưu thông tin tài khoản", JSON_UNESCAPED_UNICODE);
        }
    } else {
        echo json_encode("Phương thức gửi dữ liệu không hợp lệ. Vui lòng sử dụng phương thức POST", JSON_UNESCAPED_UNICODE);
    }
?>
