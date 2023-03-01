<?php 
    declare(strict_types = 1);                                          // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php'; 
    session_start();
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    //Lay tat ca nhung thong tin tu bang users khi usernmame va password trung khop
    $sql = "SELECT * FROM users WHERE UserName ='$username' AND Password='$password'";
    //thuc thi cau lenh truy van tren co so du lieu users
    $result = $pdo->query($sql);
    //ham rowCount dung de dem so luong ban ghi cua doi tuong result va tra ve doi duongcount
    if ($result->rowCount() === 1) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $username;
        $row['Role'] != 'admin' ? header("Location: index.php?") :header("Location:admin");
    }else{
        header( "refresh:1;url=login.php" );
        echo "Mật khẩu hoặc tài khoản không đúng";
    }
?>