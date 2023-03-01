<?php 
    declare(strict_types = 1);                                          // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php'; 

    function check_username($pdo, $username){
        $sql1 = "SELECT * FROM users WHERE UserName = '$username'";
        $result1 = $pdo->query($sql1);
        if($result1->rowCount()>0){
            return true;
        } else{
            return false;
        }

    }

    if(isset($_POST['signup_username']) && isset($_POST['signup_password']) && isset($_POST['re_password'])){
        $username = $_POST['signup_username'];
        $password = $_POST['signup_password'];
        $re_password = $_POST['re_password'];


        if($password != $re_password){
            header( "refresh:1;url=signup.php" );
            echo 'Mật khẩu nhập lại không chính xác';
        } else if (check_username($pdo, $username)){
            header( "refresh:1;url=signup.php" );
            echo "Tài khoản đã tồn tại";
        } else{
            $sql = "INSERT INTO users (UserName, Password, Role) VALUES ('$username','$password','user')";
            $result = $pdo->query($sql);
            if($result){
                echo "Đăng kí thành công";
                header( "refresh:1;url=login.php" );
            }
            else{
                echo "Đăng kí thất bại";
            }
        }
    }
?>