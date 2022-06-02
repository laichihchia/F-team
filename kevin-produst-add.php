<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'kevin-produst-add';
$title = '新增通訊錄資料 - 小新的網站';
?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- <div class="card">
                <div class="card-body"> -->
            <h5 class="card-title">新增商品</h5>
            <form class="row g-3" name="form1" onsubmit="sendData();return false" novalidate>
                <input type="hidden" name="mem_avatar">



                <div class="col-md-6">
                    <label for="produst_img" class="form-label">商品圖片</label>
                    <!-- <!-- <input type="file" class="form-control" id="produst_img" name="produst_img" accept="image/png,image/jpeg" required> -->
                    <button id="btn" onclick="uploadAvatar()">上傳大頭貼</button>
                </div>

                <div class="col-md-6">
                    <img id="myimg" src="">
                </div>



                <div class="col-md-6">
                    <label for="brand" class="form-label">品牌名稱</label>
                    <input type="text" class="form-control" id="brand" name="brand">
                </div>
                <div class="col-6">
                    <label for="produst_name" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" id="produst_name" name="produst_name">
                </div>
                <div class="col-md-12">
                    <label for="info" class="form-label">商品特色</label>
                    <br>
                    <textarea name="info" id="info" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-3">
                    <label for="price" class="form-label">價錢</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">新增</button>
                </div>
            </form>

            <form name="form2" action="kevin-upload-avatar-api.php" method="post" enctype="multipart/form-data" style="display: none">
                <input type="file" name="avatar" accept="image/*" />
            </form>

            <!-- <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                資料新增成功
            </div> -->
        </div>
    </div>
</div>
</div>

</div>
<?php require __DIR__ . '/parts/scripts.php' ?>
<script>
    async function sendData() {
        const fd = new FormData(document.form1);
        const r = await fetch('kevin-produst-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        // info_bar.style.display = 'block'; // 顯示訊息列
        // if (result.success) {
        //     info_bar.classList.remove('alert-danger');
        //     info_bar.classList.add('alert-success');
        //     info_bar.innerText = '新增成功';

        //     setTimeout(() => {
        //         // location.href = 'ab-list.php'; // 跳轉到列表頁
        //     }, 2000);
        // } else {
        //     info_bar.classList.remove('alert-success');
        //     info_bar.classList.add('alert-danger');
        //     info_bar.innerText = result.error || '資料無法新增';
        // }

    }

    const btn = document.querySelector("#btn");
    const myimg = document.querySelector("#myimg");
    const avatar = document.form2.avatar;

    avatar.addEventListener("change", async function() {
        // 上傳表單
        const fd2 = new FormData(document.form2);
        const r = await fetch("kevin-upload-avatar-api.php", {
            method: "POST",
            body: fd2,
        });
        const obj = await r.json();
        console.log(obj);
        myimg.src = "./Fteam-produst_img/" + obj.filename;
        document.form1.mem_avatar.value = obj.filename;
    });

    function uploadAvatar() {
        avatar.click(); // 模擬點擊
    }
</script>
<?php require __DIR__ . '/parts/html-foot.php' ?>