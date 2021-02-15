<?php 
session_start();
include('../../common/funcs.php');

$uid = $_SESSION['uid'];
$pdo = dbcon();
include('../../common/header-icon.php');


include('../../common/favicon.html') 
?>
    <title>マイページ</title>
    <?php include('../../common/style.html') ?>
    <link rel="stylesheet" href="/public/css/mypage.css">

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
    <p class='mylink'><a href="myprofile.php">店舗登録情報</a></p>
    <p class='mylink'><a href="drege.php">日記の登録</a></p>
    <p class='mylink'><a href="frege.php">花の登録</a></p>
    <p class='mylink'><a href="mapinfo.php">マップ情報</a></p>
   </div>




</div>


<!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
<div class="footer-glid">
    <footer>
        <h3 class='topSubtitle'>Copyright  second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <div class='Fnav web ' >
    <ul class='navs'>
    <li ><a href="/map" ><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
    <li ><a href="/shops" ><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
    <li ><a href="/diarys" ><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
    <li ><a href="/flowers" ><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
    <!-- <li><div id='search'>検索</div></li> -->

    </ul>
    </div>
</div>
<!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->





</div>
</body>
</html>