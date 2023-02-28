<?php
    declare(strict_types = 1);                               // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php';                        // Include functions
    // $sql = "SELECT * FROM baiviet";
    // $baiviet = pdo($pdo, $sql)->fetchAll(); 
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM baiviet WHERE ma_bviet = :id";
    $result = $pdo->prepare($sql);
    $result->execute(array('id'=>$id));
    $post = $result->fetch(PDO::FETCH_ASSOC);
    } else{
        $post=false;
    }


?>
<?php include "includes/header.php";?>
    <main class="container mt-5">
            <?php
                if(!$post){ 
                    echo "không tìm thấy bài viết tương ứng với mã bài viết: ", $id;
                } else{
                    ?>
                        <div class="row" style="margin-bottom: 40px;">
                            <div class = "col-4">
                                <img src="<?=func_get_img($post['hinhanh']) ?>" class="card-img-top">
                            </div>

                            <div class="col-8">
                                <h5 class="card-title mt-2 fw-bold" style="font-size: 30px">
                                    <?= html_escape($post['ten_bhat']) ?>
                                </h5>
                                <p><span class=" fw-bold">Bài hát: </span><?= html_escape($post['ten_bhat']) ?></p> 
                                <p><span class=" fw-bold">Tóm tắt: </span><?= html_escape($post['tomtat']) ?></p> 
                                <p><span class=" fw-bold">Nội dung: </span><?= html_escape($post['noidung']) ?></p> 
                                <p class="card-text"><span class=" fw-bold">Mã tác giả: </span><?= html_escape($post['ma_tgia']) ?></p> 
                                <p class="card-text"><span class=" fw-bold">Ngày viết: </span><?= html_escape($post['ngayviet']) ?></p> 


                            </div>

                        </div>
                    <?php
                }
            ?>

    </main>
<?php include "includes/footer.php";?>
