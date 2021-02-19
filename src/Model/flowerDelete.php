<?php
session_start();
include('../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$id = $_GET['id'];

//データ登録SQL作成
$sql = 'DELETE FROM flower WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); 
$status = $stmt->execute(); 


//データ登録処理後
redirectCheck('/src/view/admin/frege.php');