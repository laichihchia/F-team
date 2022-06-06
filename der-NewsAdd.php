<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'der-NewEdit';
$title = 'der-NewEdit';

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增檔案</h5>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <div class="mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" id="title" name="title" value="">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">info</label>
                            <input type="" class="form-control" id="info" name="info" value="">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="info" class="form-label">image</label>
                            <input type="" class="form-control" id="image" name="image" value="">
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        資料編輯成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    async function sendData() {

        const fd = new FormData(document.form1);
        const r = await fetch('der-NewsAddapi.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        if (result.success) {
            alert('新增成功,1秒後跳回列表頁')
            setTimeout(() => {
                location.href = 'der-NewsList.php'; // 跳轉到列表頁
            }, 1000);
        } else {
            alert('新增失敗,請再次嘗試,1秒後跳回列表頁')
            setTimeout(() => {
                location.href = 'der-NewsList.php'; // 跳轉到列表頁
            }, 1000);
        }
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>