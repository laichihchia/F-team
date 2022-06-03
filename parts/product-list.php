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
                    <a href=""><i class="fa-solid fa-user"></i></a>
                    <a style="cursor: pointer;" class="cart-icon" onclick="ifconfirm('Go Cart?','Nathan-CartList.php')" ><i class="fa-solid fa-cart-shopping"></i>
                        <span class="cart-count"><?= $cartCount ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="list-section">
        <div class="list-group">
            <a href="der-NewsList.php" class="list-a list-group-item list-group-item-action <?= $pageName === "der-NewsList" ? 'active' : ''; ?>">最新消息</a>
            <a href="gary-mem-list-true.php" class="list-a list-group-item list-group-item-action <?= $pageName === "會員管理" ? 'active' : ''; ?>">會員管理</a>
            <a href="#" class="list-a list-group-item list-group-item-action">商品列表</a>
            <a href="cooler-list.php" class="list-a list-group-item list-group-item-action <?= $pageName === "課程資訊" ? 'active' : ''; ?>">課程資訊</a>
            <a href="Nathan-CartList.php" class="list-a list-group-item list-group-item-action <?= $pageName === "Nathan's cart" ? 'active' : ''; ?>">購物車</a>

        </div>
    </div>
    <script>
        // confirm 專用 function
        const ifconfirm = (text,href) =>{
            if(confirm(text)){
                window.location.href = href;
            }
        }
        
    </script>