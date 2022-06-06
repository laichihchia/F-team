<?php require __DIR__ . '/parts/connect_db.php';
$pageName = "Nathan's Order Page";
$title = "Nathan-OrderPage - Nathan's cart";

if (!isset($_SESSION['user'])) {
    echo "<script>alert('請登入會員');
    window.location.href = 'gary-member-login.php';
    </script>";
}

// get 拿取 被選取項目的 produst_id
$produst_id = isset($_GET['produst_id'])?($_GET['produst_id']):'';
if($produst_id === ""){
    echo "
        <script>
            alert('請勾選您要結帳的商品');
            window.location.href = 'Nathan-ViewCart.php';
        </script>
    ";
};


// 取得登入中的會員sid
$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();
foreach ($mem_sql as $rows => $r) {
    if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
        $memLoginID = $r['sid'];
    }
}

// 取得此會員的購物車紀錄 and 被選取的項目
$cart_sql = $pdo->query("SELECT * FROM `cart` WHERE `produst_id` IN ($produst_id) AND `member_id` = $memLoginID;")->fetchAll();


// 取得此筆消費總金額
$od_total_price = 0;
foreach ($cart_sql as $k => $v) {
    $od_total_price += $v['price'];
};

// insert order
$sql = "INSERT INTO `orders`(
    `member_sid`,`total`,`order_date`
    ) VALUES (
        ?, ?, NOW()
    )";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $memLoginID,
    $od_total_price,
]);


// insert order_detail
// $pdo -> lastInsertId() 拿到剛新增訂單的sid
$last_insert_sid = $pdo -> lastInsertId();
foreach ($cart_sql as $rows => $r) {
    $sql = "INSERT INTO `order_details`(
    `order_sid`,`member_sid`,`produst_sid`,
    `price`,`quantity`
    ) VALUES (
        ?, ?, ?,
        ?, ?
    )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $last_insert_sid,
        $r['member_id'],
        $r['produst_id'],
        $r['price'],
        $r['qty'],
    ]);
}

// 訂單成立 刪除已結帳的商品
echo "
        <script>
            alert('恭喜您結帳成功, 您的訂單編號為$last_insert_sid,即將回到購物區,買買買起來');
            setTimeout(() => {
                window.location.href = 'Nathan-CartList.php';
            }, 1500);
        </script>
";
$pdo->query("DELETE FROM `cart` WHERE `produst_id` in ($produst_id) AND `member_id` = $memLoginID;");


exit;
?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<?php require __DIR__ . '/parts/scripts.php' ?>
<?php require __DIR__ . '/parts/html-foot.php' ?>
