<?php
session_start();
include('../../common/funcs/funcs.php');
//regiCheck();

$uid = $_SESSION['uid'];
$uname = $_SESSION['uname'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
$maptitle = $_POST['maptitle'];
$description = $_POST['description'];

if ($_POST) {
  //db接続
  include('../../common/component/class-db.php');
  $db = new DB;
  $pdo = $db->dbset();

  docFilter($maptitle, 'maptitle');

  if (empty($errors)) { //$errorsが空の時
    //sql作成
    $stmt = $pdo->prepare("INSERT INTO map(lat,lon,maptitle,description,created_at,user_id)VALUES(:lat,:lon,:maptitle,:description,sysdate(),:user_id)");
    $stmt->bindValue(':lat', $lat, PDO::PARAM_INT);
    $stmt->bindValue(':lon', $lon, PDO::PARAM_INT);
    $stmt->bindValue(':maptitle', $maptitle, PDO::PARAM_STR);
    $stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      $_SESSION['chk_ssid']  = session_id(); //ここは自由に好きな名前を振るのもOK
      unset($_SESSION['chk_regi']);
      header('Location: /index.php'); //Location:の後ろの半角スペースは必ず入れる。
      exit();
    }
  }
}
?>