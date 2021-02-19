<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

$id = $_POST['id'];
$uid = $_SESSION['uid'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];









//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');

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

  docFilter($maptitle, 'maptitle');


  if (empty($errors)) { //$errorsが空の時



    //データ登録SQL作成
    $sql = 'UPDATE map SET lat=:lat,lon=:lon,maptitle=:maptitle,description=:description WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lat', h($lat), PDO::PARAM_INT);
    $stmt->bindValue(':lon', h($lon), PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', h($maptitle), PDO::PARAM_STR);
    $stmt->bindValue(':description', h($description), PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();


    //データ登録処理後（基本コピペ使用でOK)
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /src/view/admin/mapinfo.php'); //Location:の後ろの半角スペースは必ず入れる。
      exit();
    }
  }
}





?>


<?php include('../../common/component/favicon.html') ?>
<title>マップ情報編集</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/mapEdit.css">

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
      <h1>マップ情報登録</h1>
      <form method="post">
        <div class='inframe'>
          <div>　　緯度</div><input class='inputs' type="text" name="lat" value='<?= $item['lat'] ?>'><br>
        </div>
        <div class='inframe'>
          <div>　　経度</div><input class='inputs' type="text" name="lon" value='<?= $item['lon'] ?>'><br>
        </div>
        <!-- <div class='inframe maphidden'>
          <div>ピンの色</div><input class='inputs' type="text" name="pincolor" value='<?= $item['pincolor'] ?>'><br>
        </div> -->
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
      <p><a href="/src/view/admin/mapinfo.php">マップ情報</a></p>
      <p><a href="/src/view/admin/myprofile.php">店舗情報</a></p>
      <p><a href="/src/view/admin/drege.php">日記の登録</a></p>
      <p><a href="/src/view/admin/mapinfo.php">マップ情報</a></p>


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
    <?php include('../../common/component/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->


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







  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script> -->
</body>

</html>