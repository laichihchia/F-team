<?php
require __DIR__ . '/parts/connect_db.php';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .card {
        margin-top: 10%;
        width: 100%;
    }

    .register-title {
        background-color: black;
        color: white;
        font-size: 1.8rem;
        width: 100%;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form action="">
                <h5 class="register-title">LOGIN</h5>
                <div class="card-body">
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>