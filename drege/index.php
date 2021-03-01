<?php
session_start();
include('app/funcs/funcs.php');
include(__DIR__ . '/app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('common/header-icon.php');

//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT* FROM diary WHERE user_id = $uid ORDER BY created_at DESC");
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  $imgname = filein($imgname);



  //バリデーション
  docFilterDF($title, 'title');
  docFilterDF($tag, 'tag');

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO diary(title,image,tag,text,created_at,user_id)VALUES(:title, :imgname,:tag,:text,sysdate(),:uid)");
    $stmt->bindValue(':title', Utils::h($title), PDO::PARAM_STR);
    $stmt->bindValue(':imgname', Utils::h($imgname), PDO::PARAM_STR);
    $stmt->bindValue(':tag', Utils::h($tag), PDO::PARAM_STR);
    $stmt->bindValue(':text', Utils::h($text), PDO::PARAM_STR);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /drege.php');
      exit();
    }
  }
}

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
              <a href="/diary.php/? id=<?= $images[$i]['id']; ?>">
                <img src="/public/upload/<?= $images[$i]['image']; ?>" alt="">
                <h3><?= $images[$i]['title']; ?></h3>
                <p class='dtext'><?= $images[$i]['text']; ?></p>
              </a>
              <div class="option">
                <div class="update"><a href="/diaryEdit.php/? id=<?= $images[$i]['id']; ?>">編集</a></div>
                <div class="delete"><a href="/diaryDelete.php/? id=<?= $images[$i]['id']; ?>">削除</a></div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <br>
    <div class="nav">
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