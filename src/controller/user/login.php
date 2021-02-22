<?php
session_start(); //セッション変数を使うよという意味。これで他のファイルでも$_SESSION[];で指定した変数が使用できる
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$errors = [];

if (!empty($_POST)) {
  $sql = 'SELECT * FROM user WHERE email=:email';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email', $email);
  $status = $stmt->execute();
  $val = $stmt->fetch();
  if (password_verify($password, $val['password'])) {
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['name']  = $val['name'];
    $_SESSION['uid']  = $val['user_id'];
    header('Location: /index.php');
    exit();
  } else {
    $errors['errorLog'] = 'メールアドレスとパスワードが一致しませんでした。';
  }
}

?>
