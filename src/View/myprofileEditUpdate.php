<?php
session_start();
include('../../common/funcs.php');


//1. POSTデータ取得
$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
$open = $_POST['open'];
$close = $_POST['close'];
$holiday = $_POST['holiday'];
$location = $_POST['location'];
$map = $_POST['map'];
$message = $_POST['message'];
$comment = $_POST['comment'];
$feature = $_POST['feature'];


//DB接続
$pdo = dbcon();


//データ登録SQL作成
$sql = 'UPDATE shop SET name=:name,title=:title,account_name=:account_name,web=:web,
email=:email,tell=:tell,open=:open,close=:close,holiday=:holiday,location=:location,map=:map,
message=:message,comment=:comment,feature=:feature WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':account_name', $account_name, PDO::PARAM_STR);
$stmt->bindValue(':web', $web, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':tell', $tell, PDO::PARAM_INT);
$stmt->bindValue(':open', $open, PDO::PARAM_STR);
$stmt->bindValue(':close', $close, PDO::PARAM_STR);
$stmt->bindValue(':holiday', $holiday, PDO::PARAM_STR);
$stmt->bindValue(':location', $location, PDO::PARAM_STR);
$stmt->bindValue(':map', $map, PDO::PARAM_STR);
$stmt->bindValue(':message', $message, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
$stmt->bindValue(':id',   $id,     PDO::PARAM_INT);  
$status = $stmt->execute();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /src/View/myprofileEdit.php');
  exit;
}
