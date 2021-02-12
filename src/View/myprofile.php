<?php
session_start();
include('../../common/funcs.php');
$uid = $_SESSION['uid'];




//DB接続
$pdo = dbcon();


//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$result = $stmt->fetchAll();



//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} 


?>


<?php include('../../common/favicon.html'); ?>
<title>登録情報</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofile.css">

</head>

<body>

  <div class="grid-box">
    <header>
      <ul>

        <div class='leftNav'>
          <li><a href="/"><img src="images/lf-logo-gray.png" alt="" class='logo'></a></li>
        </div>
        <?php include('../../common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <!--         
        <% if (typeof user == 'undefined') { %>
        <li class='log'><a href="/login" class='hlink'>Login</a></li>
        <% } else{%>
        <li class='log'><a href="/logout" class='hlink'>Logout</a></li>
        <% } %>
        <li class='account_img' >
           <a href="/mypage">
              <% if (typeof user !== 'undefined' ) { %>
                  <% if(sitems[0].account_img=== null){%>
                      <img src="images/account3.png" class='aimg' alt="" >  
                <% }else{ %>
                  <img src="<%=sitems[0].account_img %>" class='aimg' alt="" >  
                <% } %>
                <% } %>
          </a>
      </li> -->
        </div>

      </ul>
    </header>




    <div class="main">
      <?php foreach ($result as $item) : ?>

        <div class='pimg'>
          <?php if ($item['account_img']) : ?>
            <!-- <% if(item.account_img=== null){%> -->
            <div class='pbox1'><img src="images/account3.png" alt=""></div>
          <?php else : ?>
            <!-- <div class='pbox1'><img src="../../public/upload/<?= $item['account_img']; ?>" alt=""></div> -->
            <!-- <div class='pbox1'><img src="<%= item.account_img %>" alt=""></div> -->
          <?php endif; ?>
          <div class='pbox1'><img src="../../public/upload/<?= $item['account_img']; ?>" alt=""></div>

          <div class="pbox2">
            <div class='shopname'><?= $item['name']; ?></div>
            <div class='shoptitle'><?= $item['title']; ?></div>
            <div class='username'>アカウント名：<?= $item['account_name']; ?></div>
            <div class='link-text'>メール：<a class='link' href="<?= $item['email']; ?>"><?= $item['email']; ?></a></div>
            <div class='link-text'>電話番号：<a class='link' href="tel:<?= $item['tell']; ?> "><?= $item['tell']; ?></a></div>
            <div class='link-text'>HP：<a href="<?= $item['web']; ?>" class='link' target=”_blank”><?= $item['web']; ?></a></div>

          </div>
        </div>
    </div>
    <div class="line"></div>
    <div class="main2">
      <h3>営業時間：<?= $item['open']; ?>　〜　<?= $item['close']; ?></h3>
      <h3>定休日：<?= $item['holiday']; ?></h3>
      <h3>住所：<?= $item['location']; ?></h3>
      <div class="imgs">
        <div class="img1">
          <p>メイン画像</p>
          <img src="../../public/upload/<?= $item['shop_img']; ?>" alt="">
        </div>
        <div class="img1">
          <p>店舗写真①</p>
          <img src="../../public/upload/<?= $item['img1']; ?>" alt="">
        </div>
        <div class="img1">
          <p>店舗写真②</p>
          <img src="../../public/upload/<?= $item['img2']; ?>" alt="">
        </div>

      </div>
      <h3>店舗タイトル：<br>&nbsp;<?= $item['message']; ?></h3>
      <h3>店舗コメント</h3>
      <p><?= $item['comment']; ?></p>
      <h3>特徴：<?= $item['feature']; ?></h3>
      <h3>【地図】</h3>
      <iframe src="<?= $item['map']; ?>" width='100%' frameborder="0"></iframe>

    </div>

    <div class="nav">
      <p><a href="myprofileEdit.php/<?= $item['uid']; ?>">店舗情報編集</a></p>
    <?php endforeach; ?>
    <p><a href="drege.php">日記の登録</a></p>
    <p><a href="frege.php">花の登録</a></p>
    <p><a href="mapinfo.php">マップ情報</a></p>
    </div>

  </div>

  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <div class='Fnav web '>
      <ul class='navs'>
        <li><a href="/map"><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
        <li><a href="/shops"><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
        <li><a href="/diarys"><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
        <li><a href="/flowers"><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
        <!-- <li><div id='search'>検索</div></li> -->

      </ul>
    </div>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->




  </div>
</body>

</html>