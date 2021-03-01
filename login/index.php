<?php
session_start(); //セッション変数を使うよという意味。これで他のファイルでも$_SESSION[];で指定した変数が使用できる
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//DB接続
$pdo = Database::dbcon();


$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$errors = [];

if (!empty($_POST)) {
  $sql = 'SELECT * FROM user WHERE email=:email';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email', Utils::h($email));
  $status = $stmt->execute();
  $val = $stmt->fetch();
  if (password_verify($password, $val['password'])) {
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['name']  = $val['name'];
    $_SESSION['uid']  = $val['user_id'];
    header('Location: /');
    exit();
  } else {
    $errors['errorLog'] = 'メールアドレスとパスワードが一致しませんでした。';
  }
}

?>


<?php include('../common/favicon.html') ?>
<title>ログイン</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
  <div class="flowers-glid">
    <header>
      <ul>
        <?php include('../common/header-nav-leftIcon.html') ?>
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
        <form  method="post">
          <span class="label">E-mail</span><input class='linput' type="email" name="email" class="input" required><br>
          <br>
          <span class="label">Password</span><input class='linput' type="password" name="password" class="input" required><br>
          <br>
          <span style='color:red;'> <?php echo isset($errors['errorLog']) ? $errors['errorLog'] : ''; ?></span>
          <button class="lbutton" type="submit" class="submit">login</button>
        </form>
        <div class="rlink">
          <a href="/register/"><span class='underbar'>&nbsp;&nbsp;新規御登録の方はこちらへ</span></a>
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
    <?php include('../common/footer.html') ?>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>