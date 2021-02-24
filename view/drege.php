<?php
require('../controller/drege.php')
?>

<?php include('common/favicon.html') ?>
<title>日記登録</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/drege.css">
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
      <h1>日記登録</h1>
      <form method="POST" enctype="multipart/form-data">
        <div id='attachment'>
          <label>
            <input type="file" name="image" class="fileinput">日記の登録
          </label>
          <span class="filename">選択されていません</span>
        </div><br>
        <div class='inframe'>
          <div>タイトル</div><input class='inputs' type="text" name="title"><br>
          <span style='color:red;'> <?php echo isset($errors['title']) ? $errors['title'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　タグ</div><input class='inputs' type="text" name="tag"><br>
          <span style='color:red;'> <?php echo isset($errors['tag']) ? $errors['tag'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>テキスト</div><textarea class='txt' name="text"></textarea><br>
        </div>
        <button type="submit" class='sends'>送信</button>
      </form>
    </div>
    <div class="line">
    </div>
    <div class="main2">
      <h2>日記一覧</h2>
      <div class="diary-container">
        <?php for ($i = 0; $i < count($images); $i++) : ?>
          <div class="dcard">
            <div class='diary-card'>
              <a href="/view/diary.php/? id=<?= $images[$i]['id']; ?>">
                <img src="/public/upload/<?= $images[$i]['image']; ?>" alt="">
                <h3><?= $images[$i]['title']; ?></h3>
                <p class='dtext'><?= $images[$i]['text']; ?></p>
              </a>
              <div class="option">
                <div class="update"><a href="/view/diaryEdit.php/? id=<?= $images[$i]['id']; ?>">編集</a></div>
                <div class="delete"><a href="/view/diaryDelete.php/? id=<?= $images[$i]['id']; ?>">削除</a></div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <br>
    <div class="nav">
      <p><a href="/view/myprofile.php">店舗情報</a></p>
      <p><a href="/view/frege.php">花の登録</a></p>
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

  <!-- 以下ファイルアップロード の記述 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script>
</body>

</html>