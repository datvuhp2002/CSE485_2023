<?php
declare(strict_types = 1);                                          // Use strict types
require '../../backEnd/includes/database-connection.php';              // Create PDO object
require '../../backEnd/includes/functions.php';                        // Include functions
$sql = "SELECT * FROM `users` ORDER by users.id";
$articles = pdo($pdo,$sql)->fetchAll();

?>
<?php include "../includes/headerAdmin.php";?>

    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <!-- <a href="add_user.php" class="btn btn-success">Thêm mới</a>
                 -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">UserName</th>
                            <th scope="col">Role</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php foreach($articles as $article) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"> <?=html_escape($article['id'])?> </th>
                            <td><?=html_escape($article['UserName'])?></td>
                            <td><?=html_escape($article['Role'])?></td>
                            <td>
                                <a href="edit_user.php?id=<?=$article['id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="process_delete_user.php?id=<?=$article['id']?>"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        
                    </tbody> <?php }?>
                </table> 
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>

