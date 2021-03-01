<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$id = $_POST['id'];
$uid = $_SESSION['uid'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];
include('../common/header-icon.php');

//画像処理
if (!$_POST) {
  //データ登録SQL作成
  $sql = "SELECT map.id,map.lat,map.lon,map.pincolor,map.maptitle,
        map.description,map.created_at,map.user_id,shop.account_img 
        FROM map JOIN shop on map.user_id = shop.user_id 
        WHERE map.user_id = $uid";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();
} else {

  //バリデーション
  docFilter($maptitle, 'maptitle');

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $sql = 'UPDATE map SET lat=:lat,lon=:lon,maptitle=:maptitle,description=:description WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lat', Utils::h($lat), PDO::PARAM_INT);
    $stmt->bindValue(':lon', Utils::h($lon), PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', Utils::h($maptitle), PDO::PARAM_STR);
    $stmt->bindValue(':description', Utils::h($description), PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /mapinfo/');
      exit();
    }
  }
}

?>

<?php include('../common/favicon.html') ?>
<title>マップ情報編集</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/public/css/mapEdit.css">
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
      <h1>マップ情報登録</h1>
      <form method="post">
        <div class='inframe'>
          <div>　　緯度</div><input class='inputs' type="text" name="lat" value='<?= $item['lat'] ?>'><br>
        </div>
        <div class='inframe'>
          <div>　　経度</div><input class='inputs' type="text" name="lon" value='<?= $item['lon'] ?>'><br>
        </div>
        <div class='inframe '>
          <div>タイトル</div><input class='inputs' type="text" name="maptitle" value='<?= $item['maptitle'] ?>'><br>
          <span style='color:red;'> <?php echo isset($errors['maptitle']) ? $errors['maptitle'] : ''; ?></span>
        </div>
        <div class='inframe'>
          <div>　　説明</div><textarea class='txt' name="description"><?= $item['description'] ?></textarea><br>
        </div>
        <input type="hidden" name='id' value='<?= $item['id'] ?>'>
        <button type="submit" class='sends'>送信</button>
      </form>
    </div>
    <div class="nav">
      <p><a href="/mapinfo.php">マップ情報</a></p>
      <p><a href="/myprofile.php">店舗情報</a></p>
      <p><a href="/drege.php">日記の登録</a></p>
      <p><a href="/mapinfo.php">マップ情報</a></p>
      <p>
      <h2>住所変換</h2><button id='exec'>変換</button>
      </p>
      <p id='lat' value='<?= $item['lat'] ?>'><?= $item['lat'] ?></p>
      <p id='lon' value='<?= $item['lon'] ?>'><?= $item['lon'] ?></p>
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

  <!-- 以下apAPI読み込み -->
  <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
  <script>
    document.getElementById('exec').addEventListener('click', () => {
      if (document.getElementById('lat').value) {
        getLatLng(document.getElementById('lat').value, (latlng) => {
          map.setCenter(latlng)
        })
      }
    })
    console.log(document.getElementById('lat').value);
  </script>
</body>

</html>