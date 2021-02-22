<?php
session_start();
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
include('../../common/component/header-icon.php');

if (!$_GET) {
  //データ登録SQL作成
  $sql = "SELECT 
          id,name,open,close,holiday,shop_img,feature,created_at
          FROM shop 
          ORDER BY created_at DESC";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT 
          id,name,open,close,holiday,location,shop_img,feature,created_at
          FROM shop 
          WHERE name LIKE :kensaku 
          OR feature LIKE :kensaku OR location LIKE :kensaku 
          ORDER BY shop.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}

?>