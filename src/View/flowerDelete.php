<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

//1. POSTデータ取得
$id = $_GET['id'];

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


//データ登録SQL作成
$sql = 'DELETE FROM flower WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); //ここの：idは3-1の:idと同じ
$status = $stmt->execute(); //このexecuteで上で処理した内容を実行している



//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /src/View/frege.php'); //Location:の後ろの半角スペースは必ず入れる。
  exit;
}
