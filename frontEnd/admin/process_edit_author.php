<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia, hinh_tgia = :hinh_tgia WHERE ma_tgia = :ma_tgia";
    // Sử dụng phương thức prepare để chuẩn bị câu lệnh truy vấn
    $query =  $pdo->prepare($sql);
    // Gán giá trị cho các tham số trong câu lệnh truy vấn
    $ma_tgia = $_POST['txtma_tgia'];
    $ten_tgia = $_POST['txtten_tgia'];
    $hinh_tgia = $_POST['txthinh_tgia'];
    // Thực thi câu lệnh truy vấn với các tham số đã gán giá trị
    $query->execute([
        ':ma_tgia' => $ma_tgia,
        ':ten_tgia' => $ten_tgia,
        ':hinh_tgia' => $hinh_tgia,
    ]);
    if ($query->rowCount()>0) {
        echo "Cập nhật tác giả thành công!";
      }
      else if($query->rowCount() == 0){
        echo("Không có gì thay đổi");
      }
       else {
        echo "Cập nhật tác giả thất bại!";
    }
?>
<script>
    setTimeout(function(){
    window.location.href = 'author.php';
}, 1000)
</script>
