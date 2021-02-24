<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

//データ登録SQL作成
$sql = "SELECT map.id,map.lat,map.lon,map.pincolor,map.maptitle,
        map.description,map.created_at,map.user_id,shop.account_img 
        FROM map JOIN shop on map.user_id = shop.user_id 
        WHERE map.user_id = $uid";
$stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
$status = $stmt->execute();
$item = $stmt->fetch();
