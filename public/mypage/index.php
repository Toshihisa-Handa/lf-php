<?php
session_start();
include('../../funcs.php');

//loginCheck()

$pdo = dbcon();


$uid = $_SESSION['uid'];
include('../../common/header-icon.php');

?>

<?php include('../../common/metas.html') ?>
<title>マイページ</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/css/mypage.css">
</head>

<body>
    <div class="grid-box">
        <header>
            <ul>
                <?php include('../../common/header-nav-leftIcon.html') ?>
                <div class='nav-right'>
                    <?php include('../../common/header-nav-rightIcon.php') ?>
                </div>
            </ul>
        </header>
        <div class="main">
            <p class='mylink'><a href="/myprofile/">店舗登録情報</a></p>
            <p class='mylink'><a href="/drege/">日記の登録</a></p>
            <p class='mylink'><a href="/frege/">花の登録</a></p>
            <p class='mylink'><a href="/mapinfo/">マップ情報</a></p>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3 class='topSubtitle'>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <?php include('../../common/footer.html') ?>
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    </div>
</body>

</html>