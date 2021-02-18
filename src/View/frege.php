<?php
session_start();
include('../../common/funcs.php');
loginCheck();

$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];


//DB接続
include('../../common/class-db.php');
$db = new DB;
$pdo = $db->dbset();
include('../../common/header-icon.php');

//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  //画像を取得

  //2．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("SELECT* FROM flower WHERE user_id = $uid ORDER BY created_at DESC"); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  //POSTデータ取得
  //ここのFILESで[]されているimageはinput type=fileタグのname部分の名称
  $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name']; //ここのnameはアップロードされたファイルのファイル名


  //指定フォルダに画像を保存
  $save = '../..//public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
  move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存




  docFilterDF($name,'name');
  docFilterDF($feature,'feature');
  docFilterDF($tag,'tag');
  $numFilter = '#^[0-9]+$#'; //数字Ok
  if (preg_match($numFilter, $price) === 0 || preg_match($numFilter, $price) === false) {
    $errors['price'] = '使用出来ない文字が使用されています。（数字を入力してください）。';
  }




  if (empty($errors)) { //$errorsが空の時




    //３．データ登録SQL作成
    //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
    $stmt = $pdo->prepare("INSERT INTO flower(name, price, feature, tag, text, created_at, user_id, image)VALUES(:name,:price,:feature,:tag,:text,sysdate(),:uid,:imgname);
  ");
    $stmt->bindValue(':name', h($name), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
    $stmt->bindValue(':price', h($price), PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
    $stmt->bindValue(':feature', h($feature), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
    $stmt->bindValue(':tag', h($tag), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT
    $stmt->bindValue(':text', h($text), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':imgname', $imgname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();


    //４．データ登録処理後（基本コピペ使用でOK)
    if ($status == false) {
      //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]); //エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
      // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
    } else {
      //５．index.phpへリダイレクト(エラーがなければindex.phpt)
      header('Location: frege.php'); //Location:の後ろの半角スペースは必ず入れる。
      exit();
    }
  }
}





?>



<?php include('../../common/favicon.html') ?>
<title>花登録</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/frege.css">

</head>

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
              <a href="flower.php/? id=<?= $images[$i]['id']; ?>">
                <img src="/public/upload/<?= $images[$i]['image']; ?>" alt="">
                <h3><?= $images[$i]['name']; ?></h3>
                <div class='fprice'><?= number_format($images[$i]['price']); ?>円（税別）</div>
                <div class='ffeature'><?= $images[$i]['feature']; ?></div>
                <div class='ffeature'><?= $images[$i]['tag']; ?></div>

              </a>
            </div>
            <div class="option">
              <div class="update"><a href="flowerEdit.php/? id=<?= $images[$i]['id']; ?>">編集</a></div>
              <div class="delete"><a href="flowerDelete.php/? id=<?= $images[$i]['id']; ?>">削除</a></div>
            </div>
          </div>
        <?php endfor; ?>
      </div>



    </div>


    <div class="nav">
      <p><a href="/src/View/myprofile.php">店舗情報</a></p>
      <p><a href="/src/View/drege.php">日記の登録</a></p>
      <p><a href="/src/View/mapinfo.php">マップ情報</a></p>
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



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $('#attachment .fileinput').on('change', function() {
      var file = $(this).prop('files')[0];
      $(this).closest('#attachment').find('.filename').text(file.name);
    });
  </script>
</body>

</html>