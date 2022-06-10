<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-Member-Edit';
$sql = "SELECT  * FROM `member` WHERE 1;";
$mem_sql = $pdo->query($sql)->fetchAll();
if (isset($_SESSION['user'])) {
    foreach ($mem_sql as $rows => $r) {
        if ($r['mem-account'] === $_SESSION['user']['mem_account']) {
            // 取得登入中的會員資料
            $memLogin = $r;
        }
    }
}
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .list-section {
        display: none;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('./gary-img/DzqvS6DWoAAztYc.jpg_large')center center/cover;
        background-attachment: fixed;
    }

    .card {
        margin-top: 10%;
        width: 100%;
        border: 3px solid black;
    }

    .passForm {
        margin-top: 10%;
        width: 40%;
        height: 250px;
        background-color: white;
        border: 3px solid black;
        margin-left: 20px;
    }

    .register-title {
        background-color: black;
        color: white;
        font-size: 1.8rem;
        width: 100%;
    }

    .cameraICON {
        cursor: pointer;
    }

    .eyes-input {
        width: 90%;
    }

    .eyes {
        cursor: pointer;
    }

    .eyes img {
        width: 1.2rem;
    }

    .red {
        color: red;
    }

    .form2 {
        display: none;
    }

    .login {
        background: white;
        color: black;
    }

    .passBtn {
        margin-left: 55%;
    }

    #btn {
        border: 0px;
    }

    #myimg {
        margin-left: 20%;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        object-fit: cover;
    }

    .error {
        width: 60px;
        height: 60px;
        overflow: hidden;
        object-fit: contain;
        position: absolute;
        top: 85%;
        left: 80%;
        animation: error 0.7s linear;
        animation-fill-mode: forwards;
        display: none;
    }

    @keyframes error {
        0% {
            transform: translate(0px, 0px);
        }

        25% {
            transform: translate(-150px, -200px);
            width: 100px;
            height: 100px;
        }

        50% {
            transform: translate(-300px, -300px);
            width: 440px;
            height: 440px;
        }

        75% {
            transform: translate(-40px, -700px);
            width: 150px;
            height: 150px;
        }

        100% {
            transform: translate(-120px, -700px);
            width: 350px;
            height: 350px;
        }
    }
</style>

<div>
    <img class="error" src="./gary-img/ebee6628b9bddb6fe101666410a58bb3.png" alt="">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 d-flex">
            <div class="card">
                <form name="form1" onsubmit="sendData(); return false;" novoalidate>
                    <h5 class="register-title">會員修改</h5>
                    <input type="hidden" name="mem_avatar" value="<?= $memLogin['mem-avatar'] ?>">
                    <input type="hidden" name="mem_sid" value="<?= $memLogin['sid'] ?>">
                    <div class="card-body d-flex justify-content-between">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="" class="form-label">個人照片</label>
                            </div>
                            <div class="avatar">
                                <img id="myimg" src="./gary-uploaded/<?= ($memLogin['mem-avatar']) ?>" />
                            </div>
                            <div id="btn" onclick="uploadAvatar()"><i class="fa-solid fa-camera cameraICON"></i></div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="mem_account" class="form-label">帳號</label>
                                <!-- require 表示必填 -->
                                <input type="text" class="form-control" id="mem_account" name="mem_account" require value="<?= htmlentities($memLogin['mem-account']) ?>">
                                <div class="form-text red"></div>
                            </div>
                        </div>
                    </div>

                    <h5 class="register-title">資訊</h5>

                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <!-- novoalidate 不要用HTML5的檢查方式 -->
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="mem_name" class="form-label">姓名</label>
                                    <!-- require 表示必填 -->
                                    <input type="text" class="form-control" id="mem_name" name="mem_name" require value="<?= htmlentities($memLogin['mem-name']) ?>">
                                    <div class="form-text red"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="mem_mobile" class="form-label">手機</label>
                                    <!-- pattern 設定輸入格式 -->
                                    <input type="text" class="form-control" id="mem_mobile" name="mem_mobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($memLogin['mem-mobile']) ?>">
                                    <div class="form-text red"></div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="mem_nickname" class="form-label">暱稱</label>
                                    <input type="text" class="form-control" id="mem_nickname" name="mem_nickname" value="<?= htmlentities($memLogin['mem-nickname']) ?>">
                                    <div class="form-text red"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="mem_birthday" class="form-label">生日</label>
                                    <input type="date" class="form-control" id="mem_birthday" name="mem_birthday" value="<?= ($memLogin['mem-birthday']) ?>">
                                    <div class="form-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mb-3 col-6">
                                <label for="mem_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="mem_email" name="mem_email" value="<?= htmlentities($memLogin['mem-email']) ?>">
                                <div class="form-text red"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mb-3 col-6">
                                <label for="mem_address" class="form-label">地址</label>
                                <textarea class="form-control" name="mem_address" id="mem_address" cols="30" rows="1"><?= htmlentities($memLogin['mem-address']) ?></textarea>
                                <div class="form-text"></div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="gary-member-card.php" class="btn btn-primary login">Back</a>
                            <a href="javascript: delete_it(<?= $memLogin['sid'] ?>)" class="btn btn-primary login">刪除帳號</a>
                            <button type="submit" class="btn btn-primary">確認修改</button>
                        </div>
                    </div>
                </form>

                <form name="form2" action="gary-upload-avatar-api.php" method="post" enctype="multipart/form-data" style="display: none">
                    <input type="file" name="avatar" accept="image/*" />
                </form>

                <!-- 回應提示 -->
                <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                    修改成功
                </div>
            </div>
            <form class="passForm" name="form3" onsubmit="sendPass(); return false;" novoalidate>
                <h5 class="register-title">密碼專區</h5>
                <input type="hidden" name="mem_sid" value="<?= $memLogin['sid'] ?>">
                <input type="hidden" class="form-control" id="hidden_password" value="<?= htmlentities($memLogin['mem-password']) ?>">
                <div class="form-control d-flex justify-content-between">
                    <input type="password" class="form-control eyes-input" id="your_password" name="your_password" require placeholder="Your Password">
                    <a class="eyes d-flex align-items-center" onclick="togglePwd()">
                        <img src="./gary-img/eyes_off.png" alt="" id="eyes">
                    </a>
                </div>
                <div class="form-control d-flex justify-content-between">
                    <input type="password" class="form-control eyes-input" id="new_password" name="new_password" require placeholder="New Password">
                    <a class="eyes d-flex align-items-center" onclick="togglePwd2()">
                        <img src="./gary-img/eyes_off.png" alt="" id="eyes2">
                    </a>
                </div>
                <div class="form-text red password-red text-center"></div>
                <button type="submit" class="btn btn-primary mt-3 passBtn">更新密碼</button>
            </form>
        </div>
    </div>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    // 設定eamil格式
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    // 設定手機格式
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    // 取得新增提示的Element
    const info_bar = document.querySelector('#info-bar');


    // 取得該欄位的參照
    const name_f = document.form1.mem_name;
    const account_f = document.form1.mem_account;
    const email_f = document.form1.mem_email;
    const mobile_f = document.form1.mem_mobile;


    const your_password = document.form3.your_password;
    // 查看密碼的眼睛
    const eyes = document.querySelector('#eyes');
    const pwd = () => {
        your_password.setAttribute('type', 'password');
    };
    const seePwd = () => {
        your_password.setAttribute('type', 'text');
    };
    let isPwd = false;
    const togglePwd = () => {
        isPwd = !isPwd;
        if (isPwd) {
            eyes.src = './gary-img/eyes_off.png';
            pwd();
        } else {
            eyes.src = './gary-img/eyes_on.png';
            seePwd();
        }
    };

    const new_password = document.form3.new_password;
    // 查看密碼的眼睛
    const eyes2 = document.querySelector('#eyes2');
    const pwd2 = () => {
        new_password.setAttribute('type', 'password');
    };
    const seePwd2 = () => {
        new_password.setAttribute('type', 'text');
    };

    const togglePwd2 = () => {
        isPwd = !isPwd;
        if (isPwd) {
            eyes2.src = './gary-img/eyes_off.png';
            pwd2();
        } else {
            eyes2.src = './gary-img/eyes_on.png';
            seePwd2();
        }
    };



    // 檢查的
    // 把這些欄位放進一個陣列裡面
    const fields = [name_f, account_f, email_f, mobile_f];
    // 建立一個空陣列
    const fieldTexts = [];
    // 把fields這些欄位的下一個Element放進上面的空陣列
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }


    async function sendData() {
        //如果符合格式讓欄位的外觀回復原來的狀態
        for (let i in fields) {
            // 讓文字內容變回空值
            fieldTexts[i].innerText = '';
        }

        info_bar.style.display = 'none';



        // TODO: 欄位檢查, 前端的檢查
        // 這個變數是來判斷欄位有沒有通過檢查
        let isPass = true; // 預設是通過檢查的

        // 如果這個欄位的值的長度小於2
        if (name_f.value.length < 2) {
            // alert('姓名至少兩個字');
            // name_f.classList.add('red');
            // nextElementSibling 往下一個Element
            // name_f.nextElementSibling.classList.add('red');
            // 往上層找再往下層
            // name_f.closet('.mb-3').querySelector('.form-text').classList.add('red');

            // 寫入
            fieldTexts[0].innerText = '姓名至少兩個字';
            // 沒通過檢查
            isPass = false;
        }

        if (account_f.value === '') {
            // 寫入
            fieldTexts[1].innerText = '請輸入帳號';
            // 沒通過檢查
            isPass = false;
        }

        // if (password_f.value === '') {
        //     const passred = document.querySelector('.password-red');
        //     // 寫入
        //     passred.innerText = '請輸入密碼';
        //     // 沒通過檢查
        //     isPass = false;
        // }

        // 有填內容但不符合格式 裡面的值符不符合設定的格式
        if (email_f.value && !email_re.test(email_f.value)) {
            // alert('email 格式錯誤');
            fieldTexts[2].innerText = 'email 格式錯誤';
            isPass = false;
        }
        // 有填內容但不符合格式
        if (mobile_f.value && !mobile_re.test(mobile_f.value)) {
            // alert('手機號碼格式錯誤');
            fieldTexts[3].innerText = '手機號碼格式錯誤';
            isPass = false;
        }

        // 如果isPass是false 程式碼就不要繼續往下走
        if (!isPass) {
            return; // 結束函式
        }

        // 把整個表單內容抓出來
        const fd = new FormData(document.form1);

        // 把表單送給誰
        const r = await fetch('gary-mem-edit-api.php', {
            method: 'POST',
            body: fd,
        });
        // .then(d=>d.json())
        // .then(d=>{
        //     console.log(d);
        // })

        // 回傳的資料是JSON 轉回JS的陣列
        const result = await r.json();

        console.log(result);

        info_bar.style.display = 'block'; //顯示提示訊息

        // 如果新增成功 success=true
        if (result.success) {
            alert('修改成功');
            location.href = 'gary-member-card.php';
        } else {
            // info_bar.classList.remove('alert-success');
            // info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料沒有修改';
        }

    }

    // 上傳大頭照
    const btn = document.querySelector('#btn');
    const myimg = document.querySelector('#myimg');
    const avatar = document.form2.avatar;

    // 監聽的事件是內容改變(change)才會觸發
    avatar.addEventListener("change", async function() {

        // 上傳表單

        // 先拿到整個表單
        const fd2 = new FormData(document.form2);

        // r=拿到的回傳值(response)
        const r = await fetch("gary-upload-avatar-api.php", {
            // 預設是GET 這邊設定成POST
            method: "POST",
            // 我要傳的資料
            body: fd2,
        });

        // 設定一個變數是拿回來的JSON格式轉回JS格式
        const obj = await r.json();
        console.log(obj);

        // 顯示的照片路徑 uploaded這個資料夾+回傳過來的檔名
        myimg.src = "./gary-uploaded/" + obj.filename;
        document.form1.mem_avatar.value = obj.filename;
    });

    // 點擊btn等於點擊了input
    function uploadAvatar() {
        avatar.click(); // 模擬點擊
    }

    function delete_it(sid) {
        // 跳詢問視窗
        if (confirm(`確定要刪除此帳號嗎?`)) {
            // 如館按確定 轉到刪除檔
            location.href = `gary-memself-del.php?sid=${sid}`;
        }
    }


    // 修改密碼專區
    async function sendPass() {

        const hidden_password = document.querySelector('#hidden_password');
        const your_password = document.querySelector('#your_password');
        const new_password = document.querySelector('#new_password');
        const passred = document.querySelector('.password-red');

        if (hidden_password.value === your_password.value) {
            // 把整個表單內容抓出來
            const fd3 = new FormData(document.form3);

            // 把表單送給誰
            const r = await fetch('gary-mem-editPass-api.php', {
                method: 'POST',
                body: fd3,
            });
            const result = await r.json();
            if (result.success) {
                alert('密碼已更新');
                location.href = 'gary-member-card.php';
            } else {
                passred.innerText = '密碼更新失敗';
            }
        } else {
            passred.innerText = '密碼更新失敗';
            const error = document.querySelector('.error');
            error.style.display='block';
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>