<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'kevin-produst-list';
$title = 'Product-List';

$perPage = 20; // 每一頁有幾筆

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

// 商品價格從高到低 and 從低到高
$x = isset($_GET['x']) ? intval($_GET['x']) : 0;

if ($x === 1) {
    $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
} else if ($x === 2) {
    $sql = sprintf("SELECT * FROM `produst` ORDER BY `price` ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
} else {
    $sql = sprintf("SELECT * FROM produst ORDER BY sid ASC LIMIT %s, %s", ($page - 1) * $perPage, $perPage);
    $rows = $pdo->query($sql)->fetchAll();
};

// checkbox 多條件篩選
$checkbox = isset($_GET["checkbox"]) ? ($_GET['checkbox']) : [];

if (!empty($checkbox)) {
    $str_tag = implode(',', $checkbox);

    $sql = "SELECT * FROM `produst` WHERE `category_id` IN ($str_tag)";
    $rows = $pdo->query($sql)->fetchAll();
};

// 關鍵字搜尋
$search = isset($_GET["search"]) ? ($_GET['search']) : '';


if (!empty($_GET["search"])) {
    $str_tag = $_GET['search'];
    $sql = "SELECT * FROM `produst` WHERE `name` LIKE '%$str_tag%'";
    $rows = $pdo->query($sql)->fetchAll();
}

// 顏色篩選
$yellow = isset($_GET["yellow"]) ? ($_GET['yellow']) : '';
if (!empty($_GET["yellow"])) {
    $yellow = $_GET['yellow'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$yellow%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$blue = isset($_GET["blue"]) ? ($_GET['blue']) : '';
if (!empty($_GET["blue"])) {
    $blue = $_GET['blue'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$blue%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$red = isset($_GET["red"]) ? ($_GET['red']) : '';
if (!empty($_GET["red"])) {
    $red = $_GET['red'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$red%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$pink = isset($_GET["pink"]) ? ($_GET['pink']) : '';
if (!empty($_GET["pink"])) {
    $blue = $_GET['pink'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$pink%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$green = isset($_GET["green"]) ? ($_GET['green']) : '';
if (!empty($_GET["green"])) {
    $blue = $_GET['green'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$green%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$black = isset($_GET["black"]) ? ($_GET['black']) : '';
if (!empty($_GET["black"])) {
    $black = $_GET['black'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$black%'";
    $rows = $pdo->query($sql)->fetchAll();
}

$white = isset($_GET["white"]) ? ($_GET['white']) : '';
if (!empty($_GET["white"])) {
    $white = $_GET['white'];

    $sql = "SELECT * FROM `produst` WHERE `color` LIKE '%$white%'";
    $rows = $pdo->query($sql)->fetchAll();
}


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
    .kevin_product {
        display: none;
    }

    .color_btn {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        border: none;
    }

    .color_btn button {
        width: 100%;
        height: 100%;
        display: inline-block;
        border-radius: 50%;
        border: none;
    }

    .btn_yellow {
        background-color: yellow;
    }

    .btn_blue {
        background-color: blue;
    }

    .btn_red {
        background-color: red;
    }

    .btn_pink {
        background-color: pink;
    }

    .btn_green {
        background-color: green;
    }

    .btn_black {
        background-color: black;
    }

    .btn_white {
        background-color: wheat;
    }

    .fliter_select {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 5vh;
        border: 2px solid black;
    }

    .fliter_search {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 5vh;
        border: 2px solid black;
    }

    .fliter_color {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        border: 2px solid black;
    }

    .fliter_color_button {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }

    .fliter_color_button button {
        margin: 15px;
    }

    .fliter_checkbox {
        /* display: flex; */
        flex-direction: column;
        /* justify-content: center;
        align-items: center; */
        width: 100%;
        /* height: 20vh; */
        border: 2px solid black;
    }
</style>


<div class="container">
    <div class="list-section">

        <div class="col">
            <form action="kevin-produst.php" method="get" enctype="multipart/form-data">
                <div class="fliter_select">
                    <select class="select jc" aria-label="Default select example" name="option_price" id="option_price" onchange="select()">
                        <option selected>Open this select menu</option>
                        <option value="1" name="option_price">價格從高到低</option>
                        <option value="2" name="option_price">價格從低到高</option>
                    </select>
                </div>
            </form>

        </div>

        <div class="col ">
            <form class="d-flex" action="kevin-produst.php" method="get" enctype="mu">
                <div class="fliter_search">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>


        <div class="col fliter_color">
            <h2>color</h2>
            <div class="fliter_color_button">
                <button value="yellow" class="btn_yellow color_btn" onclick="yellow()" id="yellow" name="color"></button>
                <button value="blue" class="btn_blue color_btn" onclick="blue()" id="blue" name="color"></button>
                <button value="red" class="btn_red color_btn" onclick="red()" id="red" name="color"></button>
                <button value="pink" class="btn_pink color_btn" onclick="pink()" id="pink" name="color"></button>
                <button value="green" class="btn_green color_btn" onclick="green()" id="green" name="color"></button>
                <button value="black" class="btn_black color_btn" onclick="black()" id="black" name="color"></button>
                <button value="white" class="btn_white color_btn" onclick="white()" id="white" name="color"></button>
            </div>
        </div>




        <div class="fliter_checkbox">
            <form action="kevin-produst.php" method="get" enctype="multipart/form-data">
                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="3" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Shortboard</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="4" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Old School</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="6" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Decks</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="7" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Trucks</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="8" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Wheels</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="9" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Bearings</span>
                    </label>
                </div>

                <div class="fliter_checkbox_btn">
                    <label for="">
                        <input type="checkbox" value="2" style="vertical-align:middle;" name="checkbox[]">
                        <span style="vertical-align:middle;">Spray Paint</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary" name="ok">Type Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <button onclick="delete_select()" class=" d-inline-block w-25 btn-sm btn-danger">Delete Select</button>
    <button type="button" class="d-inline-block w-25 btn-sm btn-danger"><a style="text-decoration: none;" href="kevin-produst-add.php">Product Update</a></button>
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
                <th scope="col" class="text-center"><i class="fa-solid fa-heart"></i></th>
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
                    <td>
                        <a style="cursor: poninter;" onclick="favSend(<?= $r['sid'] ?>)"><i class="fa-solid fa-heart"></i></a>
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
    // 多選垃圾桶刪除
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

    let x;
    // 下拉式選單
    function select() {
        let x = document.getElementById('option_price').value;
        location.href = `kevin-produst.php?x=${x}`;
    }

    // 顏色篩選
    function yellow() {
        let btn = document.getElementById("yellow");
        let yellow = btn.value;
        location.href = `kevin-produst.php?yellow=${yellow}`;
    };

    function blue() {
        let btn = document.getElementById("blue");
        let blue = btn.value;
        location.href = `kevin-produst.php?blue=${blue}`;
    };

    function red() {
        let btn = document.getElementById("red");
        let red = btn.value;
        location.href = `kevin-produst.php?red=${red}`;
    };

    function pink() {
        let btn = document.getElementById("pink");
        let pink = btn.value;
        location.href = `kevin-produst.php?pink=${pink}`;
    };

    function green() {
        let btn = document.getElementById("green");
        let green = btn.value;
        location.href = `kevin-produst.php?green=${green}`;
    };

    function black() {
        let btn = document.getElementById("black");
        let black = btn.value;
        location.href = `kevin-produst.php?blue=${black}`;
    };

    function white() {
        let btn = document.getElementById("white");
        let white = btn.value;
        location.href = `kevin-produst.php?white=${white}`;
    };

    // 收藏商品
    const favSend = (sid) => {
        location.href = `kevin-favorite-api.php?produstSid=${sid}`;
    }
</script>

<?php require __DIR__ . '/parts/html-foot.php' ?>