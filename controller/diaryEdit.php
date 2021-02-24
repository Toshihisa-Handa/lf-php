<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');
//loginCheck()

//DB接続
$pdo = Database::dbcon();



$id = $_GET['id'];
$uid = $_SESSION['uid'];
include('common/header-icon.php');

//sql作成
$sql = "SELECT * FROM diary WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
$view = '';
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  $item = $stmt->fetch();
}
