<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $id = $_GET['id'];
    $sql = "DELETE FROM tacgia WHERE ma_tgia = :id";
    $author = $pdo->prepare($sql);
    $author->execute([$id]);
    header('location: author.php');
?>
