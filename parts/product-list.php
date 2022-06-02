<?php
$cartCount = 0;
if(isset($_SESSION['cart'])){
    $cartCount = count($_SESSION['cart']);
};
?>
<style>
    .cart-icon{
        position: relative;
    }
    .cart-count{
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
                <div class="col-6 nav-left">
                    <div class="logo-container">
                        <a href=""><img src="./images/Street_logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-6 nav-right">
                    <a href=""><i class="fa-solid fa-user"></i></a>
                    <a class="cart-icon" onclick="confirm('要前往購物車嗎?')" href="Nathan-ViewCart.php"><i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count"><?= $cartCount ?></span>
                </a>
                </div>
            </div>
        </div>
    </header>
<div class="list-section">
    <div class="list-group">
        <a href="#" class="list-a list-group-item list-group-item-action">最新消息</a>
        <a href="#" class="list-a list-group-item list-group-item-action <?= $pageName === "Login" ? 'active' : '';?>">登入/註冊</a>
        <a href="#" class="list-a list-group-item list-group-item-action">會員管理</a>
        <a href="#" class="list-a list-group-item list-group-item-action">商品列表</a>
        <a href="#" class="list-a list-group-item list-group-item-action">課程資訊</a>
        <a href="Nathan-CartList.php" class="list-a list-group-item list-group-item-action <?= $pageName === "Nathan's cart" ? 'active' : '';?>">購物車</a>
    </div>
</div>