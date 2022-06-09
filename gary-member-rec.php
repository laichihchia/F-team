<?php require __DIR__ . '/parts/connect_db.php';

// 有設定的話轉換成整數 沒有的話就是0
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;


// 如果不是空字串或者是0
if (!empty($sid)) {
    $rec_sql = $pdo->query("SELECT `orders`.member_sid, `order_details`.*, `produst`.name, `produst`.img, `orders`.order_date FROM orders
        JOIN order_details
            ON `orders`.sid=`order_details`.order_sid
        JOIN produst
            ON `produst`.sid=`order_details`.produst_sid
        WHERE `orders`.member_sid= $sid
        ORDER BY `orders`.order_date DESC, `order_details`.sid;")->fetchAll();
}


$come_from = 'gary-member-list-true.php';

// 如果SEVER裡的HTTP_REFERER不是空值
// HTTP_REFERER是ab-list.php的待留頁面
if (!empty($_SERVER['HTTP_REFERER'])) {
    // $come_from就等於當前SEVER裡的HTTP_REFERER
    $come_from = $_SERVER['HTTP_REFERER'];
}

// 頁面跳轉到
header("Location: $come_from");
