<?php
session_start();
include('../../funcs.php');

regiCheck();

$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];

if ($_POST) {
  //db接続
  $pdo = dbcon();


  docFilter($maptitle, 'maptitle');

  if (empty($errors)) { //$errorsが空の時
    //sql作成
    $stmt = $pdo->prepare("INSERT INTO map(lat,lon,maptitle,description,created_at,user_id)VALUES(:lat,:lon,:maptitle,:description,sysdate(),:user_id)");
    $stmt->bindValue(':lat', h($lat), PDO::PARAM_INT);
    $stmt->bindValue(':lon', h($lon), PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', h($maptitle), PDO::PARAM_STR);
    $stmt->bindValue(':description', h($description), PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      $_SESSION['chk_ssid']  = session_id(); //ここは自由に好きな名前を振るのもOK
      unset($_SESSION['chk_regi']);
      header('Location: /'); //Location:の後ろの半角スペースは必ず入れる。
      exit();
    }
  }
}

?>

<?php include('../../common/favicon.html') ?>
<title>マップ情報編集</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/css/mapEdit.css">
</head>

<body>
  <div class="grid-box">
    <header>
      <ul>
        <?php include('../../common/header-nav-leftIcon.html') ?>
        <div class='nav-right'>
        </div>
      </ul>
    </header>
    <div class="main">
      <h1>マップ情報登録</h1>
      <form method="post">
        <div class='inframe'>
          <div>　　緯度</div><input class='inputs' type="text" name="lat" value=''><br>
        </div>
        <div class='inframe'>
          <div>　　経度</div><input class='inputs' type="text" name="lon" value=''><br>
        </div>
        <div class='inframe '>
          <div>タイトル</div><input class='inputs' type="text" name="maptitle" value=''><br>
          <span style='color:red;'> <?php echo isset($errors['maptitle']) ? $errors['maptitle'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　説明</div><textarea class='txt' name="description"></textarea><br>
        </div>
        <button type="submit" class='sends'>送信</button>
      </form>
    </div>
    <div class="nav">
      <p><a href="/mapinfo.php">マップ情報</a></p>
      <p><a href="/myprofile.php">店舗情報</a></p>
      <p><a href="/drege.php">日記の登録</a></p>
      <p><a href="/frege.php">花の登録</a></p>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer>
      <h3>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <!-- <?php include('../../common/footer.html') ?> -->
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>