<?php
session_start();
include('app/funcs/funcs.php');
include(__DIR__ . '/app/config.php');

unset($_SESSION['chk_regi']); //登録セッションの初期化

//DB接続
$pdo = Database::dbcon();



$uid = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$nameFilter = '/^[ぁ-んァ-ヶー一-龠々a-zA-Z0-9]+$/'; //漢字カナひらがな半角英数字許可
$hash = password_hash($password, PASSWORD_DEFAULT);
$emailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);
$passwordFilter = mb_strlen($password);
$passwordFilter2 = '/^[a-zA-Z0-9]+$/u'; //半角英数字許可


//バリデーション処理
if (!empty($_POST)) {
  $errors = [];
  if (preg_match($nameFilter, $name) === 0 || preg_match($nameFilter, $name) === false) {
    $errors['name'] = 'User Nameに不備があります。';
  }
  if ($emailFilter === false) {
    $errors['email'] = 'E-mailの形式「@」と「.」の記述を確認して下さい。';
  }
  if ($passwordFilter >= 13 || $passwordFilter <= 3) {
    $errors['password'] = 'パスワードは半角英数字8文字以上12文字以下で設定して下さい。';
  }
  if (preg_match($passwordFilter2, $password) === 0 || preg_match($passwordFilter2, $password) === false) {
    $errors['password2'] = 'Passwordに半角英数字以外が使用されています。';
  }
  if (empty($errors)) {
    $sql = "INSERT INTO user(name, email, password, created_at)VALUES(:name,:email,:password,sysdate())";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', Utils::h($name), PDO::PARAM_STR);
    $stmt->bindValue(':email', Utils::h($email), PDO::PARAM_STR);
    $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
    $status = $stmt->execute();
    $id = $pdo->lastInsertId();
    $_SESSION['uid'] = $id;
    $_SESSION['uname'] = $name;
    $_SESSION['uemail'] = $email;

    //データ登録処理後
    if ($status == false) {
      $errors['email2'] = 'このアドレスは既に使用されています';
    } else {
      $res = null; //生成した文字列を格納
      $string_length = 10; //生成する文字列の長さを指定
      $base_strings = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

      for ($i = 0; $i < $string_length; $i++) {
        $res .= $base_strings[random_int(0, count($base_strings) - 1)];
      }

      $_SESSION['chk_regi']  = $res . $email;
      header('Location: /registerShop.php');
      exit();
    }
  }
}

?>

<?php include('common/favicon.html') ?>
<title>新規登録</title>
<?php include('common/style.html') ?>
<link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
  <div class="flowers-glid">
    <header>
      <ul>
        <?php include('common/header-nav-leftIcon.html') ?>
      </ul>
    </header>
    <div class="img1">
    </div>
    <div class="title1 ">
      <h1 class='topTitle'>SignUp Page</h1>
    </div>
  </div>
  <div class="login-list">
    <div class="loginimg2">
    </div>
    <div class="loginList2">
      <div class='login-card'>
        <form action="/register.php" method="post" class="board-form">
          <span class="label ">User Name</span><input type="text" name="name" class="input linput2" placeholder="日本語、アルファベット対応" required value='<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name'], ENT_QUOTES) : ''; ?>'>
          <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
          <br>
          <br>
          <span class="label">E-mail</span><input type="email" name="email" class="input linput2" placeholder="例：yamada@gmail.com" required value='<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>'>
          <span style='color:red;'> <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
          <span style='color:red;'> <?php echo isset($errors['email2']) ? $errors['email2'] : ''; ?></span>
          <br>
          <br>
          <span class="label">Password</span><input type="password" name="password" class="input linput2" placeholder="半角英数字8文字以上で入力">
          <span style='color:red;'> <?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
          <span style='color:red;'> <?php echo isset($errors['password2']) ? $errors['password2'] : ''; ?></span>
          <br>
          <br>
          <button type="submit" class="submit lbutton2">SignUp</button>
        </form>
        <div class="rlink">
          <a href="/login.php"><span class='underbar'>&nbsp;&nbsp;ログインの方はこちらへ</span></a>
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
    <?php include('common/footer.html') ?>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>