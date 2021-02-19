<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

$uid = $_SESSION['uid'];



//1.GETでidを取得
$id = $_GET['id'];


//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/component/header-icon.php');


//sql作成
$sql = "SELECT * FROM flower WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
$view = '';
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  $item = $stmt->fetch();
}




?>




<?php
include('../../common/component/favicon.html')
?>
<title>花編集</title>
</head>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/flowerEdit.css">

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
      <h2>花編集</h2>
      <form action='/src/model/flowerEditUpdate.php' method="post">
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
      <p><a href="/frege">花の登録</a></p>
      <p><a href="/myprofile">店舗情報</a></p>
      <p><a href="/drege">日記の登録</a></p>
      <p><a href="/mapinfo">マップ情報</a></p>
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script>
</body>

</html>