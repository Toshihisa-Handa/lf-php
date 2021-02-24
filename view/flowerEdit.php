<?php
require('../controller/flowerEdit.php');
?>

<?php include('common/favicon.html') ?>
<title>花編集</title>
</head>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/flowerEdit.css">

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
      <h2>花編集</h2>
      <form action='/view/flowerEditUpdate.php' method="post">
        <div class='inframe'>
          <div>　　品名</div><input class='inputs' type="text" name="name" value='<?= $item["name"] ?>'><br>
        </div>
        <div class='inframe'>
          <div>　　価格</div><input class='inputs' type="text" name="price" value='<?= $item["price"] ?>'><br>
        </div>
        <div class='inframe'>
          <div>　　特徴</div><input class='inputs' type="text" name="feature" value='<?= $item["feature"] ?>'><br>
        </div>
        <div class='inframe'>
          <div>　　タグ</div><input class='inputs' type="text" name="tag" value='<?= $item["tag"] ?>'><br>
        </div>
        <div class='inframe'>
          <div>テキスト</div><textarea class='txt' name="text"><?= $item["text"] ?></textarea><br>
        </div>
        <input type="hidden" name='id' value="<?= $item["id"] ?>">

        <button type="submit" class='sends'>送信</button>
      </form>
    </div>
    <br>
    <div class="nav">
      <p><a href="/view/frege.php">花の登録</a></p>
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