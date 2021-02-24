<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
include('common/header-icon.php');

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$items = $stmt->fetchAll();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
}
