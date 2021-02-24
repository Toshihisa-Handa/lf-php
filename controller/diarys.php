<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');


//DB接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
include('../../common/component/header-icon.php');

if (!$_GET) {
  //データ登録SQL作成
  $sql = "SELECT 
         diary.id,diary.title,diary.image,diary.tag,diary.text,diary.created_at,shop.name AS shopname
         FROM diary JOIN shop on diary.user_id =shop.user_id
         ORDER BY diary.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
} else {
  $kensaku = $_GET['kensaku'];
  $kensaku = '%' . $kensaku . '%';
  $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,
        diary.created_at,shop.name AS shopname FROM diary JOIN shop on
        diary.user_id =shop.user_id 
        WHERE diary.title LIKE :kensaku 
        OR diary.tag LIKE :kensaku OR diary.text LIKE :kensaku OR shop.name LIKE :kensaku
        ORDER BY diary.created_at DESC";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':kensaku', $kensaku, PDO::PARAM_STR);
  $status = $stmt->execute();
  $items = $stmt->fetchAll();
}
