<?php require __DIR__ . '/parts/connect_db.php';

// 有設定的話轉換成整數 沒有的話就是0
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 如果不是空字串或者是0
if (!empty($sid)) {
    $pdo->query("DELETE FROM `member` WHERE sid=$sid");
}

$come_from = 'gary-member-list.php';

// 如果SEVER裡的HTTP_REFERER不是空值
// HTTP_REFERER是ab-list.php的待留頁面
if (!empty($_SERVER['HTTP_REFERER'])) {
    // $come_from就等於當前SEVER裡的HTTP_REFERER
    $come_from = $_SERVER['HTTP_REFERER'];
}

// 頁面跳轉到
header("Location: $come_from");
