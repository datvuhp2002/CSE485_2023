<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $id = $_GET['id'];
    $sql_slc_user_pw = "SELECT `UserName`, `Password` FROM `users` WHERE `id`='$id' ";
    $sql_slc_role="SELECT `Role` FROM `users` WHERE `id`='$id' ";
    $article = pdo($pdo,$sql_slc_user_pw)->fetch() ;
    $article1 = pdo($pdo,$sql_slc_role)->fetchAll();

    
    
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin users</h3>
                <form action="./process_edit_user.php?id=<?=$id?>" method="post">
            
             
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">id</span>
                        <input type="text" class="form-control" name="txt_id" readonly value="<?= $id ?>"  >
                    </div>

                <?php foreach($article as $key =>$values ) {?>  
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId"> <?=$key?> </span>
                        <input type="text" class="form-control" name="txt_<?=$key?>" readonly value = "<?= html_escape($values) ?>"  >
                    </div>
                <?php }?>
                <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="lblCatId"> Role </span>
                    <select name="txt_role" id="category">
                    <?php foreach($article1 as $key  ) {?>  
                        <option value="admin" <?php if ($key['Role'] == 'admin') { echo 'selected'; } ?>>
                        admin
                        </option>
                        <option value="user" <?php if ($key['Role'] == 'user') { echo 'selected'; } ?>>
                        user
                        </option>
                    <?php }?>
                    </select>
                </div>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="users.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
