<?php
declare(strict_types = 1);
require '../../backEnd/includes/database-connection.php';             
require '../../backEnd/includes/functions.php';    

$sql="INSERT INTO `theloai`(`ten_tloai`) VALUES (:ten_theloai)";
$query = $pdo->prepare($sql);
$ten_tloai = $_POST['txt_ten_tloai'];
$query->execute([':ten_theloai'=>$ten_tloai,]);

if($query->rowCount()>0){
    echo "Thêm thể loại thành công!";
}
else 
    echo "Thêm thể loại thất bại!";
?>
<script>
    setTimeout(function(){
        window.Location.href='category.php';
    },1000);
</script>