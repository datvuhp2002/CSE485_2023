<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $id = $_GET['id'];
    $sql = "SELECT tacgia.ten_tgia ,tacgia.hinh_tgia   FROM `tacgia` WHERE ma_tgia = '$id'";
    $author = pdo($pdo,$sql)->fetch();
?>

<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin tác giả</h3>
                <form action="process_edit_author.php" method="post">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtma_tgia" readonly value='<?= $id?>' >
                    </div>
                    <?php foreach($author as $key => $value) { ?>
                        <div class="input-group mt-3 mb-3" >
                            <span class="input-group-text" style="min-width: 105px;"><?= process_data_author($key)?></span>
                            <input type="text" class="form-control" name="txt<?=$key?>" value='<?= html_escape($value)?>' <?= $key == 'ngayviet' ? 'readonly' : ''?>>
                        </div> 
                    <?php }?>
                    <div class="form-group  float-end">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
