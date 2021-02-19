<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

$uid = $_SESSION['uid'];
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');


include('../../common/component/favicon.html')
?>
<title>マイページ</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/mypage.css">

</head>





<body>

    <div class="grid-box">

        <header>
            <ul>


                <?php include('../../common/component/header-nav-leftIcon.html') ?>
                <div class='nav-right'>

                    <?php include('../../common/component/header-nav-rightIcon.php') ?>

                </div>

            </ul>
        </header>
        <div class="main">
            <p class='mylink'><a href="myprofile.php">店舗登録情報</a></p>
            <p class='mylink'><a href="drege.php">日記の登録</a></p>
            <p class='mylink'><a href="frege.php">花の登録</a></p>
            <p class='mylink'><a href="mapinfo.php">マップ情報</a></p>
        </div>




    </div>


    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3 class='topSubtitle'>Copyright second-cube</h3>
        </footer>

        <!-- フッターナビ -->
        <?php include('../../common/component/footer.html') ?>
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->





    </div>
</body>

</html>