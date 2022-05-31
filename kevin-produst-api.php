<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'kevin_produst_list';
$title = '商品列表';

$perPage = 20; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  // intval -> 轉換成整數值
if ($page < 1) {
    header('Location: ?page=1'); // 轉向到第一頁
    exit;
}

$t_sql = "SELECT COUNT(1) FROM produst"; // 算總筆數
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage); // 總頁數 
$rows = []; // 設定一個預設值就是空陣列，如果有資料才會執行下面的if。 修復給分頁數會超過總頁數

if ($totalRows > 0) {
    // 頁碼若超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages"); // 如果超過總頁數，直接轉向到總頁數
        exit;
    }

    $sql = sprintf("SELECT * FROM produst ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage); // 索引式陣列的概念
    $rows = $pdo->query($sql)->fetchAll();
}

?>
?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<div class="container">



    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <!-- <th scope="col"><i class="fa-solid fa-trash-can"></i></th> -->
                <th scope="col">#</th>
                <th scope="col" class="text-center">商品圖片</th>
                <th scope="col" class="text-center">品牌名稱</th>
                <th scope="col" class="text-center">商品名稱</th>
                <th scope="col" class="text-center">商品特色</th>
                <th scope="col" class="text-center">價錢</th>
                <th scope="col" class="text-center">商品新增時間</th>
                <th scope="col" class="text-center">最後編輯時間</th>
                <!-- <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                    <!-- <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                </td> -->
                    <td><?= $r['sid'] ?></td>
                    <td>
                        <img src=./Fteam-produst_img/<?= $r['img'] ?> class="w-100" alt="">
                    </td>
                    <td class="text-center"><?= $r['brand'] ?></td>
                    <td><?= $r['name'] ?></td>
                    <td><?= $r['info'] ?></td>
                    <td><?= $r['price'] ?></td>
                    <td><?= $r['create_at'] ?></td>
                    <td><?= $r['update_at'] ?></td>
                    <!-- <td>
                    <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=1">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</div>
<?php require __DIR__ . '/parts/scripts.php' ?>
<?php require __DIR__ . '/parts/html-foot.php' ?>