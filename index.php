<?php
session_start();
include('src/common/funcs/funcs.php');
$uid = $_SESSION['uid'];
$name = $_SESSION['name'];


//DB接続
include('src/common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


//データ登録SQL作成
$stmt = $pdo->prepare("SELECT account_img FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$item = $stmt->fetch();



//データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
}

?>


<?php include('src/common/component/favicon.html'); ?>
<title>Life flower</title>
<?php include('src/common/component/style.html') ?>
<link rel="stylesheet" href="public/css/top.css">
</head>

<body>
    <div class="grid-box">
        <header>
            <ul>
                <li><a href="/index.php"><img src="/public/images/lf-logo-gray.png" alt="" class='logo'></a></li>
                <?php include('src/ommon/component/header-nav.html') ?>
                <div class='nav-right'>
                    <li>
                        <div id='search'>検索</div>
                    </li>
                    <?php if ($uid == false || '') : ?>
                        <li class='log'><a href="/src/view/user/login.php" class='hlink'>Login</a></li>
                    <?php else : ?>
                        <li class='log'><a href="/src/model/logout.php" class='hlink'>Logout</a></li>
                    <?php endif; ?>
                    <li class='account_img'>
                        <a href="/src/view/admin/mypage.php">
                            <?php if ($uid) { ?>
                                <?php if ($item['account_img'] === null) : ?>
                                    <img src="/public/images/account3.png" class='aimg' alt="">
                                <?php else : ?>
                                    <img src="/public/upload/<?= $item['account_img']; ?>" class='aimg' alt="">
                                <?php endif; ?>
                            <?php } ?>
                        </a>
                    </li>
                </div>
            </ul>
        </header>

        <div class='main'>
            <p class='mainTitle'>Life flower</p>
            <p class='mainSubtitle'>日々に彩り＋</p>
        </div>
        <div class='title1'>
            <h1 class='topTitle'>いつもの場所に花を飾りませんか</h1>

        </div>

        <div class="tips1">
            <h3 class='topSubtitle'>Life Flower で花をもっと身近に<br>
                日常に花の彩りを<br>
                外出自粛が続く昨今、今だからこそ<br>
                いつもの日常にプラスの色彩を加えてみませんか<br>
                普段通るあの道のあのお店、一体どんなところなんだろう<br>
                そんな疑問を解決するためにLife flowerは生まれました

            </h3>

        </div>
    </div>

    <div class="glid-box2">

        <div class='img1'>
            <img src="./public/images/images/1-1.png" alt="">
        </div>

        <div class='title2'>
            <h1 class='topTitle'>使い方</h1>
        </div>

        <div class="tips2">
            <h3 class='topSubtitle'>現在地周辺のお花屋さんを簡単に検索<br>
                販売している商品だけでなく、そのお店の日常も併せて閲覧<br>
                お気に入りのお店を見つけてください<br>
                これまで身近にあったけど、入れなかったあのお店、<br>
                Life flowerで覗いてみませんか<br>
                お花の詳細ページからご購入も可能です<br>
                お花が少しでも身近になった方は、本サイトを飛び出し、<br>
                ぜひ一度店舗へ遊びに行ってみてください</h3>
        </div>


        <div class='img2'>
            <img src="/public/images/img2.png" alt="">

        </div>


        <div class='link1'>
            <h1><a href="/src/view/user/shops"><span class='underbar topTitle'>&nbsp;&nbsp;&nbsp;Check Shops→&nbsp;&nbsp;</span></a></h1>
        </div>

        <div class='title3'>
            <h1 class='topTitle'>News</h1>
        </div>
    </div>


    <div class="glid-box3">

        <div class='left1'>
            <img src="/public/images/topimg6.png" alt="">
        </div>

        <div class="right1">
            <h1 class='topTitle2'>Flower shop Geek</h1>
            <h3 class='topSubtitle2'>10月1日よりOPENしました。<br>秋のベラドンナ入荷しました。<br>発色がよくほのかに香ります。<br>お近くお通りの際に是非覗いてみて下さい。
            </h3>
        </div>


        <div class='left2'>
            <h1 class='topTitle2'>Sun Flowers</h1>
            <h3 class='topSubtitle2'>10月1日よりOPENしました。<br>四季折々の素敵なお花を毎日用意してお待ちしています。<br>贈り物用のアレンジメントも得意です。</h3>
        </div>

        <div class="right2">
            <img src="/public/images/topimg5.jpg" alt="">
        </div>



        <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
        <footer>
            <h3 class='topSubtitle'>Copyright second-cube</h3>
        </footer>
    </div>
    <!-- フッターナビ -->
    <?php include('src/common/component/footer.html') ?>

    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->


    <!-- 
<script>
 const search = document.querySelector('#search')
 const hideSearch = document.querySelector('.search')
   search.onclick = function(){
     hideSearch.classList.toggle('search')
    // alert('hit')
 }

</script> -->
</body>

</html>