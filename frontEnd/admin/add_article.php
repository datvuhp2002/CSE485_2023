<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT baiviet.tieude ,baiviet.ten_bhat,baiviet.tomtat,baiviet.noidung, baiviet.hinhanh  FROM `baiviet`";
    $article = pdo($pdo,$sql)->fetch();
    $sqlTheLoai = "SELECT * FROM `theloai`";
    $sqlTacgia = "SELECT * FROM `tacgia`";
    $categories  = pdo($pdo,$sqlTheLoai)->fetchAll();
    $authors = pdo($pdo,$sqlTacgia)->fetchAll();
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                <form action="process_add_article.php" method="post">
                    <?php foreach($article as $key => $value) { ?>
                        <div class="input-group mt-3 mb-3" >
                            <span class="input-group-text" style="min-width: 105px;"><?= process_data_article($key)?></span>
                            <input type="text" class="form-control" name="txt<?=$key?>" <?= $key == 'ten_bhat' ? 'required' : ''?>>
                        </div> 
                    <?php }?>
                    <div class="input-group mt-3 mb-3" >
                        <span class="input-group-text" style="min-width: 105px;">Thể loại</span>
                        <select name="category" id="category">
                            <?php foreach($categories  as $category) { ?>
                                <option value="<?= $category['ma_tloai']; ?>"><?=$category['ma_tloai'] . ' - ' .$category['ten_tloai']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-group mt-3 mb-3" >
                        <span class="input-group-text" style="min-width: 105px;">Tác giả</span>
                        <select name="author" id="category">
                            <?php foreach($authors as $author) { ?>
                                <option value="<?= $author['ma_tgia']; ?>"><?=$author['ma_tgia'] . ' - ' .$author['ten_tgia']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group  float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>

