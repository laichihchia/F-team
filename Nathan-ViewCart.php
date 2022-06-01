<?php require __DIR__ . '/parts/connect_db.php';
// session_destroy();
// foreach($_SESSION as $v){
//     echo json_encode($v);
// }
// exit;

$pageName = "Nathan's cart";
$title = "Nathan-ViewCart - Nathan's cart";
//MV 資料處理 後端邏輯

// 用戶要看第幾頁
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if ($page < 1) {
    header('Location: Nathan-CartList.php'); //轉向自己 或 給page=1 給值
    exit;
};
// 每一頁要幾筆
$perpage = 4;

// 取得總比數
$t_sql = "SELECT COUNT(1) FROM `products`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; // 拿出來是索引式陣列用法

// 取得總頁數
$totalPage = ceil($totalRows / $perpage);


$rows = []; // 給預設值 如果沒有資料 跑回圈用到 會出錯
if ($totalPage > 0) { //如果有資料 在執行if內的內容
    if ($page > $totalPage) {
        header("Location: ?page=$totalPage"); // 如果使用著輸入urlencoded > 總頁數,跳轉最後一頁
        exit;
    };
    $sql = sprintf("SELECT * FROM `products` LIMIT %s,%s", ($page - 1) * $perpage, $perpage);

    $rows = $pdo->query($sql)->fetchAll();
};

?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<style>
    .cart-container {
        font-family: 'Anton', sans-serif;
    }
</style>
<div class="cart-container">
    <!-- 內導覽 -->
    <div class="row">
        <header class="mt-3">
            <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Street Born Online Shop</span>
                </a>

                <nav class="d-inline-flex mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 text-light text-decoration-none btn btn-primary btn-sm" href="Nathan-CartList.php">Cart List</a>
                    <a class=" py-2 text-light text-decoration-none btn btn-primary btn-sm" href="Nathan-ViewCart.php">View Cart</a>
                </nav>
            </div>
        </header>
    </div>
    <!-- 內導覽 -->
    <!-- 呈現區 -->
    <div class="row justify-content-center">
        <table class="table w-100">
            <thead>
                <tr class="text-center">
                    <th scope="col">NO.</th>
                    <th scope="col">品名</th>
                    <th scope="col">商品價格</th>
                    <th scope="col">數量</th>
                    <th scope="col">Total</th>
                    <th scope="col">更改數量</th>
                    <th scope="col">刪除商品</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // 計算每樣商品總價
                $total = 0;
                foreach ($_SESSION['cart'] as $key => $ar) : 
                    $total = $ar['productPrice'] * $ar['productQty'];
                ?>
                    <form action="Nathan-AddCart-api.php" method="POST">
                        <tr class="text-center">
                            <td scope="col"><?= $ar['productID']; ?></td>
                            <input type="hidden" name="id" value="<?= $ar['productID']; ?>">
                            <td scope="col"><?= $ar['productName']; ?></td>
                            <input type="hidden" name="name" value="<?= $ar['productName']; ?>">
                            <td scope="col"><?= $ar['productPrice']; ?></td>
                            <input type="hidden" name="price" value="<?= $ar['productPrice']; ?>">
                            <td><input class="w-50" type="number" name="qty" value="<?= $ar['productQty']; ?>"></td>
                            <td scope="col singlePrice"><?= $total;?></td>
                            <td><button name="update" class=" btn-sm btn-dark">Update</button></td>
                            <td><button name="remove" class=" btn-sm btn-dark">Delete</button></td>
                            <input type="hidden" name="item" value="<?= $ar['productID']; ?>">
                        </tr>
                    </form>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- 呈現區 -->
</div>

<?php require __DIR__ . '/parts/scripts.php' ?>
<script>
    const singlePrice = document.querySelector('.singlePrice');
    console.log(singlePrice);
</script>
<?php require __DIR__ . '/parts/html-foot.php' ?>