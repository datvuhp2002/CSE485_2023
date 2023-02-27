<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (:ten_tgia, :hinh_tgia)";
    // Sử dụng phương thức prepare để chuẩn bị câu lệnh truy vấn
    $query =  $pdo->prepare($sql);
    // Gán giá trị cho các tham số trong câu lệnh truy vấn
    $ten_tgia = $_POST['txtten_tgia'];
    $hinh_tgia = $_POST['txthinh_tgia'];
    // // Thực thi câu lệnh truy vấn với các tham số đã gán giá trị
    $query->execute([
        ':ten_tgia' => $ten_tgia,
        ':hinh_tgia' => $hinh_tgia,
    ]);
    if ($query->rowCount()>0) {
        echo "Thêm tác giả thành công!";
      }
       else {
        echo "Thêm tác giả thất bại!";
    }
?>
<script>
    setTimeout(function(){
    window.location.href = 'author.php';
}, 1000)
</script>
