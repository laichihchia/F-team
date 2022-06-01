<?php
require __DIR__ . '/parts/connect_db.php';
// 檔頭設定成JSON  預設是HTML
header("Content-type:application/json");

// 要輸出的功能
$output = [
    // 有沒有新增成功
    'success' => false,
    // 前端傳過來什麼資料 再丟回去
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

// TODO: 欄位檢查, 後端的檢查

// 如果是空字串 exit直接結束
if (empty($_POST['mem_name'])) {
    // 告訴用戶端沒有姓名資料
    $output['error'] = '沒有姓名資料';
    // 除錯用的代號 可以自己定義
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 如果是空字串 exit直接結束
if (empty($_POST['mem_account'])) {
    // 告訴用戶端沒有姓名資料
    $output['error'] = '沒有帳號資料';
    // 除錯用的代號 可以自己定義
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 如果是空字串 exit直接結束
if (empty($_POST['mem_password'])) {
    // 告訴用戶端沒有姓名資料
    $output['error'] = '沒有密碼資料';
    // 除錯用的代號 可以自己定義
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


// name必填
$name = $_POST['mem_name'];
// 沒有給的話給空字串
$nickname = $_POST['mem_nickname'] ?? '';
// 沒有給的話給平民
$level = $_POST['mem_level'] ?? '平民';
// account必填
$account = $_POST['mem_account'];
// password必填
$password = $_POST['mem_password'];
// 沒有給的話給空字串
$email = $_POST['mem_email'] ?? '';
// 沒有給的話給空字串
$mobile = $_POST['mem_mobile'] ?? '';
// 沒有給的話給空字值
$birthday = empty($_POST['mem_birthday']) ? NULL : $_POST['mem_birthday'];
// 沒有給的話給空字串
$address = $_POST['mem_address'] ?? '';
// 沒有給的話給空字串
$avatar = $_POST['mem_avatar'] ?? '';


//後端欄位檢查Email filter_var過濾
// 如果email不是空字串且email不符合格式  (符合的話會回傳)
if(! empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $output['error'] = 'Email 格式錯誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


$sql ="INSERT INTO `member`(
    `mem-name`, `mem-nickname`, `mem-level`, 
    `mem-account`, `mem-password`, `mem-email`, 
    `mem-mobile`, `mem-birthday`, `mem-address`, `mem-created_at`, `mem-avatar`
    ) VALUES (
        ?, ?, ?,
        ?, ?, ?,
        ?, ?, ?, NOW(), ?
        )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $nickname,
    $level,
    $account,
    $password,
    $email,
    $mobile,
    $birthday,
    $address,
    $avatar
]);

// rowCount() 輸入的返回值是不是對的
// 如果是對的(== 1)
if ($stmt->rowCount() == 1) {
    // 新增成功
    $output['success'] = true;
    // lastInsertId 最近新增資料的 primery key (sid)
    $output['lastInsertId'] = $pdo->lastInsertId();

// 如果輸入的返回值是不對的    
} else {
    $output['error'] = '資料無法新增';
}
// isset() vs empty()


// JSON_UNESCAPED_UNICODE 中文字不要編碼進行正確輸出
echo json_encode($output, JSON_UNESCAPED_UNICODE);