<?php 
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

//データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM shop where user_id=:uid");
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();
$items = $stmt->fetchAll();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} ?>