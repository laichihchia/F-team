<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'cooler-list-add';
$title = '編輯課程資訊';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location: cooler-list.php');
    exit;
}

$row = $pdo->query("SELECT * FROM lesson WHERE sid=$sid")->fetch();
if (empty($row)) {
    header('Location: cooler-list.php');
    exit;
}



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
        margin-top: 10px;

    }
</style>


<!-- -------------------------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯課程資訊</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                    <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">課程名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name']) ?>">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="number_of_people" class="form-label">預約人數</label>
                            <input type="number" class="form-control" id="number_of_people" name="number_of_people" required value="<?= htmlentities($row['number_of_people']) ?>">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">課程價格</label>
                            <input type="number" class="form-control" id="price" name="price" required value="<?= htmlentities($row['price']) ?>">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="teacher" class="form-label">老師</label>
                            <input type="text" class="form-control" id="teacher" name="teacher" required value="<?= htmlentities($row['teacher']) ?>">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="location" class="form-label">活動位置</label>
                            <input type="text" class="form-control" id="location" name="location" required value="<?= htmlentities($row['location']) ?>">
                            <div class="form-text red"></div>
                        </div>

                        <div class="mb-3">
                            <label for="duringtime_begin" class="form-label">開始時間</label>
                            <input type="date" class="form-control" id="duringtime_begin" name="duringtime_begin" value="<?= htmlentities($row['duringtime_begin']) ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="duringtime_end" class="form-label">結束時間</label>
                            <input type="date" class="form-control" id="duringtime_end" name="duringtime_end" value="<?= htmlentities($row['duringtime_end']) ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">課程內容</label>
                            <textarea class="form-control" name="info" id="info" cols="30" rows="3"><?= htmlentities($row['info']) ?></textarea>
                            <div class="form-text red"></div>
                        </div>

                        <button type="submit" class="btn btn-primary ">修改</button>
                    </form>
                    <div id="info-bar" class="alert alert-success data-added-successfully " role="alert" style="display:none;">
                        資料修改成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const info_bar = document.querySelector('#info-bar');

    const name_f = document.form1.name;
    const number_of_people_f = document.form1.number_of_people;
    // const price_f = document.form1.price;
    // const teacher_f = document.form1.teacher;
    // const location_f = document.form1.location;
    const duringtime_begin_f = document.form1.duringtime_begin;
    const duringtime_end_f = document.form1.duringtime_end;
    // const info_f = document.form1.info;

    const fields = [
        name_f,
        number_of_people_f,
        // price_f,
        // teacher_f,
        // location_f,
        duringtime_begin_f,
        duringtime_end_f,
        // info_f
    ];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }



    async function sendData() {
        // 讓欄位的外觀回復原來的狀態
        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }
        info_bar.style.display = 'none'; // 隱藏訊息列

        // TODO: 欄位檢查, 前端的檢查
        let isPass = true; // 預設是通過檢查的

        if (name_f.value.length < 2) {
            // alert('姓名至少兩個字');
            // name_f.classList.add('red');
            // name_f.nextElementSibling.classList.add('red');
            // name_f.closest('.mb-3').querySelector('.form-text').classList.add('red');

            fields[0].classList.add('red');
            fieldTexts[0].innerText = '課程名稱至少兩個字';
            isPass = false;
        }

        if (parseInt(number_of_people_f.value) < 1){
            fields[1].classList.add('red');
            fieldTexts[1].innerText = '人數至少1人';
            isPass = false;
        }


        let day1 = new Date(duringtime_begin_f.value);
        let day2 = new Date(duringtime_end_f.value);

        let difference = day2.getTime() - day1.getTime();


        if (difference < 0) {
            // fields[2].classList.add('red');
            // fieldTexts[2].innerText = '';
            fields[3].classList.add('red');
            fieldTexts[3].innerText = '結束時間要大於開始時間';
            isPass = false;
        }

        if (!isPass) {
            return; // 結束函式
        }


        const fd = new FormData(document.form1);
        const r = await fetch('cooler-list-edit-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '修改成功';

            setTimeout(() => {
                location.href = 'cooler-list.php'; // 跳轉到列表頁
            }, 1000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料沒有修改';
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>