<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-Login';
$pageName = 'Login';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    body {
        background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('./gary-img/DzqvS6DWoAAztYc.jpg_large')center center/cover;
        background-attachment: fixed;
    }

    .list-section {
        display: none;
    }

    .card {
        margin-top: 40%;
        width: 100%;
        border: 3px solid black;
    }

    .register-title {
        text-align: center;
        font-weight: 700;
        font-size: 2rem;
        width: 100%;
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

    .btn {
        width: 50%;
        background: white;
        color: black;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <form action="" name="form1">
                    <div class="card-body">
                        <h5 class="register-title mb-5 mt-3">LOGIN</h5>
                        <div class="mb-5">
                            <input type="text" class="form-control" name="mem_account" placeholder="Admin Username" require>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-5">
                            <div class="form-control d-flex justify-content-between">
                                <input type="password" class="form-control eyes-input" name="mem_password" placeholder="Admin Password" require>
                                <a class="eyes d-flex align-items-center" onclick="togglePwd()">
                                    <img src="./gary-img/eyes_off.png" alt="" id="eyes">
                                </a>
                            </div>
                            <div class="form-text red password-red"></div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">登入</button>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="gary-member-login.php" class="text-decoration-none">
                                <p>切換至一般會員</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>

<script>
    // 查看密碼的眼睛
    const password_f = document.form1.mem_password;
    const eyes = document.querySelector('#eyes');
    const pwd = () => {
        password_f.setAttribute('type', 'password');
    };
    const seePwd = () => {
        password_f.setAttribute('type', 'text');
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
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>