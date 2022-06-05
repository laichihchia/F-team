<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'cooler-list-add';
$title = '新增課程資訊';
?>

<?php include __DIR__ . '/parts/html-head.php' ?>

<?php
$cartCount = 0;
if (isset($_SESSION['cart'])) {
    $cartCount = count($_SESSION['cart']);
};
?>
<style>
    .cart-icon {
        position: relative;
    }

    .cart-count {
        position: absolute;
        top: -2px;
        right: -2px;
        width: 15px;
        height: 15px;
        font-size: 5px;
        color: white;
        background-color: red;
        border-radius: 50%;
        text-align: center;
        line-height: 15px;
        opacity: 0.9;
    }
</style>

<body>
    <header class="header-color">
        <div class="container container-maxWidth">
            <div class="row nav-info">
                <div class="col-6 nav-left d-flex">
                    <div class="logo-container">
                        <a href=""><img src="./images/Street_logo.png" alt=""></a>
                    </div>

                    <!-- NAVBAR 連結 BY KEVIN -->
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" style="color: white;">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" style="color: white;">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="kevin-produst.php" style="color:white ;">Product</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" style="color:white ;">Member</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" style="color:white ;">Event</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                </div>
                <div class="col-6 nav-right">
                    <a href="gary-member-login.php"><i class="fa-solid fa-user"></i></a>
                    <a class="cart-icon" style="cursor: pointer;" onclick="ifconfirm('Go cart?','Nathan-CartList.php')"><i class="fa-solid fa-cart-shopping"></i>
                        <span class="cart-count"><?= $cartCount ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
</body>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }

    /* .card {
        border: 0px solid transparent;
    } */

    .data-added-successfully {
        margin-top: 5px;

    }
</style>


<!-- -------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增課程資訊</h5>
                    <form name="form1" onsubmit="sendData();return false;">
                        <div class="mb-3">
                            <label for="name" class="form-label">課程名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="number_of_people" class="form-label">預約人數</label>
                            <input type="text" class="form-control" id="number_of_people" name="number_of_people" required>
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">課程價格</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="teacher" class="form-label">老師</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" required>
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">活動位置</label>
                            <input type="text" class="form-control" id="location" name="location" required>
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="duringtime_begin" class="form-label">開始時間</label>
                            <input type="date" class="form-control" id="duringtime_begin" name="duringtime_begin">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="duringtime_end" class="form-label">結束時間</label>
                            <input type="date" class="form-control" id="duringtime_end" name="duringtime_end">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">課程內容</label>
                            <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                            <div class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary ">新增</button>
                    </form>
                    <div id="info-bar" class="alert alert-success data-added-successfully " role="alert" style="display:none;">
                        資料新增成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const info_bar = document.querySelector('#info-bar');
    



    async function sendData() {
    

        const fd = new FormData(document.form1);
        const r = await fetch('cooler-list-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '新增成功';

            setTimeout(() => {
                location.href = 'cooler-list.php'; // 跳轉到列表頁
            }, 1000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料無法新增';
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>