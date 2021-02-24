<?php
require('../controller/mypage.php');
?>

<?php include('common/favicon.html') ?>
<title>マイページ</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/mypage.css">
</head>

<body>
    <div class="grid-box">
        <header>
            <ul>
                <?php include('common/header-nav-leftIcon.html') ?>
                <div class='nav-right'>
                    <?php include('common/header-nav-rightIcon.php') ?>
                </div>
            </ul>
        </header>
        <div class="main">
            <p class='mylink'><a href="/view/myprofile.php">店舗登録情報</a></p>
            <p class='mylink'><a href="/view/drege.php">日記の登録</a></p>
            <p class='mylink'><a href="/view/frege.php">花の登録</a></p>
            <p class='mylink'><a href="/view/mapinfo.php">マップ情報</a></p>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3 class='topSubtitle'>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <?php include('common/footer.html') ?>
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    </div>
</body>

</html>