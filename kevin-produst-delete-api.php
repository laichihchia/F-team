<?php require __DIR__ . '/parts/connect_db.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (!empty($sid)) {
    $pdo->query("DELETE FROM `produst` WHERE sid=$sid");
}
$come_from = 'kevin-produst.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
