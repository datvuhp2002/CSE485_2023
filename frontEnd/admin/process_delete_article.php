<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $id = $_GET['id'];
    $sql = "DELETE FROM baiviet WHERE ma_bviet = :id";
    $article = $pdo->prepare($sql);
    $article->execute([$id]);

    $sql="ALTER TABLE `baiviet` AUTO_INCREMENT = 0";
    $query = $pdo->prepare($sql);
    $query->execute();
    header('location: article.php');
?>
