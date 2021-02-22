<?php
session_start();
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$title = $_POST['title'];
$text = $_POST['text'];
include('../../common/component/header-icon.php');

if (!$_GET) {
  $sql = "SELECT 
         flower.id,flower.name,flower.price,flower.feature,flower.tag,flower.created_at,flower.user_id,flower.image,shop.name AS shopname,shop.account_img
         FROM flower JOIN shop on flower.user_id =shop.user_id
         ORDER BY flower.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT flower.id,flower.name,flower.price,flower.feature,flower.tag,
                flower.created_at,flower.user_id,flower.image,shop.name AS shopname
                FROM flower JOIN shop on
                flower.user_id =shop.user_id 
                WHERE flower.name LIKE :kensaku 
                OR flower.feature LIKE :kensaku OR flower.text LIKE :kensaku OR flower.tag LIKE :kensaku OR shop.name LIKE :kensaku
                ORDER BY flower.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}

?>