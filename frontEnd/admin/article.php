<?php
    declare(strict_types = 1);                                          // Use strict types
    require '../../backEnd/includes/database-connection.php';              // Create PDO object
    require '../../backEnd/includes/functions.php';                        // Include functions
    $sql = "SELECT * FROM `baiviet` ORDER by baiviet.ma_bviet";
    $articles = pdo($pdo,$sql)->fetchAll();
?>
<?php include "../includes/headerAdmin.php";?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table" >
                    <thead>
                        <tr>
                            <th class = "text-nowrap" scope="col">#</th>
                            <th class = "text-nowrap" scope="col">Tiêu đề</th>
                            <th class = "text-nowrap" scope="col">Tên bài hát</th>
                            <th class = "text-nowrap" scope="col">Mã thể loại</th>
                            <th class = "text-nowrap" scope="col">Tóm tắt</th>
                            <th class = "text-nowrap" scope="col">Nội dung</th>
                            <th class = "text-nowrap" scope="col">Mã tác giả</th>
                            <th class = "text-nowrap" scope="col">Ngày viết</th>
                            <th class = "text-nowrap" scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article) {?>
                            <tr >
                                <th name = "id" scope="row"><?= html_escape($article['ma_bviet'])?></th>
                                <td ><?= html_escape($article['tieude'])?></td>
                                <td ><?= html_escape($article['ten_bhat']) ?></td>
                                <td class="text-center" ><?= html_escape($article['ma_tloai'])?></td>
                                <td ><?= html_escape($article['tomtat'])?></td>
                                <td ><?= html_escape($article['noidung'])?></td>
                                <td class="text-center" ><?= html_escape($article['ma_tgia'])?></td>
                                <td ><?= html_escape($article['ngayviet'])?></td>
                                <td style="white-space: wrap"><?= html_escape($article['hinhanh'])?></td>
                                <td >
                                    <a href="edit_article.php?id=<?= $article['ma_bviet']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td >
                                    <a href="process_delete_article.php?id=<?= $article['ma_bviet']?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php include "../includes/footerAdmin.php";?>
