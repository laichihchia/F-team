<?php require __DIR__ . '/parts/connect_db.php';


// test code
// session_destroy();
// var_dump($_SESSION['user']) ;
// exit;
// var_dump($_SESSION['cart'][0]['productID']);
// exit;
//get Add post
$product_id = $_POST['id'];
$product_name = $_POST['name'];
$product_price = $_POST['price'];
$product_qty = $_POST['qty'];

if (isset($_POST['addCart'])) {
    $check_product = array_column($_SESSION['cart'], 'productID');
    if (in_array($product_id, $check_product)) {
        echo "<script>alert('此商品已加入購物車');
            window.location.href = 'Nathan-CartList.php';
            </script>";
    } else {
        $_SESSION['cart'][] = array(
            'productID' => $product_id,
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQty' => $product_qty
        );
        header('Location: Nathan-CartList.php');
    }
};

// get Delete post
if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        if ($v['productID'] === $_POST['item']) {
            unset($_SESSION['cart'][$k]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('Location: Nathan-ViewCart.php');
        }
    }
}

// get Update post
if (isset($_POST['update'])) {
    foreach ($_SESSION['cart'] as $k => $v) {
        if ($v['productID'] === $_POST['item']) {
            $_SESSION['cart'][$k] = array(
                'productID' => $product_id,
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQty' => $product_qty
            );
            header('Location: Nathan-ViewCart.php');
        }
    }
}
