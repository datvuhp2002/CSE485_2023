<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT * FROM `tacgia` ORDER by tacgia.ma_tgia";
    $author = pdo($pdo,$sql)->fetchAll();
?>
<?php include "../includes/headerAdmin.php";?>
<main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_author.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th >Sửa</th>
                            <th >Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($author as $author) {?>
                            <tr >
                                <th name = "id" scope="row"><?= html_escape($author['ma_tgia'])?></th>
                                <td ><?= html_escape($author['ten_tgia']) ?></td>
                                <td>
                                    <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td >
                                    <a href=""><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
