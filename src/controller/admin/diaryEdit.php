<?php 
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


$id = $_GET['id'];
$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

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
 ?>