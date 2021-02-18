<?php 
session_start();
include('../../common/funcs.php');
loginCheck();


//1. POSTデータ取得
$id = $_POST['id'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];

//DB接続
include('../../common/class-db.php');
$db = new DB;
$pdo =$db->dbset();


//データ登録SQL作成
$sql = 'UPDATE diary SET title=:title,tag=:tag,text=:text WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);  
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':id',   $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();


//データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  header('Location: /src/View/drege.php');
  exit;
}
