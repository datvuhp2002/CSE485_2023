<?php 
declare(strict_types = 1);                                          // Use strict types
require '../backEnd/includes/database-connection.php';              // Create PDO object
require '../backEnd/includes/functions.php'; 

session_start();  

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    // if (empty($username)) {

    //     // header("Location: login.php?error=User Name is required");

    //     exit();

    // }else if(empty($password)){

    //     // header("Location: login.php?error=Password is required");

    //     exit();

    // }
    
    

        //Lay tat ca nhung thong tin tu bang users khi usernmame va password trung khop
        $sql = "SELECT * FROM users WHERE UserName ='$username' AND Password='$password'";
        // $data = pdo($pdo,$sql)->fetchAll();
        //thuc thi cau lenh truy van tren co so du lieu users
        $result = $pdo->query($sql);
        //ham rowCount dung de dem so luong ban ghi cua doi tuong result va tra ve doi duong count
        $count = $result->rowCount();

        if ($count === 1) {

            $row = $result->fetch(PDO::FETCH_ASSOC);

            if ($row['UserName'] === $username && $row['Password'] === $password) {

                // echo "Logged in!";

                $_SESSION['UserName'] = $row['UserName'];

                $_SESSION['Role'] = $row['Role'];

                // $row['Role'] == 'admin' ? header("Location: admin"): header("Location: index.php");
                $row['Role'] != 'admin' ? header("Location: index.php") :header("Location: admin");

                // header("Location: index.php");

                exit();

            }else{


                echo "Khong thành công";
                ob_flush();
                flush();
                sleep(1);
                header('Location: login.php');
                exit();

  

            }

        }else{

            echo "Khong thành công";
            ob_flush();
            flush();
            sleep(1);
            header('Location: login.php');
            exit();


            // header("Location: login.php?error=Incorect User name or password");


        }



}else{

    echo "Khong thành công";
    ob_flush();
    flush();
    sleep(1);
    header('Location: login.php');
    exit();


    // header("Location: login.php");

    // exit();

}


?>