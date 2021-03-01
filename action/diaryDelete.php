<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();

$id = $_GET['id'];

//データ登録SQL作成
$sql = 'DELETE FROM diary WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //ここの：idは3-1の:idと同じ
$status = $stmt->execute(); //このexecuteで上で処理した内容を実行している


//データ登録処理後
redirectCheck('/drege/');
