<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, hinhanh, ma_tgia) VALUES (:tieude, :ten_bhat, :ma_tloai, :tomtat, :noidung, :hinhanh,:ma_tgia)";
    // Sử dụng phương thức prepare để chuẩn bị câu lệnh truy vấn
    $query =  $pdo->prepare($sql);
    // Gán giá trị cho các tham số trong câu lệnh truy vấn
    $tieude = $_POST['txttieude'];
    $ten_bhat = $_POST['txtten_bhat'];
    $tomtat = $_POST['txttomtat'];
    $noidung = $_POST['txtnoidung'];
    $hinhanh = $_POST['txthinhanh'];
    $ma_tloai = $_POST['category'];
    $ma_tgia = $_POST['author'];
    // // Thực thi câu lệnh truy vấn với các tham số đã gán giá trị
    $query->execute([
        ':tieude' => $tieude,
        ':ten_bhat' => $ten_bhat,
        ':ma_tloai' => $ma_tloai,
        ':tomtat' => $tomtat,
        ':noidung' => $noidung,
        ':hinhanh' => $hinhanh,
        ':ma_tgia' => $ma_tgia,
    ]);
    if ($query->rowCount()>0) {
        echo "Thêm bài viết thành công!";
      }
       else {
        echo "Thêm bài viết thất bại!";
    }
?>
<script>
    setTimeout(function(){
    window.location.href = 'article.php';
}, 1000)
</script>
