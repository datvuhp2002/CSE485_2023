<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT tacgia.ten_tgia ,tacgia.hinh_tgia FROM `tacgia`";
    $author = pdo($pdo,$sql);
    if($author->rowCount()==0){
        $author = array('ten_tgia' => "",'hinh_tgia' => "");
    }
    else{ $author= pdo($pdo, $sql)->fetch();}
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                <form action="process_add_author.php" method="post">
                    <?php foreach($author as $key => $value) { ?>
                        <div class="input-group mt-3 mb-3" >
                            <span class="input-group-text" style="min-width: 105px;"><?= process_data_author($key)?></span>
                            <input type="text" class="form-control" name="txt<?=$key?>" <?= $key == 'ten_tgia' ? 'required' : ''?>>
                        </div> 
                    <?php }?>

                    <div class="form-group  float-end">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>

