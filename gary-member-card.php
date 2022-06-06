<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-MemberCard';
// if (isset($_SESSION['user'])) {
//     if ($_SESSION['user']['grade'] === 'low') {
//         $mem_sql = $pdo->query("SELECT  * FROM `member` WHERE 1;")->fetchAll();
//         foreach ($mem_sql as $member_rows => $member_r) {
//             if ($member_r['mem-account'] === $_SESSION['user']['mem_account']) {
//                 // 取得登入中的會員id
//                 $memLoginID = $member_r['sid'];
//                 $cart_sql = $pdo->query("SELECT * FROM `cart` WHERE `member_id` = $memLoginID")->fetchAll();
//                 $count_sql = $pdo->query("SELECT COUNT(1) FROM `cart` WHERE `member_id` = $memLoginID")->fetchAll();
//                 $cartCount = $count_sql[0]['COUNT(1)'];

//                 // 右上角稱呼的顯示跟其他資訊
//                 $memName = $member_r['mem-name'];
//                 $memNick = $member_r['mem-nickname'];
//                 $memAvatar = $member_r['mem-avatar'];
//                 $memLevel = $member_r['mem-level'];
//                 $memCreated = $member_r['mem-created_at'];
//                 $iconName = $memNick;
//                 if ($memNick == '') {
//                     $iconName = $memName;
//                 }
//             }
//         }
//     }
//     if ($_SESSION['user']['grade'] === 'high') {
//         $ad_sql = $pdo->query("SELECT  * FROM `admin` WHERE 1;")->fetchAll();
//         foreach ($ad_sql as $ad_rows => $ad_r) {
//             if ($ad_r['ad-account'] === $_SESSION['user']['mem_account']) {
//                 // 取得登入中的會員id
//                 $memLoginID = $ad_r['sid'];
    
//                 // 右上角稱呼的顯示跟其他資訊
//                 $memName = $ad_r['ad-name'];
//                 $memAvatar = $ad_r['ad-avatar'];
    
//                 $iconName = $memName;
//             }
//         }
//     }
// }
// ?>
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
        width: 400px;
        margin-top: 10%;
        position: relative;
        transition: 1s;
        transform-style: preserve-3d;
        transform-origin: center;
    }
    
    .cardRotate {
        transform: rotateY(180deg);
    }

    .front {
        /* 背面朝向用戶時不可見 */
        width: 400px;
        height: 250px;
        position: absolute; 
        top: 0px;
        left: 0px;
        border-radius: 15px;
        cursor: pointer;
        backface-visibility: hidden;
    }

    .back {
        /* 背面朝向用戶時不可見 */
        width: 400px;
        height: 250px;
        position: absolute;
        top: 0px;
        left: 0px;
        transform: rotateY(-180deg);
        border-radius: 15px;
        cursor: pointer;
        backface-visibility: hidden;
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
        <div class="photo" <?= $_SESSION['user']['grade'] === 'high' ?'': 'onclick="Click()"' ?>>
            <div class="front">
                <div class="Bigcard">
                    <div class="CardBGC"></div>
                    <div class="cardBOX">
                        <h5 class="d-flex justify-content-center mb-5 mt-5 WordColor"><?= $_SESSION['user']['grade'] === 'high' ?'ADMIN CARD': 'MEMBERSHIP CARD' ?></h5>
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
            <div class="back">
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
    const photo = document.querySelector('.photo');

    Click = () => {
        photo.classList.toggle('cardRotate');
    }
</script>

<?php include __DIR__ . '/parts/html-foot.php' ?>