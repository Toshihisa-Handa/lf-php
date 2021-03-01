<?php
session_start();
include('../funcs.php');
//loginCheck()

//DB接続
$pdo = dbcon();

$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('../common/header-icon.php');


//削除
if ($_POST['delete_id']) {
  $delete_id = $_POST['delete_id'];

  //データ登録SQL作成
  $sql = 'DELETE FROM flower WHERE id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $delete_id, PDO::PARAM_INT); //ここの：idは3-1の:idと同じ
  $status = $stmt->execute(); //このexecuteで上で処理した内容を実行している

  //データ登録処理後
  redirectCheck('/frege/');
}



//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT* FROM flower WHERE user_id = $uid ORDER BY created_at DESC"); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  $imgname = filein($imgname);


  //バリデーション
  docFilterDF($name, 'name');
  docFilterDF($feature, 'feature');
  docFilterDF($tag, 'tag');
  $numFilter = '#^[0-9]+$#'; //数字Ok
  if (preg_match($numFilter, $price) === 0 || preg_match($numFilter, $price) === false) {
    $errors['price'] = '使用出来ない文字が使用されています。（数字を入力してください）。';
  }

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO flower(name, price, feature, tag, text, created_at, user_id, image)VALUES(:name,:price,:feature,:tag,:text,sysdate(),:uid,:imgname);
  ");
    $stmt->bindValue(':name', h($name), PDO::PARAM_STR);
    $stmt->bindValue(':price', h($price), PDO::PARAM_INT);
    $stmt->bindValue(':feature', h($feature), PDO::PARAM_STR);
    $stmt->bindValue(':tag', h($tag), PDO::PARAM_STR);
    $stmt->bindValue(':text', h($text), PDO::PARAM_STR);
    $stmt->bindValue(':imgname', h($imgname), PDO::PARAM_STR);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();


    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /frege/');
      exit();
    }
  }
}

?>



<?php include('../common/favicon.html') ?>
<title>花登録</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/css/frege.css">
</head>

<body>
  <div class="grid-box">
    <header>
      <ul>
        <?php include('../common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
          <?php include('../common/header-nav-rightIcon.php') ?>
        </div>
      </ul>
    </header>
    <div class="main">
      <h1>花登録</h1>
      <form method="POST" enctype="multipart/form-data">
        <div id='attachment'>
          <label>
            <input type="file" name="image" class="fileinput">花の登録
          </label>
          <span class="filename">選択されていません</span>
        </div><br>
        <div class='inframe'>
          <div>　　　　品名</div><input class='inputs' type="text" name="name"><br>
          <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>価格（税込）</div><input class='inputs' type="text" placeholder="例：120  (半角数字で入力。単位（円）は入力不要です)" name="price"><br>
          <span style='color:red;'> <?php echo isset($errors['price']) ? $errors['price'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　　　特徴</div><input class='inputs' type="text" name="feature"><br>
          <span style='color:red;'> <?php echo isset($errors['feature']) ? $errors['feature'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　　　タグ</div><input class='inputs' type="text" name="tag"><br>
          <span style='color:red;'> <?php echo isset($errors['tag']) ? $errors['tag'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　テキスト</div><textarea class='txt' name="text"></textarea><br>
        </div>
        <button type="submit" class='sends'>送信</button>
      </form>
    </div>
    <div class="line">
    </div>
    <div class="main2">
      <h2>花一覧</h2>
      <div class="flower-container">
        <?php for ($i = 0; $i < count($images); $i++) : ?>
          <div class="fcard">
            <div class='flower-card'>
              <a href="/flower/? id=<?= $images[$i]['id']; ?>">
                <img src="/upload/<?= $images[$i]['image']; ?>" alt="">
                <h3><?= $images[$i]['name']; ?></h3>
                <div class='fprice'><?= number_format($images[$i]['price']); ?>円（税別）</div>
                <div class='ffeature'><?= $images[$i]['feature']; ?></div>
                <div class='ffeature'><?= $images[$i]['tag']; ?></div>
              </a>
            </div>
            <div class="option">
              <div class="update"><a href="/flowerEdit/? id=<?= $images[$i]['id']; ?>">編集</a></div>
              <form method="POST">
                <input type="hidden" name='delete_id' value="<?= $images[$i]['id']; ?>">
                <input type="submit" value='削除'>
              </form>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <div class="nav">
      <p><a href="/myprofile/">店舗情報</a></p>
      <p><a href="/drege/">日記の登録</a></p>
      <p><a href="/mapinfo/">マップ情報</a></p>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('../common/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->

  <!-- 以下はファイルアップロードの記述 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script>
</body>

</html>