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

    $sql = sprintf("SELECT * FROM produst ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
}

$hobbies = [
    '1' => '價格從高到低',
    '2' => '價格從低到高',
];

?>

<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<style>
    .kevin {
        border-radius: 15px;
        margin: 8px;
        width: 100px;
        border: 2px solid black;
        /* background-color: lightgray; */
    }

    .kevin a {
        text-decoration: none;
        padding: 8px;
    }

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
</style>
<div class="row d-flex">
    <div class="col-md-3 d-flex justify-content-around">
        <button type="button" class="btn btn-outline-secondary"><a href="kevin-produst-add.php">Product Update</a></button>

        <form action="kevin-produst.php" method="get">

            <select class="select" aria-label="Default select example" name="option_price">

                <option selected>Open this select menu</option>
                <?php foreach ($hobbies as $k => $v) : ?>
                    <option value="<?= $k ?>" name="option_price"><?= $v ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>


    <div class="col d-flex justify-content-flex-start align-items-center">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Shortboard
            </label>

            <label for="">
                <input type="checkbox" value="2" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Old School</span>
            </label>

            <label for="">
                <input type="checkbox" value="3" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Decks</span>
            </label>

            <label for="">
                <input type="checkbox" value="4" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Trucks</span>
            </label>

            <label for="">
                <input type="checkbox" value="5" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Wheels</span>
            </label>

            <label for="">
                <input type="checkbox" value="6" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Bearings</span>
            </label>

            <label for="">
                <input type="checkbox" value="7" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Safety Gear</span>
            </label>

            <label for="">
                <input type="checkbox" value="8" style="vertical-align:middle;">
                <span style="vertical-align:middle;">Spray Paint</span>
            </label>
        </div>

    </div>
</div>
<div class="row">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
                <th scope="col">#</th>
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
                    <td>
                        <a href="kevin-produst-delete-api.php?sid=<?= $r['sid'] ?>" onclick="return confirm('確定要刪除編號為 <?= $r['sid'] ?> 的資料嗎?')"><i class="fa-solid fa-trash-can"></i></a>
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
<?php require __DIR__ . '/parts/scripts.php' ?>

<script>

</script>

<?php require __DIR__ . '/parts/html-foot.php' ?>