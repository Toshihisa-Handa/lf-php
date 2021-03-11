<?php
session_start();
include('../../funcs.php');

//loginCheck()

//DB接続
$pdo = dbcon();


$id = $_GET['id'];
$uid = $_SESSION['uid'];
include('../../common/header-icon.php');

if (!$_POST) {

  //sql作成
  $sql = "SELECT * FROM flower WHERE id=:id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue('id', $id, PDO::PARAM_INT);
  $status = $stmt->execute();

  //データ登録処理後
  $view = '';
  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {
    $item = $stmt->fetch();
  }
} else {

  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $feature = $_POST['feature'];
  $tag = $_POST['tag'];
  $text = $_POST['text'];

  //データ登録SQL作成
  $sql = 'UPDATE flower SET name=:name,price=:price,feature=:feature,tag=:tag,text=:text WHERE id=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':name', h($name), PDO::PARAM_STR);
  $stmt->bindValue(':price', h($price), PDO::PARAM_INT);
  $stmt->bindValue(':feature', h($feature), PDO::PARAM_STR);
  $stmt->bindValue(':tag', h($tag), PDO::PARAM_STR);
  $stmt->bindValue(':text', h($text), PDO::PARAM_STR);
  $stmt->bindValue(':id',   $id,     PDO::PARAM_INT);
  $status = $stmt->execute();


  //データ登録処理後
  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {
    header('Location: /frege/');
    exit;
  }
}

?>

<?php include('../../common/metas.html') ?>
<title>花編集</title>
</head>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/css/flowerEdit.css">

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
      <h2>花編集</h2>
      <form method="post">
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
      <p><a href="/frege.php">花の登録</a></p>
      <p><a href="/myprofile.php">店舗情報</a></p>
      <p><a href="/drege.php">日記の登録</a></p>
      <p><a href="/mapinfo.php">マップ情報</a></p>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('../../common/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>