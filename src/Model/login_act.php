<?php
session_start(); //セッション変数を使うよという意味。これで他のファイルでも$_SESSION[];で指定した変数が使用できる
$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);
$errors=[];
include('../../common/funcs.php');

//DB接続
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
} catch (PDOException $e) {
  print "エラー！" . $e->getMessage() . "<br/>";
  die('終了します');
}

//データ登録sql作成
$sql = 'SELECT * FROM user WHERE email=:email'; 
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);  
$status = $stmt->execute();

//データ登録処理後
if ($status == false) {
    $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]); 
 }

//抽出データ数を取得
$val = $stmt->fetch(); 

//該当レコードがあればSESSIONに値を代入
if (password_verify($password, $val['password'])) {

  $_SESSION['chk_ssid']  = session_id(); //ここは自由に好きな名前を振るのもOK
  $_SESSION['uname']  = $val['uname']; //ここのSESSIONの[]内も自由だが、分かりやすいようにmysqlのtableに合わせunameとしている。

  //Login処理OKの場合index.phpへ遷移
  header('Location: /index.php');
} else {
  //Login処理NGの場合login.phpへ遷移
  $errors['errorLog'] = 'メールアドレスとパスワードが一致しませんでした。';
  header('Location: /src/view/login.php');
}

//処理終了
exit();
