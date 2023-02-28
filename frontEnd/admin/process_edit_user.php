<?php
declare(strict_types = 1);
require '../../backEnd/includes/database-connection.php';             
require '../../backEnd/includes/functions.php'; 
$id = $_GET['id'];
$sql = "UPDATE `users` SET `Role`= :role WHERE `id`= :id ";

$role= $_POST['txt_role'];

$query = $pdo->prepare($sql);
$query->execute([
    ':role' => $role,
    ':id' => $id
]);

if($query->rowCount()>0){
    echo "Sửa thành công";
}
else{
    echo "Sửa thất bại!";
}
?>
<script>
    setTimeout(function(){
        window.location.href="./users.php";
    },1000);
</script>