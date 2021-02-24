<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');

//loginCheck()

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
$errors = $_SESSION['errors'];
include('../../common/component/header-icon.php');


// 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
if ($_FILES) {
    //account_img
    if ($_FILES['account_img']['name']) {

        $account_img = date("Ymd") . random_int(1, 999999) . $_FILES['account_img']['name']; //ここのnameはアップロードされたファイルのファイル名
        $save1 = '../../../public/upload/' . basename($account_img);
        move_uploaded_file($_FILES['account_img']['tmp_name'], $save1);
        $sql = "UPDATE shop SET account_img=:account_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':account_img', Utils::h($account_img), PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //shop_img
    if ($_FILES['shop_img']['name']) {
        $shop_img = date("Ymd") . random_int(1, 999999) . $_FILES['shop_img']['name'];
        $save2 = '../../../public/upload/' . basename($shop_img); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['shop_img']['tmp_name'], $save2);
        $sql = "UPDATE shop SET shop_img=:shop_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':shop_img', Utils::h($shop_img), PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img1
    if ($_FILES['img1']['name']) {
        $img1 = date("Ymd") . random_int(1, 999999) . $_FILES['img1']['name'];
        $save3 = '../../../public/upload/' . basename($img1); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img1']['tmp_name'], $save3);
        $sql = "UPDATE shop SET img1=:img1 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img1', Utils::h($img1), PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img2
    if ($_FILES['img2']['name']) {
        $img2 = date("Ymd") . random_int(1, 999999) . $_FILES['img2']['name'];
        $save4 = '../../../public/upload/' . basename($img2); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img2']['tmp_name'], $save4);
        $sql = "UPDATE shop SET img2=:img2 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img2', zZZZ$img2, PDO::PARAM_STR);
        $status = $stmt->execute();
    }

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("SQLError:" . $error[2]);
    } else {
        header('Location: /src/view/admin/myprofileEdit.php'); //Location:の後ろの半角スペースは必ず入れる。
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
 ?>