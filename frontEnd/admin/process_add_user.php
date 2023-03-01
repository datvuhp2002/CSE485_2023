<?php
declare(strict_types = 1);
require '../../backEnd/includes/database-connection.php';             
require '../../backEnd/includes/functions.php';  

    $sql="INSERT INTO `users`(`UserName`, `Password`, `Role`) VALUES (:UserName ,:Password,:Role)";
    $UserName = $_POST['txt_UserName'];
    $Password = $_POST['txt_Password'];
    $Role = $_POST['txt_Role'];

    $query = $pdo->prepare($sql);
    $query->execute([
        ':UserName'=>$UserName,
        ':Password'=>$Password,
        ':Role'=>$Role
    ]);

    if($query->rowCount()>0){
        echo"them user thanh cong";
    }
    else{
        echo"them user that bai!";
    }

    ?>
    <script>
        setTimeout(()=>{
            window.location.href="./add_user.php";
        },1000);
    </script>