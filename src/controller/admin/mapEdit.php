<?php 
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$id = $_POST['id'];
$uid = $_SESSION['uid'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];
include('../../common/component/header-icon.php');

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
    $stmt->bindValue(':lat', h($lat), PDO::PARAM_INT);
    $stmt->bindValue(':lon', h($lon), PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', h($maptitle), PDO::PARAM_STR);
    $stmt->bindValue(':description', h($description), PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /src/view/admin/mapinfo.php');
      exit();
    }
  }
}
 ?>