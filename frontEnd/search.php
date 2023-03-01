<?php 
    declare(strict_types = 1);                                          // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php'; 

    if(isset($_GET['search'])){
        $search = $_GET('search');
        $sql = "SELECT * FROM baiviet WHERE ten_bhat LIKE '%search%'";
        $result = $pdo->query($sql);

        if($result->rowCount()>0){
           $row = $result->fetch(PDO::FETCH_ASSOC);
           echo "<script>alert('Tìm thấy bài viết'); window.location.href='detail.php?ten_bhat=" . urlencode($post['ten_bhat']) . "';</script>";
        } else{

            echo "<script>alert('Không có bài viết tương ứng')</script>";
        }
    }
?>