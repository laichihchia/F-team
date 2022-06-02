<?php
require __DIR__ . '/parts/connect_db.php';
$perPage = 20; //每一頁有幾筆

//頁碼 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 如果頁碼小於1 轉頁面到第一頁
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM member";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; //總筆數 索引式陣列

// echo $totalRows; exit; 

//總頁數
$totalPages = ceil($totalRows / $perPage); //總筆數除以每一頁有幾筆 ceil是無條件進位

$rows = [];

//有資料再執行
if ($totalRows > 0) {
    //頁碼若超過總頁數 轉到最後一個頁面
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    }

    //索引值 資料筆數 ORDER BY sid DESC LIMIT降冪排序
    $sql = sprintf("SELECT * FROM member ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $rows = $pdo->query($sql)->fetchAll();
}
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .mgtp10 {
        margin-top: 3%;
    }
</style>

<div class="row">

    <div class="mgtp10">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">


                    <!-- disabled讓按鈕不能按 第一頁 -->
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page= 1 ?>">
                            <i class="fa-solid fa-angles-left"></i>
                        </a>
                    </li>


                    <!-- 上一頁 -->
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">
                            <i class="fa-solid fa-angle-left"></i>
                        </a>
                    </li>


                    <!-- 控制頁碼範圍 -->
                    <?php for ($i = $page - 5; $i <= $page + 5; $i++) :
                        // 不會顯示超過範圍的
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <!-- 反白 -->
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>


                    <!-- 下一頁 -->
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
                        </a>
                    </li>

                    <!-- 最後一頁 -->
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $totalPages ?>">
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </li>


                </ul>
            </nav>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">暱稱</th>
                    <th scope="col">會員等級</th>
                    <th scope="col">手機</th>
                    <th scope="col">Email</th>
                    <th scope="col">生日</th>
                    <th scope="col">地址</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r) : ?>
                    <tr>


                        <!-- 刪除 -->
                        <td>

                            <?php /*
                        <a href="ab-delete.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號為 <?= $r['sid'] ?> 的資料嗎?')">
                        */ ?>


                            <a href="javascript: delete_it(<?= $r['sid'] ?>)">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>


                        </td>

                        <!-- htmlentities裡面內容跳脫成一般文字 -->
                        <td><?= $r['sid'] ?></td>
                        <td><?= htmlentities($r['mem-name']) ?></td>
                        <td><?= htmlentities($r['mem-nickname']) ?></td>
                        <td><?= htmlentities($r['mem-level']) ?></td>
                        <td><?= $r['mem-mobile'] ?></td>
                        <td><?= $r['mem-email'] ?></td>
                        <td><?= $r['mem-birthday'] ?></td>
                        <!--
                    <td><?= htmlentities($r['mem-address']) ?></td>
                    -->
                        <!-- strip_tags 有出現tag的就直接去掉tag -->
                        <td><?= strip_tags($r['mem-address']) ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php include __DIR__ . '/parts/scripts.php' ?>

<script>
    function delete_it(sid) {
        // 跳詢問視窗
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            // 如館按確定 轉到刪除檔
            location.href = `gary-member-delete.php?sid=${sid}`;
        }
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>