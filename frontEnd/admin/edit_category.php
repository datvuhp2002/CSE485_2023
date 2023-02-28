<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $id = $_GET['id'];
    $sql = "SELECT `ten_tloai` FROM `theloai` WHERE `ma_tloai`='$id' ";
    $article = pdo($pdo,$sql)->fetch() ;

    
    
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="process_edit_category.php" method="post">
            
             
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                        <input type="text" class="form-control" name="txt_ma_tloai" readonly value="<?= $id ?>"  >
                    </div>

                  <?php foreach($article as $key =>$values ) {?>  
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tên thể loại</span>
                        <input type="text" class="form-control" name="txt_<?=$key?>" value = "<?= html_escape($values) ?>"  >
                    </div>
              <?php }?>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
