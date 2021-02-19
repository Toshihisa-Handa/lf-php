<?php
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

//1. POSTデータ取得
$id = $_GET['id'];

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


//データ登録SQL作成
$sql = 'DELETE FROM diary WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); //ここの：idは3-1の:idと同じ
$status = $stmt->execute(); //このexecuteで上で処理した内容を実行している



//データ登録処理後
redirectCheck('/src/view/admin/drege.php');