<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//DBs接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
$id = $_GET['id'];
include('common/header-icon.php');

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
