<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $id = $_GET['id'];
    $sql = "SELECT baiviet.tieude ,baiviet.ten_bhat ,baiviet.ma_tloai,baiviet.tomtat, baiviet.noidung ,baiviet.ma_tgia , baiviet.ngayviet , baiviet.hinhanh   FROM `baiviet` WHERE ma_bviet = '$id'";
    $article = pdo($pdo,$sql)->fetch();
?>
<?php 
    
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="process_edit_article.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã bài viết</span>
                        <input type="text" class="form-control" name="txtma_bviet" readonly value='<?= $id?>' >
                    </div>
                    <?php foreach($article as $key => $value) { ?>
                        <div class="input-group mt-3 mb-3" >
                            <span class="input-group-text" style="min-width: 105px;"><?= process_data_article($key)?></span>
                            <input type="text" class="form-control" name="txt<?=$key?>" value='<?= html_escape($value)?>' <?= $key == 'ngayviet' ? 'readonly' : ''?>>
                        </div> 
                    <?php }?>
                    <div class="form-group  float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
