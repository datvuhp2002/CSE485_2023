<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $id = $_GET['id'];
    $sql = "SELECT baiviet.tieude ,baiviet.ten_bhat ,baiviet.tomtat, baiviet.noidung , baiviet.ngayviet , baiviet.hinhanh   FROM `baiviet` WHERE ma_bviet = '$id'";
    $article = pdo($pdo,$sql)->fetch();
    $sqlTheLoai = "SELECT theloai.ten_tloai FROM `theloai`, `baiviet` where baiviet.ma_bviet = '$id' AND theloai.ma_tloai = baiviet.ma_tloai";
    $sqlTacgia = "SELECT tacgia.ten_tgia FROM `tacgia`, `baiviet` where baiviet.ma_bviet = '$id' AND tacgia.ma_tgia = baiviet.ma_tloai";
    $categoriesChosen  = pdo($pdo,$sqlTheLoai)->fetch();
    $authorsChosen = pdo($pdo,$sqlTacgia)->fetch();
    $sqlTheLoai = "SELECT * FROM `theloai`";
    $sqlTacgia = "SELECT * FROM `tacgia`";
    $categories  = pdo($pdo,$sqlTheLoai)->fetchAll();
    $authors = pdo($pdo,$sqlTacgia)->fetchAll();
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
                    <div class="input-group mt-3 mb-3" >
                        <span class="input-group-text" style="min-width: 105px;">Thể loại</span>
                        <select name="txtma_tloai" id="category">
                            <?php foreach($categories as $category) { ?>
                                <option value="<?= $category['ma_tloai']; ?>" <?php if ($category['ten_tloai'] == $categoriesChosen['ten_tloai']) { echo 'selected'; } ?>>
                                    <?= $category['ma_tloai'] . ' - ' . $category['ten_tloai']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3" >
                        <span class="input-group-text" style="min-width: 105px;">Tác giả</span>
                        <select name="txtma_tgia" id="author">
                            <?php foreach($authors as $author) { ?>
                                <option value="<?= $author['ma_tgia']; ?>" <?php if ($author['ten_tgia'] == $authorsChosen['ten_tgia']) { echo 'selected'; } ?>>
                                    <?= $author['ma_tgia'] . ' - ' . $author['ten_tgia']; ?>
                                </option>
                            <?php }?>   
                        </select>
                    </div>
                    <div class="form-group  float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
