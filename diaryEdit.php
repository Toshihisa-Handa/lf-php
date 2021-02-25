<?php
require('controller/diaryEdit.php')
?>


<?php
include('common/favicon.html')
?>
<title>日記編集</title>
</head>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/diaryEdit.css">

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
      <h2>日記編集</h2>
      <form action='/diaryEditUpdate.php' method="post">
        <div class='inframe'>
          <div>タイトル</div><input class='inputs' type="text" name="title" value='<?= $item["title"] ?>'><br>
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
      <p><a href="/drege.php">日記の登録</a></p>
      <p><a href="/myprofile.php">店舗情報</a></p>
      <p><a href="/frege.php">花の登録</a></p>
      <p><a href="/mapinfo.php">マップ情報</a></p>
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