<?php
    declare(strict_types = 1);                               // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT * FROM baiviet";
    $baiviet = pdo($pdo, $sql)->fetchAll(); 
?>
<?php


?>
<?php include "includes/header.php";?>
<?php include 'includes/slideShow.php'?>
    <main class="container-fluid mt-3">
        <h3 class="text-center text-uppercase mb-4 text-black">TOP bài hát yêu thích</h3>
        <div class="row">
        <?php foreach ($baiviet as $item) { ?>
            <a href="detail.php" class="text-decoration-none col-md-3 col-sm-6 text-black">
                <div class="card card-block">
                    <div class = "p-3">
                    <img src="<?=func_get_img($item['hinhanh']) ?>" class="card-img-top">
                        <h4 class="card-title mt-3 mb-3 fw-bold">
                                <?= html_escape($item['ten_bhat']) ?>
                        </h4>
                        <p class="card-text"><?= html_escape($item['tomtat']) ?></p> 
                    </div>
                </div>
            </a>

        <?php } ?>
        </div>
    </main>
<?php include "includes/footer.php";?>

