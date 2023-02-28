<?php
    declare(strict_types = 1);
    require '../../backEnd/includes/database-connection.php';             
    require '../../backEnd/includes/functions.php'; 
    $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
    $query = $pdo->prepare($sql);
    $ma_tloai = $_POST['txt_ma_tloai'];
    $ten_tloai = $_POST['txt_ten_tloai'];
    $query->execute([
        ':ma_tloai'=> $ma_tloai,
        ':ten_tloai'=> $ten_tloai
    ]);

    if($query->rowCount()>0){
        echo "Sửa thành công";
    }
    else if($query->rowCount()==0){
        echo "Không có gì thay đổi";
    }
    else echo "Sửa thất bại!";

?>
<script>
    setTimeout(function(){
        window.location.href='category.php';
    },1000)
</script>