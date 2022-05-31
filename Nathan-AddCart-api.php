<?php require __DIR__ . '/parts/connect_db.php';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$price = isset($_POST['price']) ? intval($_POST['price'])  : '';
$qty = isset($_POST['qty']) ? intval($_POST['qty']) : '';

$product = array($id,$name,$price,$qty);

$_SESSION[$name] = $product;
// var_dump(json_encode($product) );
header('Location: Nathan-CartList.php');