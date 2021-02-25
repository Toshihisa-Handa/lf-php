<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$id = $_POST['id'];
$uid = $_SESSION['uid'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];
include('common/header-icon.php');

//画像処理
if (!$_POST) {
  //データ登録SQL作成
  $sql = "SELECT map.id,map.lat,map.lon,map.pincolor,map.maptitle,
        map.description,map.created_at,map.user_id,shop.account_img 
        FROM map JOIN shop on map.user_id = shop.user_id 
        WHERE map.user_id = $uid";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();
} else {

  //バリデーション
  docFilter($maptitle, 'maptitle');

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $sql = 'UPDATE map SET lat=:lat,lon=:lon,maptitle=:maptitle,description=:description WHERE id=:id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':lat', Utils::h($lat), PDO::PARAM_INT);
    $stmt->bindValue(':lon', Utils::h($lon), PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', Utils::h($maptitle), PDO::PARAM_STR);
    $stmt->bindValue(':description', Utils::h($description), PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /mapinfo.php');
      exit();
    }
  }
}
