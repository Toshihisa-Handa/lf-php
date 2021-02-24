<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$id = $_POST['id'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];

//データ登録SQL作成
$sql = 'UPDATE diary SET title=:title,tag=:tag,text=:text WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', Utils::h($title), PDO::PARAM_STR);
$stmt->bindValue(':tag', Utils::h($tag), PDO::PARAM_STR);
$stmt->bindValue(':text', Utils::h($text), PDO::PARAM_STR);
$stmt->bindValue(':id',   $id,     PDO::PARAM_INT);
$status = $stmt->execute();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /view/drege.php');
  exit;
}
