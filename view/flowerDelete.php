<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$id = $_GET['id'];

//データ登録SQL作成
$sql = 'DELETE FROM flower WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();


//データ登録処理後
redirectCheck('/view/frege.php');
