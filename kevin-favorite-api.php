<?php
require __DIR__ . '/parts/connect_db.php';

$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();
foreach ($mem_sql as $rows => $r) {
    if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
        // 取得登入中的會員id
        $memLoginID = $r['sid'];
    }
}

$produstSid = isset($_GET['produstSid']) ? intval($_GET['produstSid']) : 0;
$pro_sql = "SELECT * FROM `produst` WHERE `produst`.`sid` = $produstSid";
$produst_sql = $pdo->query($pro_sql)->fetch();

$insert_fav_sql = "INSERT INTO `favorite`(`mem_id`, `product_img`, `product_brand`, `product_name`, `product_info`, `product_price`) VALUES (?,?,?,?,?,?);";
$stmt = $pdo->prepare($insert_fav_sql);
$stmt->execute([
    $memLoginID,
    $produst_sql['img'],
    $produst_sql['brand'],
    $produst_sql['name'],
    $produst_sql['info'],
    $produst_sql['price']
]);

$come_from = 'kevin-produst.php';
if(!empty($_SERVER['HTTP_REFERER'])){
    $come_from = $_SERVER['HTTP_REFERER'];
}
if($stmt->rowCount()===1){
    echo "
    <script>
        alert('收藏成功。');
        window.location.href = '$come_from';
    </script>
";
}else{
    echo "
    <script>
        alert('收藏失敗，請再次嘗試。');
        window.location.href = '$come_from';
    </script>
";
}
