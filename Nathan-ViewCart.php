<?php require __DIR__ . '/parts/connect_db.php';

$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();
foreach ($mem_sql as $rows => $r) {
    if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
        // 取得登入中的會員id
        $memLoginID = $r['sid'];
    }
}
$sql = "SELECT * FROM `cart` WHERE `member_id` = $memLoginID";
$cart_sql = $pdo->query($sql)->fetchAll();

if (empty($_SESSION['user']['mem_account'])) {
    echo "<script>alert('請先登入會員');
    window.location.href = 'gary-member-login.php';
    </script>";
    exit;
}
$sql = "SELECT COUNT(1) FROM `cart` WHERE `member_id` = $memLoginID";
$count_sql = $pdo->query($sql)->fetchAll();


$pageName = "Nathan's cart";
$title = "Nathan-ViewCart - Nathan's cart";

?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<style>
    .cart-container {
        font-family: 'Anton', sans-serif;
    }

    .prod-bottom td {
        border: 0;
    }

    .total-text {
        border-bottom: 2px solid #777;
        font-weight: 600;
        color: #777;
    }

    .total-text-info {
        font-weight: 600;
        color: #777;
        padding-right: 0;
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
        <table class="table w-100 ">
            <thead>
                <tr class="text-center">
                    <th scope="col">NO.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 計算每樣商品總價
                $total = 0;
                $productTotal = 0;
                $i = 1;
                foreach ($cart_sql as $rows => $r) :
                    $productTotal = $r['price'] * $r['qty'];
                    $total += $r['price'] * $r['qty'];
                    $i = $rows + 1;
                ?>
                    <form action="Nathan-AddCart-api.php" method="POST">
                        <tr class="text-center prod-bottom">
                            <td scope="col"><?= $i ?></td>
                            <input type="hidden" name="id" value="<?= $r['sid']; ?>">
                            <td scope="col"><?= $r['name']; ?></td>
                            <input type="hidden" name="name" value="<?= $r['name']; ?>">
                            <td scope="col"><?= $r['price']; ?></td>
                            <input type="hidden" name="price" value="<?= $r['price']; ?>">
                            <td><input class="w-50" type="number" name="qty" min="0" value="<?= $r['qty']; ?>"></td>
                            <td scope="col"><?= $productTotal; ?></td>
                            <td><button onclick="confirm('確定要變更此商品數量嗎?');" name="update" class=" btn-sm btn-dark">Update</button></td>
                            <td><button onclick="confirm('確定要將此商品移除購物車嗎?');" name="remove" class=" btn-sm btn-dark">Delete</button></td>
                            <input type="hidden" name="item" value="<?= $ar['productID']; ?>">
                        </tr>
                    </form>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <h5 class="total-text pb-2">TotalPrice :</h5>
        </div>
    </div>
    <div class="row total-text-wrap pb-3">
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2 total-text-info d-flex align-content-center justify-content-end pe-2">NT$ <?= $total ?></div>
        <div class="col-2 text-end">
            <a href="" class="btn btn-sm btn-dark">Go to Checkout</a>
        </div>
    </div>
    <!-- 呈現區 -->
</div>

<?php require __DIR__ . '/parts/scripts.php' ?>
<script>

</script>
<?php require __DIR__ . '/parts/html-foot.php' ?>