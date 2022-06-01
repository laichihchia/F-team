<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'kevin-produst-add';
$title = '新增通訊錄資料 - 小新的網站';
?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php' ?>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- <div class="card">
                <div class="card-body"> -->
            <h5 class="card-title">新增商品</h5>
            <form class="row g-3" name="form1" onsubmit="sendData();return false" novalidate>
                <div class="col-md-12">
                    <label for="produst_img" class="form-label">商品圖片</label>
                    <input type="file" class="form-control" id="produst_img" name="produst_img" accept="image/png,image/jpeg" required>
                </div>
                <div class="col-md-6">
                    <label for="brand" class="form-label">品牌名稱</label>
                    <input type="text" class="form-control" id="brand" name="brand">
                </div>
                <div class="col-6">
                    <label for="produst_name" class="form-label">商品名稱</label>
                    <input type="text" class="form-control" id="produst_name" name="produst_name">
                </div>
                <div class="col-12">
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
            <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                資料新增成功
            </div>
        </div>
    </div>
</div>
</div>

</div>
<?php require __DIR__ . '/parts/scripts.php' ?>
<?php require __DIR__ . '/parts/html-foot.php' ?>