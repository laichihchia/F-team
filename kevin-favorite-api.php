<?php
session_start();
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');

$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();
foreach ($mem_sql as $rows => $r) {
    if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
        // 取得登入中的會員id
        $memLoginID = $r['sid'];
    }
}

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$produstSid = isset($_GET['produstSid']) ? intval($_GET['produstSid']) : 0;
$pro_sql = "SELECT * FROM `produst` WHERE `produst`.`sid` = $produstSid";
$produst_sql = $pdo->query($pro_sql)->fetch();
echo json_encode($produst_sql);
exit;
