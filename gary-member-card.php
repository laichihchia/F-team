<?php
require __DIR__ . '/parts/connect_db.php';
$title = 'Gary-MemberCard';

if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['grade'] === 'low') {
        $mem_sql = $pdo->query("SELECT  * FROM `member` WHERE 1;")->fetchAll();
        foreach ($mem_sql as $member_rows => $member_r) {
            if ($member_r['mem-account'] === $_SESSION['user']['mem_account']) {
                // 取得登入中的會員id
                $memLoginID = $member_r['sid'];
                $rec_sql = $pdo->query("SELECT `orders`.member_sid, `order_details`.*, `produst`.name, `produst`.img, `orders`.order_date FROM `orders`
        JOIN `order_details`
            ON `orders`.sid=`order_details`.order_sid
        JOIN `produst`
            ON `produst`.sid=`order_details`.produst_sid
        WHERE `orders`.member_sid= $memLoginID
        ORDER BY `orders`.order_date DESC, `order_details`.sid;")->fetchAll();

                $coll_sql = $pdo->query("SELECT `favorite`.mem_id, `produst`.*, `favorite`.`product_img`, `favorite`.product_name, `favorite`.product_price FROM favorite
        JOIN produst
            ON `favorite`.product_img=`produst`.img
        WHERE `favorite`.mem_id= $memLoginID
        ORDER BY `favorite`.sid DESC, `produst`.sid;")->fetchAll();
            }
        }
    }
}
?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/product-list.php' ?>

<style>
    .list-section {
        display: none;
    }

    body {
        background: url('./gary-img/d481ad3029497cb33cf6f580a701615b.gif')center center no-repeat;
        background-size: 40%;
        background-position: 45% 0%;
        background-color: black;
        background-attachment: fixed;
    }

    .photo {
        width: 400px;
        margin-top: 5%;
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

    .scrollbar {
        width: 490px;
        height: 80vh;
        overflow: auto;
    }

    .scro-left {
        margin-top: 38%;
        width: 640px;
        height: 260px;
        overflow: auto;
    }

    .scrollbar::-webkit-scrollbar {
        width: 1em;
    }

    .scrollbar::-webkit-scrollbar-thumb {
        background-color: white;
        border: 1px solid slategrey;
    }

    .scro-left::-webkit-scrollbar {
        width: 1em;
    }

    .scro-left::-webkit-scrollbar-thumb {
        background-color: black;
        border: 1px solid slategrey;
    }

    .Leftscrollbarbox {
        margin-right: 10px;
        width: 150px;
    }

    .Leftscrollbarbox:hover {
        opacity: 0.8;
    }

    .boxLeft-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
    }

    .Leftscrollbarbox img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        object-fit: contain;
    }
    
    .Leftscrollbarbox img:hover {
        border: 3px solid gray;
    }

    .Leftscrollbarbox p {
        width: 100%;
        margin-top: 5px;
        font-size: 20px;
        text-align: center;
        color: white;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        white-space: normal;
    }

    .scrollbarbox {
        background-color: white;
        border-radius: 10px;
        margin-right: 5px;
        margin-bottom: 5px;
    }

    .scrollbarbox:hover {
        opacity: 0.8;
        border: 3px solid black;
    }

    .scrollbarbox_left {
        width: 35%;
        height: 150px;
    }

    .box_img {
        width: 100%;
        height: 100%;
        overflow: hidden;
        object-fit: contain;
    }

    .scrollbarbox_right {
        width: 65%;
        height: 150px;
    }

    .box-TN {
        color: red;
        font-size: 14px;
        font-weight: 600;
        line-height: 4px;
        margin-top: 20px;
        margin-bottom: 10px;
    }

    .box-word {
        font-size: 16px;
        font-weight: 600;
    }

    .box-word2 {
        font-size: 16px;
        font-weight: 600;
    }

    .box-word3 {
        font-size: 16px;
        font-weight: 600;
        margin-left: 5px;
    }

    .dsn {
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="photo" <?= $_SESSION['user']['grade'] === 'high' ? '' : 'onclick="Click()"' ?>>
            <div class="front">
                <div class="Bigcard">
                    <div class="CardBGC"></div>
                    <div class="cardBOX">
                        <h5 class="d-flex justify-content-center mb-5 mt-5 WordColor"><?= $_SESSION['user']['grade'] === 'high' ? 'ADMIN CARD' : 'MEMBERSHIP CARD' ?></h5>
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
        <?php if ($_SESSION['user']['grade'] === 'low') : ?>
            <div class="d-flex justify-content-between">
                <div class="scrollbar scro-left">
                    <div class="d-flex">
                        <?php foreach ($coll_sql as $coll_rows => $coll_r) : ?>
                            <div class="Leftscrollbarbox">
                                <a href="kevin-edit.php?sid=<?= $coll_r['sid'] ?>" class="text-decoration-none">
                                    <div class="boxLeft-img">
                                        <img src="Fteam-produst_img/<?= $coll_r['img'] ?>" alt="">
                                    </div>
                                    <div>
                                        <p><?= $coll_r['name'] ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="scrollbar">
                    <div class="scrollbarIN">
                        <?php foreach ($rec_sql as $rec_rows => $rec_r) : ?>
                            <div class="scrollbarbox">
                                <a href="kevin-edit.php?sid=<?= $rec_r['produst_sid'] ?>" class="d-flex text-decoration-none">
                                    <div class="scrollbarbox_left">
                                        <img src="Fteam-produst_img/<?= $rec_r['img'] ?>" alt="" class="box_img">
                                    </div>
                                    <div class="scrollbarbox_right d-flex align-items-center">
                                        <div>
                                            <p class="box-TN"><?= $rec_r['order_date'] ?></p>
                                            <p class="box-TN">Oder :<?= $rec_r['order_sid'] ?></p>
                                            <p class="box-word"><?= $rec_r['name'] ?></p>
                                            <div class="d-flex">
                                                <p class="box-word2">$<?= $rec_r['price'] ?></p>
                                                <p class="box-word3">* <?= $rec_r['quantity'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        <?php endif; ?>

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