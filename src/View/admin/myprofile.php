<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()
$uid = $_SESSION['uid'];




//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');


//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$items = $stmt->fetchAll();



//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
}


?>


<?php include('../../common/component/favicon.html'); ?>
<title>登録情報</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofile.css">

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
      <?php foreach ($items as $item) : ?>

        <div class='pimg'>
          <?php if ($aimg == null) : ?>
            <div class='pbox1'><img src="/public/images/account3.png" alt=""></div>
          <?php else : ?>
            <div class='pbox1'><img src="/public/upload/<?= $aimg; ?>" alt=""></div>
          <?php endif; ?>

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
      <p><a href="/src/view/admin/myprofileEdit.php/<?= $item['uid']; ?>">店舗情報編集</a></p>
    <?php endforeach; ?>
    <p><a href="/src/view/admin/drege.php">日記の登録</a></p>
    <p><a href="/src/view/admin/frege.php">花の登録</a></p>
    <p><a href="/src/view/admin/mapinfo.php">マップ情報</a></p>
    </div>

  </div>

  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>

    <!-- フッターナビ -->
    <?php include('../../common/component/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->




  </div>
</body>

</html>