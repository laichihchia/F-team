<?php require __DIR__ . '/parts/connect_db.php';
// unset($_SESSION['user']);

$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();

foreach ($mem_sql as $rows => $r) {
    if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
        // 取得登入中的會員資料
        $memLogin = $r;
    }
}
$memLogin_sid = $memLogin['sid'];
// 取得此會員的購物車紀錄
$sql = "SELECT * FROM `cart` WHERE `member_id` = $memLogin_sid";
$cart_sql = $pdo->query($sql)->fetchAll();
// echo json_encode($cart_sql);
// exit;
// add to cart
$product_id = $_POST['id'];
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_qty = $_POST['qty'];
if (isset($_POST['addCart'])) {
    foreach ($cart_sql as $key => $val) {
        if ($product_id === $val['sid']) {
            echo "<script>alert('此商品已加入購物車');
            window.location.href = 'Nathan-CartList.php';
            </script>";
        };
    }
    $sql = "INSERT INTO `cart`(
        `sid`,`name`,`qty`,
        `price`,`member_id`
        ) VALUES (
            ?, ?, ?,
            ?, ?
        )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $product_id,
        $product_name,
        $product_qty,
        $product_price,
        $memLogin_sid,
    ]);
    header('Location: Nathan-CartList.php');
};

// cart delete
if (isset($_POST['remove'])) {
    $delete_id = $_POST['cart_id'];
    $cart_delete_sql = "DELETE FROM `cart` WHERE `sid`= $delete_id";
    $pdo->query($cart_delete_sql);
    header('Location: Nathan-ViewCart.php');
};

// cart edit 
if (isset($_POST['update'])) {
    $edit_id = $_POST['cart_id'];
    $edit_qty = $_POST['cart_qty'];
    $cart_edit_sql = "UPDATE `cart` SET `qty` = $edit_qty WHERE `cart`.`sid` = $edit_id";
    $pdo->query($cart_edit_sql);
    header('Location: Nathan-ViewCart.php');
};
