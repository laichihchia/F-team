<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-Ture-Member';
$pageName = "會員管理";
$perPage = 15; //每一頁有幾筆

//頁碼 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// 如果頁碼小於1 轉頁面到第一頁
if ($page < 1) {
    header('Location: ?page=1');
    exit;
}

$t_sql = "SELECT COUNT(1) FROM member WHERE `mem-bollen` = 1";
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
    $sql = sprintf("SELECT * FROM `member` WHERE `mem-bollen` = 1 ORDER BY sid DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $rows = $pdo->query($sql)->fetchAll();
}

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .mgtp10 {
        margin-top: 3%;
    }

    #bollen {
        display: none;
    }

    .scrollbar {
        width: 490px;
        height: 80vh;
        overflow: auto;
    }

    .scrollbarbox {
        background-color: white;
        border-radius: 10px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .scrollbarbox:hover {
        opacity: 0.8;
        border: 3px solid black;
    }

    .scrollbarbox_left {
        width: 35%;
        height: 150px;
    }

    .box_img {
        width: 100%;
        height: 100%;
        overflow: hidden;
        object-fit: contain;
    }

    .scrollbarbox_right {
        width: 65%;
        height: 150px;
    }

    .box-TN {
        color: red;
        font-size: 14px;
        font-weight: 600;
        line-height: 4px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .box-word {
        font-size: 16px;
        font-weight: 600;
    }

    .box-word2 {
        font-size: 16px;
        font-weight: 600;
    }

    .box-word3 {
        font-size: 16px;
        font-weight: 600;
        margin-left: 5px;
    }

    .dsn {
        display: none;
    }
</style>

<div class="container">
    <div class="row">

        <div class="mgtp10">
            <div class="col d-flex justify-content-between">
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
                <div>
                    <a href="gary-mem-list-false.php"><button type="submit" class="btn btn-primary btn-lg">查看停用會員</button></a>
                </div>
            </div>

            <button onclick="delete_select()" class="btn btn-danger">Delete</button>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input totalCheck" type="checkbox" value="" id="flexCheckDefault" name="all" onclick="check_all(this,'delALL')">
                            </div>
                        </th>
                        <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                        <th scope="col">#</th>
                        <th scope="col">狀態</th>
                        <th scope="col">姓名</th>
                        <th scope="col">暱稱</th>
                        <th scope="col">會員等級</th>
                        <th scope="col">手機</th>
                        <th scope="col">Email</th>
                        <th scope="col">創建時間</th>
                        <th scope="col">訂單</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r) : ?>

                        <?php //設定布林值名稱
                        $r['mem-bollen'] = '正常'; ?>

                        <tr>
                            <!-- 多選刪除 -->
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input singleCheck" type="checkbox" value="<?= $r['sid'] ?>" id="singleSelect" name="delALL">
                                </div>
                            </td>

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
                            <td>
                                <?= $r['mem-bollen'] ?>
                                <a href="javascript: bollen_it(<?= $r['sid'] ?>)">
                                    <i class="fa-solid fa-rotate"></i>
                                </a>
                            </td>
                            <td><?= htmlentities($r['mem-name']) ?></td>
                            <td><?= htmlentities($r['mem-nickname']) ?></td>
                            <td><?= htmlentities($r['mem-level']) ?></td>
                            <td><?= $r['mem-mobile'] ?></td>
                            <td><?= $r['mem-email'] ?></td>
                            <!--
                <td><?= htmlentities($r['mem-address']) ?></td>
                -->
                            <!-- strip_tags 有出現tag的就直接去掉tag -->
                            <!-- <td><?= strip_tags($r['mem-address']) ?></td> -->
                            <td><?= $r['mem-created_at'] ?></td>

                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            
                                                <?php foreach ($rec_sql as $rec_rows => $rec_r) : ?>
                                                    <div class="scrollbarbox">
                                                        <a href="kevin-edit.php?sid=<?= $rec_r['produst_sid'] ?>" class="d-flex text-decoration-none">
                                                            <div class="scrollbarbox_left">
                                                                <img src="Fteam-produst_img/<?= $rec_r['img'] ?>" alt="" class="box_img">
                                                            </div>
                                                            <div class="scrollbarbox_right d-flex align-items-center">
                                                                <div>
                                                                    <p class="box-TN"><?= $rec_r['order_date'] ?></p>
                                                                    <p class="box-TN">Oder :<?= $rec_r['order_sid'] ?></p>
                                                                    <p class="box-word"><?= $rec_r['name'] ?></p>
                                                                    <div class="d-flex">
                                                                        <p class="box-word2">$<?= $rec_r['price'] ?></p>
                                                                        <p class="box-word3">* <?= $rec_r['quantity'] ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

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

    function bollen_it(sid) {
        if (confirm(`確定要停用編號為 ${sid} 的資料嗎?`)) {
            location.href = `gary-list-0-api.php?sid=${sid}`;
        }
    }

    // 全選checkbox同步設定
    function check_all(obj, delALL) {
        const allCheck = document.getElementsByName(delALL);
        for (let i = 0; i < allCheck.length; i++) {
            allCheck[i].checked = obj.checked;
        }
    }
    const singleSelect = document.querySelectorAll('#singleSelect');

    async function delete_select() {
        const select_ar = [];
        for (let i of singleSelect) {
            if (i.checked) {
                select_ar.push(Number(i.value));
            }
        }
        // console.log(select_ar);
        if (confirm(`確定要刪除編號為${select_ar}的資料嗎`)) {
            location.href = `gary-member-delete.php?sid=${select_ar}`;
        }
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>