<?php
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');

//DB接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

$sql = "SELECT map.lat,map.lon,map.maptitle,map.pincolor,map.description,shop.id,shop.shop_img 
        FROM map JOIN shop on map.user_id = shop.user_id";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$items = $stmt->fetchAll();
