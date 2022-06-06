<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'kevin-produst-list';
$title = 'Product-List';

$perPage = 10; // 每一頁有幾筆

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  // intval -> 轉換成整數值
if ($page < 1) {
    header('Location: ?page=1'); // 轉向到第一頁
    exit;
}

// 總筆數
$t_sql = "SELECT COUNT(1) FROM produst";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// 總頁數
$totalPages = ceil($totalRows / $perPage);
$rows = []; // 設定一個預設值就是空陣列，如果有資料才會執行下面的if。 修復給分頁數會超過總頁數

if ($totalRows > 0) {
    // 頁碼若超過總頁數
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages"); // 如果超過總頁數，直接轉向到總頁數
        exit;
    }

    $sql = sprintf("SELECT * FROM produst ORDER BY `sid` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

$hobbies = [
    '1' => '價格從高到低',
    '2' => '價格從低到高',
];
$x = $_GET['x'] ? intval($_GET['x']) : '';

if ($x === 1) {
    $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
} else if ($x === 2) {
    $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
};


// if (isset($_GET['option_price'])) {
//     // 查詢商品的價格 (降冪)

//     $option_price = $_GET["option_price"];

//     if ($option_price  == 1) {
//         $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
//         $rows = $pdo->query($sql)->fetchAll();
//     } else if ($option_price  == 2) {
//         $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
//         $rows = $pdo->query($sql)->fetchAll();
//     }
// } else {
//     // 查詢所有商品

//     $sql = sprintf("SELECT * FROM produst ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
//     $rows = $pdo->query($sql)->fetchAll();
// };

if (isset($_GET['checkbox'])) {
    $checkbox = $_GET["checkbox"];
    // 技術板篩選
    if ($checkbox  == 1) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 3";
        $rows = $pdo->query($sql)->fetchAll();
        // 交通板篩選
    } else if ($checkbox  == 2) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 4";
        $rows = $pdo->query($sql)->fetchAll();
        // 板身篩選
    } else if ($checkbox  == 3) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 6";
        $rows = $pdo->query($sql)->fetchAll();
        // 輪架篩選
    } else if ($checkbox  == 4) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 7";
        $rows = $pdo->query($sql)->fetchAll();
        // 輪子篩選
    } else if ($checkbox  == 5) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 8";
        $rows = $pdo->query($sql)->fetchAll();
        // 培林篩選
    } else if ($checkbox  == 6) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 9";
        $rows = $pdo->query($sql)->fetchAll();
        // 護具篩選
    } else if ($checkbox  == 7) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 10";
        $rows = $pdo->query($sql)->fetchAll();
        // 噴漆篩選
    } else if ($checkbox  == 8) {
        $sql = "SELECT * FROM `produst` WHERE category_id = 2";
        $rows = $pdo->query($sql)->fetchAll();
    } else {
        // 查詢所有商品

        $sql = sprintf("SELECT * FROM produst ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
        $rows = $pdo->query($sql)->fetchAll();
    }
};

?>

<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<style>
    option {
        padding: 8px;
    }

    label {
        margin: 8px;
    }

    .lable-box {

        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        width: 1.25rem;
        height: 1.25rem;
    }

    /* 隱藏側邊攔 */
    .list-section {
        display: none;
    }
</style>
<div class="container">
    <div class="row d-flex">
        <div class="col-6 d-flex justify-content-around align-items-center">
            <button type="button" class="btn btn-outline-secondary"><a style="text-decoration: none;" href="kevin-produst-add.php">Product Update</a></button>

            <form action="kevin-produst.php" method="get" enctype="multipart/form-data">
                <select class="select jc" aria-label="Default select example" name="option_price" id="option_price" onchange="select()">

                    <option selected>Open this select menu</option>


                    <option value="1" name="option_price">價格從高到低</option>
                    <option value="2" name="option_price">價格從低到高</option>

                </select>

                <!-- <button type="submit" class="btn btn-primary" id="option_price2">Submit</button> -->

            </form>

        </div>


        <div class="col d-flex justify-content-between align-items-center">
            <div class="form-check d-flex">
                <form action="kevin-produst.php" method="post" name="form1" enctype="multipart/form-data">
                    <label for="">
                        <input type="checkbox" value="1" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Shortboard</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="2" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Old School</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="3" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Decks</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="4" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Trucks</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="5" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Wheels</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="6" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Bearings</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="7" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Safety Gear</span>
                    </label>

                    <label for="">
                        <input type="checkbox" value="8" style="vertical-align:middle;" name="checkbox">
                        <span style="vertical-align:middle;">Spray Paint</span>
                    </label>

                    <button type="submit" class="btn btn-primary">Type Submit</button>
                </form>
            </div>

        </div>
    </div>
    <div class="row">
        <button onclick="delete_select()" class="btn btn-danger">Delete Select</button>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                    <th scope="col" class="text-center">sid</th>
                    <th scope="col" class="text-center">Product</th>
                    <th scope="col" class="text-center">Brand</th>
                    <th scope="col" class="text-center">Product Name</th>
                    <th scope="col" class="text-center">Info</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Creat Time</th>
                    <th scope="col" class="text-center">Update Time</th>
                    <th scope="col"><i class="fa-solid fa-pen-to-square"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $r) : ?>
                    <tr>
                        <td class="">
                            <div class="form-check">
                                <input class="form-check-input singleCheck" type="checkbox" value="<?= $r['sid'] ?>" id="singleSelect" name="c">
                                <a href="kevin-produst-delete-api.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號為 <?= $r['sid'] ?> 的資料嗎?')"><i class="fa-solid fa-trash-can"></i></a>
                            </div>

                        </td>
                        <td><?= $r['sid'] ?></td>
                        <td class="w-25">
                            <img src=./Fteam-produst_img/<?= $r['img'] ?> class="w-100" alt="">
                        </td>
                        <td class="text-center"><?= $r['brand'] ?></td>
                        <td class="text-center"><?= $r['name'] ?></td>
                        <td class="text-center"><?= $r['info'] ?></td>
                        <td class="text-center"><?= $r['price'] ?></td>
                        <td class="text-center"><?= $r['create_at'] ?></td>
                        <td class="text-center"><?= $r['update_at'] ?></td>
                        <td>
                            <a href="kevin-edit.php?sid=<?= $r['sid'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
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
</div>
<?php require __DIR__ . '/parts/scripts.php' ?>
<script>
    // async function priceDesc() {
    //     const fd = new FormData(document.form1);

    //     const r = await fetch('/kevin-produst-api.php', {
    //         method: 'POST',
    //         body: fd,
    //     });
    //     const result = await r.json();

    //     console.log(result);
    // }

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
            location.href = `kevin-produst-delete-api.php?sid=${select_ar}`;
        }
    }
    // let x;

    function select() {
        let x = document.getElementById('option_price').value;
        location.href = `kevin-produst-test.php?x=${x}`;
    }
</script>

<?php require __DIR__ . '/parts/html-foot.php' ?>