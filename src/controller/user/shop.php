<?php
session_start();
include('../../common/funcs/funcs.php');

//DBs接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
$id = $_GET['id'];
include('../../common/component/header-icon.php');

//データ登録SQL作成(3種類)
//1
$stmt = $pdo->prepare("SELECT * FROM shop where id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();
$item = $stmt->fetch();

//2
$stmt = $pdo->prepare("SELECT * FROM diary where user_id=:uid");
$stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
$status = $stmt->execute();
$diaryitems = $stmt->fetchAll();

//3
$stmt = $pdo->prepare("SELECT * FROM flower where user_id=:uid");
$stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
$status = $stmt->execute();
$floweritems = $stmt->fetchAll();

?>