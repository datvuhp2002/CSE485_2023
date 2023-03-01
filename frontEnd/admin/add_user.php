<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT `UserName`, `Password`, `Role` FROM `users` WHERE 1";
    $article = pdo($pdo, $sql);
    
    if($article->rowCount()==0){
        $article = array('UserName' => "", 'Password' => "" ,'Role'=>"" );
    }
    else{ $article= pdo($pdo, $sql)->fetch();}
    // print_r($article);
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới User</h3>
                <form action="./process_add_user.php" method="post">
                   <?php foreach ($article as $key => $value) {
                        if($key!='Role'){
                    ?> 
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName"><?=$key?></span>
                        <input type="text" class="form-control" name="txt_<?=$key?>"required >
                    </div>
                    <?php }
                    else{ ?>
                    <div class="input-group mt-3 mb-3">
                         <span class="input-group-text" id="lblCatId"> Role </span>
                        <select name="txt_Role" id="category">
                            <option value="admin">admin</option>
                            <option value="user" >user </option>
                        </select>
                    </div>
                    <?php }
                } ?>
                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="./users.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main> 
<?php include "../includes/footerAdmin.php";?>