<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-MemberCard';
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .list-section {
        display: none;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('./gary-img/DzqvS6DWoAAztYc.jpg_large')center center/cover;
        background-attachment: fixed;
    }

    .photo {
        margin-top: 10%;
    }

    .front {
        /* 背面朝向用戶時不可見 */
        backface-visibility: hidden;
        transition: 0.6s;
        transform-style: preserve-3d;
        position: absolute;
        border-radius: 15px;
        cursor: pointer;
    }

    .back {
        /* 背面朝向用戶時不可見 */
        backface-visibility: hidden;
        transition: 0.6s;
        transform-style: preserve-3d;
        position: absolute;
        transform: rotateY(-180deg);
        border-radius: 15px;
        cursor: pointer;
    }

    .WordColor {
        color: white;
    }

    .Bigcard {
        position: relative;
    }

    .CardBGC {
        width: 400px;
        height: 250px;
        background-color: gray;
        opacity: 0.7;
        position: absolute;
        border-radius: 25px;
    }

    .cardBOX {
        position: absolute;
        width: 400px;
    }

    .img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        object-fit: cover;
    }

    .EditIcon {
        width: 100px;
        height: 100px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="photo">
            <div class="front" onclick="Click()">
                <div class="Bigcard">
                    <div class="CardBGC"></div>
                    <div class="cardBOX">
                        <h5 class="d-flex justify-content-center mb-5 mt-5 WordColor">MEMBERSHIP CARD</h5>
                        <div class="d-flex justify-content-around">
                            <div class="WordColor">
                                <p><?= $iconName ?></p>
                                <p><?= $memLoginID ?></p>
                            </div>
                            <div>
                                <img src="<?= "gary-uploaded/$memAvatar" ?>" alt="" class="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back" onclick="Click2()">
                <div class="Bigcard">
                    <div class="CardBGC"></div>
                    <div class="cardBOX">
                        <div class="d-flex justify-content-around mb-5 mt-5 WordColor">
                            <h5>MEMBER INFO</h5>
                            <h5><?= $memLevel ?></h5>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="WordColor">
                                <p>Join Time</p>
                                <p><?= $memCreated ?></p>
                            </div>
                            <div class="mt-5">
                                <a href="gary-mem-edit.php" class="EditIcon WordColor text-decoration-none">
                                    EDIT
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include __DIR__ . '/parts/scripts.php' ?>

<script>
    // 卡片點擊反轉
    const back = document.querySelector('.back');
    const front = document.querySelector('.front');
    Click = () => {
        back.style.transform = 'rotateY(0deg)';
        front.style.transform = 'rotateY(180deg)';
    }
    Click2 = () => {
        back.style.transform = 'rotateY(180deg)';
        front.style.transform = 'rotateY(0deg)';
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>