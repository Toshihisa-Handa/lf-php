<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];


//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');


//データ登録SQL作成
$sql = "SELECT map.id,map.lat,map.lon,map.pincolor,map.maptitle,
        map.description,map.created_at,map.user_id,shop.account_img 
        FROM map JOIN shop on map.user_id = shop.user_id 
        WHERE map.user_id = $uid";
$stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
$status = $stmt->execute();
$item = $stmt->fetch();






?>



<?php include('../../common/component/favicon.html') ?>
<title>マップ情報</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/mapinfo.css">

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
      <h2>マップ情報</h2>
      <div class='inframe'>
        <div>表示画像</div>
        <div class='inputs'> <img src="../../public/upload/<?= $item['account_img']; ?>" class='mapimg' alt=""></div><br>
      </div>
      <div class='inframe'>
        <div>　　緯度</div>
        <div class='inputs'><?= $item['lat'] ?></div><br>
      </div>
      <div class='inframe'>
        <div>　　経度</div>
        <div class='inputs'><?= $item['lon'] ?></div><br>
      </div>
      <div class='inframe'>
        <div>タイトル</div>
        <div class='inputs'><?= $item['maptitle'] ?></div><br>
      </div>
      <!-- <div class='inframe'>
        <div>ピンの色</div>
        <div class='inputs'><?= $item['pincolor'] ?></div><br>
      </div> -->
      <div class='inframe'>
        <div>　　説明</div>
        <div class='txt'><?= $item['description'] ?></div><br>
      </div>

    </div>






    <div class="nav">
      <p><a class='maplink' href="/src/view/mapEdit.php/<?= $item['id'] ?>">マップ情報編集</a></p>
      <p><a href="/src/view/myprofile.php">店舗情報</a></p>
      <p><a href="/src/view/drege.php">日記の登録</a></p>
      <p><a href="/src/view/mapinfo.php">マップ情報</a></p>
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


</body>

</html>