<?php
session_start(); //セッション変数を使うよという意味。これで他のファイルでも$_SESSION[];で指定した変数が使用できる
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$errors = [];

//DB接続
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
} catch (PDOException $e) {
  print "エラー！" . $e->getMessage() . "<br/>";
  exit('終了します');
}

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
    $_SESSION['uname']  = $val['uname']; //ここのSESSIONの[]内も自由だが、分かりやすいようにmysqlのtableに合わせunameとしている。

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





<?php include('../../common/favicon.html') ?>
<title>ログイン</title>
<?php include('../../common/style.html') ?>
<link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
  <div class="flowers-glid">
    <header>
      <ul>
        <?php include('../../common/header-nav-leftIcon.html') ?>
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
    <div class='Fnav web '>
      <ul class='navs'>
        <li><a href="/map"><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
        <li><a href="/shops"><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
        <li><a href="/diarys"><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
        <li><a href="/flowers"><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
        <!-- <li><div id='search'>検索</div></li> -->
      </ul>
    </div>
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>