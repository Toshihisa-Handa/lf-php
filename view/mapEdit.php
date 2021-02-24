<?php
require('../../controller/admin/mapEdit.php');
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

