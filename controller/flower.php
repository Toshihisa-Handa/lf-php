<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//DB接続
$pdo = Database::dbcon();


$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
$id = $_GET['id']; //flowerのid
$fcomment = $_POST['fcomment'];
include('common/header-icon.php');

if (!$_POST) {
  //データ登録SQL作成

  $sql0 = "SELECT Fc.fcomment, ifnull(U.name, '名無し') AS user_name,
            DATE_FORMAT(Fc.created_at, '%Y/%m/%d  %k:%i') AS created_at 
            FROM fcomment Fc LEFT OUTER JOIN user U ON Fc.user_id = U.user_id 
            WHERE Fc.flower_id = $id
            ORDER BY Fc.created_at DESC";

  $stmt = $pdo->prepare($sql0);
  $stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
  $status = $stmt->execute();
  $commentitems = $stmt->fetchAll();


  $sql = "SELECT flower.id,flower.name,flower.price,flower.feature,flower.text,flower.user_id,flower.image,shop.name AS shopname
          FROM flower 
          JOIN shop on flower.user_id = shop.user_id 
          WHERE flower.id = $id";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();

  //stripe用にセッションを用意
  $_SESSION['price'] = $item['price'];
  $_SESSION['name'] = $item['name'];
  $_SESSION['image'] = $item['image'];
} else {



  $sql = 'INSERT INTO fcomment (flower_id, fcomment, created_at, user_id) VALUES (:flower_id,:fcomment,sysdate(),:uid)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':flower_id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':fcomment', Utils::h($fcomment), PDO::PARAM_STR);
  if ($uid == null) {
    $stmt->bindValue(':uid', 0, PDO::PARAM_INT);
  } else {
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  }
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {

    header("Location: /flower.php/? id=$id");
    exit();
  }
}
