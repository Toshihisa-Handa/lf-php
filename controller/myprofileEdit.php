<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
$errors = $_SESSION['errors'];
include('common/header-icon.php');


// 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
if ($_FILES) {

    fileup('account_img', $account_img, $save1, $pdo);
    fileup('shop_img', $shop_img, $save2, $pdo);
    fileup('img1', $img1, $save3, $pdo);
    fileup('img2', $img2, $save4, $pdo);

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("SQLError:" . $error[2]);
    } else {
        header('Location: /myprofileEdit.php'); //Location:の後ろの半角スペースは必ず入れる。
        exit();
    }
}


//sql作成
$sql = "SELECT * FROM shop WHERE user_id=:uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
$view = '';
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    $item = $stmt->fetch();
}
