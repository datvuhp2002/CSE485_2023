<?php
declare(strict_types = 1);
require '../../backEnd/includes/database-connection.php';             
require '../../backEnd/includes/functions.php'; 
$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE `id`=:id ";

$query = $pdo->prepare($sql);
$query->execute([$id]);
$sql="ALTER TABLE `users` AUTO_INCREMENT = 0";
$query = $pdo->prepare($sql);
$query->execute();
header('location: users.php');
?>
<script>
            //window.location.href="./users.php";
</script>