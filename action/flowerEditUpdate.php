<?php
include('../funcs.php');

//loginCheck()

//DB接続
$pdo = dbcon();



$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];

//データ登録SQL作成
$sql = 'UPDATE flower SET name=:name,price=:price,feature=:feature,tag=:tag,text=:text WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);
$stmt->bindValue(':price', h($price), PDO::PARAM_INT);
$stmt->bindValue(':feature', h($feature), PDO::PARAM_STR);
$stmt->bindValue(':tag', h($tag), PDO::PARAM_STR);
$stmt->bindValue(':text', h($text), PDO::PARAM_STR);
$stmt->bindValue(':id',   $id,     PDO::PARAM_INT);
$status = $stmt->execute();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /frege/');
  exit;
}
