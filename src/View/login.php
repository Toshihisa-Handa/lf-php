<?php
session_start(); //セッション変数を使うよという意味。これで他のファイルでも$_SESSION[];で指定した変数が使用できる
include('../../common/funcs/funcs.php');
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$errors = [];

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

if (!empty($_POST)) {

  //データ登録sql作成
  $sql = 'SELECT * FROM user WHERE email=:email';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email', $email);
  $status = $stmt->execute();
  //抽出データ数を取得
  $val = $stmt->fetch();

  //該当レコードがあればSESSIONに値を代入
  if (password_verify($password, $val['password'])) {

    $_SESSION['chk_ssid']  = session_id(); //ここは自由に好きな名前を振るのもOK
    $_SESSION['name']  = $val['name']; //$valに今回DBへ登録した値が入っており、そのうちのnameを取得する為この記述をしている。そして$_SESSION['name']で定義すると他のページでsession_start();を宣言した後使用できるようになる。
    $_SESSION['uid']  = $val['user_id'];
    //Login処理OKの場合index.phpへ遷移
    header('Location: /index.php');
    exit();
  } else {
    //Login処理NGの場合
    $errors['errorLog'] = 'メールアドレスとパスワードが一致しませんでした。';
    // header('Location: /src/view/login.php');
  }
}


?>





<?php include('../../common/component/favicon.html') ?>
<title>ログイン</title>
<?php include('../../common/component/style.html') ?>
<link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
  <div class="flowers-glid">
    <header>
      <ul>
        <?php include('../../common/component/header-nav-leftIcon.html') ?>
      </ul>
    </header>
    <div class="img1">
    </div>
    <div class="title1 ">
      <h1 class='topTitle'>Login Page</h1>
    </div>
  </div>
  <div class="login-list">
    <div class="loginimg">
    </div>
    <div class="loginList">
      <div class='login-card'>
        <form action="/src/View/login.php" method="post">
          <span class="label">E-mail</span><input class='linput' type="email" name="email" class="input" required><br>
          <br>
          <span class="label">Password</span><input class='linput' type="password" name="password" class="input" required><br>
          <br>
          <span style='color:red;'> <?php echo isset($errors['errorLog']) ? $errors['errorLog'] : ''; ?></span>
          <button class="lbutton" type="submit" class="submit">login</button>
        </form>
        <!-- <% if (typeof noUser !== 'undefined') { %>
          <p class="error"><%= noUser %></p>
      <% } %> -->
        <div class="rlink">
          <a href="register.php"><span class='underbar'>&nbsp;&nbsp;新規御登録の方はこちらへ</span></a>
        </div>
      </div>
    </div>
  </div>
  <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
  <div class="footer-glid">
    <footer class='topSubtitle'>
      <h3>Copyright second-cube</h3>
    </footer>
    <!-- フッターナビ -->
    <?php include('../../common/component/footer.html') ?>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>