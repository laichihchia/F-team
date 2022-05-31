<?php
require __DIR__ . '/parts/connect_db.php'
?>
<?php require __DIR__ . '/parts/html-head.php' ?>
<?php require __DIR__ . '/parts/product-list.php'?>

<div class="row">
    <header class="mt-3">
        <div class="d-flex align-items-center pb-3 mb-3 border-bottom">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-4">Street Born Online Shop</span>
            </a>

            <nav class="d-inline-flex mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-light text-decoration-none btn btn-primary btn-sm" href="Nathan-CartList.php">Cart List</a>
                <a class=" py-2 text-light text-decoration-none btn btn-primary btn-sm" href="Nathan-ViewCart.php">View Cart</a>
            </nav>
        </div>
    </header>
</div>
<div class="row justify-content-center">
    <table class="table w-75">
        <thead>
            <tr class="text-center">
                <th scope="col">商品編號</th>
                <th scope="col">品名</th>
                <th scope="col">數量</th>
                <th scope="col">商品價格</th>
                <th scope="col">Total</th>
                <th scope="col">更改數量</th>
                <th scope="col">刪除商品</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td><a href="#" class="text-decoration-none btn-sm btn-dark">Update</a></td>
                <td><a href="#" class="text-decoration-none btn-sm btn-dark">Delete</a></td>
            </tr>
        </tbody>
    </table>
</div>

<?php require __DIR__ . '/parts/scripts.php' ?>
<?php require __DIR__ . '/parts/html-foot.php' ?>