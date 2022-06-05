<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');



$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => '',
    'bollen' => false,
];

// TODO: 欄位檢查, 後端的檢查
if (empty($_POST['mem_account'])) {
    $output['error'] = '沒有';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$mem_account = $_POST['mem_account'];
$mem_password = $_POST['mem_password'];


$sql = "SELECT  * FROM `member` WHERE 1;";

// $stmt = $pdo->query($sql);

$AccAndPwd = $pdo->query($sql)->fetchAll();
// echo json_encode($rrr, JSON_UNESCAPED_UNICODE);

foreach( $AccAndPwd as $k => $v){
            
    if (isset($_POST['mem_account'])) {
    
        if (!empty($_POST['mem_account']) and !empty($_POST['mem_password'])) {       
    
    
            if (!empty($AccAndPwd[$k])) {
                // echo json_encode($rrr[1]['member_password'], JSON_UNESCAPED_UNICODE);
    
                if ($_POST['mem_password'] === $AccAndPwd[$k]['mem-password']) {

                    $output['bollen'] = true;

                    if($AccAndPwd[$k]['mem-bollen'] == 1 ) {
                        // 登入成功
                    // 把資料設定到 session 裡 
                    $output['success'] = true;
                    $_SESSION['user'] = [
                        'mem_account' => $_POST['mem_account'],
                        'grade' => 'low',
                    ];
                    }

                }
            }
        }
        if (!isset($_SESSION['user'])) {

            if($output['bollen'] = true){
                $error_msg = '帳號已被停用';
            } else {
                $error_msg = '帳號或密碼錯誤';
            }
        }
    
    }


        }






echo json_encode($output, JSON_UNESCAPED_UNICODE);