<?php
require('../controller/mapinfo.php');
?>

<?php include('common/favicon.html') ?>
<title>マップ情報</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/mapinfo.css">
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
      <h2>マップ情報</h2>
      <div class='inframe'>
        <div>表示画像</div>
        <div class='inputs'> <img src="/public/upload/<?= $item['account_img']; ?>" class='mapimg' alt=""></div><br>
      </div>
      <div class='inframe'>
        <div>　　緯度</div>
        <div class='inputs'><?= $item['lat'] ?></div><br>
      </div>
      <div class='inframe'>
        <div>　　経度</div>
        <div class='inputs'><?= $item['lon'] ?></div><br>
      </div>
      <div class='inframe'>
        <div>タイトル</div>
        <div class='inputs'><?= $item['maptitle'] ?></div><br>
      </div>
      <!-- <div class='inframe'>
        <div>ピンの色</div>
        <div class='inputs'><?= $item['pincolor'] ?></div><br>
      </div> -->
      <div class='inframe'>
        <div>　　説明</div>
        <div class='txt'><?= $item['description'] ?></div><br>
      </div>
    </div>
    <div class="nav">
      <p><a class='maplink' href="/view/mapEdit.php/<?= $item['id'] ?>">マップ情報編集</a></p>
      <p><a href="/view/myprofile.php">店舗情報</a></p>
      <p><a href="/view/drege.php">日記の登録</a></p>
      <p><a href="/view/mapinfo.php">マップ情報</a></p>
    </div>
  </div>

  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('common/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>