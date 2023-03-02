<?php 
    declare(strict_types = 1);                                          // Use strict types
    require '../backEnd/includes/database-connection.php';              // Create PDO object
    require '../backEnd/includes/functions.php'; 
    $sql = "SELECT * FROM baiviet WHERE ten_bhat LIKE :search";
    $result = $pdo->prepare($sql);
?>
<?php
    session_start();
    if( !isset($_SESSION['username'])){
        include "includes/header.php";
    }else{
        include "includes/headerIsLogin.php";
    }
?>
<main>
    <?php 
        $result->execute(['search' => '%'.$_GET['search'].'%']);
        while($row = $result->fetch(PDO::FETCH_ASSOC)){ 
            $ma_bviet = $row['ma_bviet'];
            ?>
                <a href="detail.php?id=<?= $row['ma_bviet'] ?>" class="text-decoration-none col-md-3 col-sm-6 text-black">
                    <div class="card card-block">
                        <div class = "p-3">
                        <img src="<?=func_get_img($row['hinhanh']) ?>" class="card-img-top">
                            <h4 class="card-title mt-3 mb-3 fw-bold">
                                    <?= html_escape($row['ten_bhat']) ?>
                            </h4>
                            <p class="card-text"><?= html_escape($row['tomtat']) ?>p> 
                        </div>
                    </div>
                </a>
            <?php 
        }
    ?>
</main>


<?php include "includes/footer.php";?>
