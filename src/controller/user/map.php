<?php
session_start();
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

$sql = "SELECT map.lat,map.lon,map.maptitle,map.pincolor,map.description,shop.id,shop.shop_img 
        FROM map JOIN shop on map.user_id = shop.user_id";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$items = $stmt->fetchAll();

?>
