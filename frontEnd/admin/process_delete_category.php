<?php
    declare(strict_types = 1);
    require '../../backEnd/includes/database-connection.php';             
    require '../../backEnd/includes/functions.php'; 
    $id = $_GET['id'];

    $sql_delete_theloai= "DELETE FROM `theloai` WHERE `ma_tloai` = :id";
    $sql_delete_baiviet= "DELETE FROM `baiviet` WHERE `ma_tloai` = :id";
    $sql_slc_baiviet_ma_tloai="SELECT baiviet.ma_tloai FROM `baiviet`,`theloai` WHERE theloai.ma_tloai = :id  AND baiviet.ma_tloai = theloai.ma_tloai";
    
    $query = $pdo->prepare($sql_slc_baiviet_ma_tloai);
    $query->execute([$id]);
    //print_r($query->rowCount());
    if($query->rowCount()<=0){
        $query = $pdo->prepare($sql_delete_theloai);
        $query->execute([$id]);
        header('location: category.php');
    }
    else {?>
       <script> if(confirm ('Bạn phải sửa đổi hoặc xóa các bài viết thuộc thể loại này!') )
        {
            window.location.href="article.php";
        }
        else{window.location.href="./category.php";}</script>
<?php } 
         
 
   