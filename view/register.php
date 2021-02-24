<?php
require('../../controller/user/register.php');
?>

<?php include('../../common/component/favicon.html') ?>
<title>新規登録</title>
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
      <h1 class='topTitle'>SignUp Page</h1>
    </div>
  </div>
  <div class="login-list">
    <div class="loginimg2">
    </div>
    <div class="loginList2">
      <div class='login-card'>
        <form action="/src/view/user/register.php" method="post" class="board-form">
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
          <a href="login.php"><span class='underbar'>&nbsp;&nbsp;ログインの方はこちらへ</span></a>
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
  </div>
  <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>