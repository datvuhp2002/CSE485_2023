<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    // Chuẩn bị câu lệnh truy vấn SQL
    $sql = "UPDATE baiviet SET tieude = :tieude, ten_bhat = :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, noidung = :noidung, ma_tgia = :ma_tgia, hinhanh = :hinhanh WHERE ma_bviet = :ma_bviet";
    // Sử dụng phương thức prepare để chuẩn bị câu lệnh truy vấn
    $query =  $pdo->prepare($sql);
    // Gán giá trị cho các tham số trong câu lệnh truy vấn
    $tieude = $_POST['txttieude'];
    $ten_bhat = $_POST['txtten_bhat'];
    $ma_tloai = $_POST['txtma_tloai'];
    $tomtat = $_POST['txttomtat'];
    $noidung = $_POST['txtnoidung'];
    $ma_tgia = $_POST['txtma_tgia'];
    $ngayviet = $_POST['txtngayviet'];
    $hinhanh = $_POST['txthinhanh'];
    $ma_bviet = $_POST['txtma_bviet'];
    // Thực thi câu lệnh truy vấn với các tham số đã gán giá trị
    $query->execute([
        ':tieude' => $tieude,
        ':ten_bhat' => $ten_bhat,
        ':ma_tloai' => $ma_tloai,
        ':tomtat' => $tomtat,
        ':noidung' => $noidung,
        ':ma_tgia' => $ma_tgia,
        ':hinhanh' => $hinhanh,
        ':ma_bviet' => $ma_bviet
    ]);
    if ($query->rowCount()>0) {
        echo "Cập nhật bài viết thành công!";
      }
      else if($query->rowCount() == 0){
        echo("Không có gì thay đổi");
      }
       else {
        echo "Cập nhật bài viết thất bại!";
    }
?>
<script>
    setTimeout(function(){
    window.location.href = 'article.php';
}, 1000)
</script>
