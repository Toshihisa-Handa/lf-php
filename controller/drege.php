<?php
session_start();
include('app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('common/header-icon.php');

//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT* FROM diary WHERE user_id = $uid ORDER BY created_at DESC");
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  $imgname = filein($imgname);



  //バリデーション
  docFilterDF($title, 'title');
  docFilterDF($tag, 'tag');

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO diary(title,image,tag,text,created_at,user_id)VALUES(:title, :imgname,:tag,:text,sysdate(),:uid)");
    $stmt->bindValue(':title', Utils::h($title), PDO::PARAM_STR);
    $stmt->bindValue(':imgname', Utils::h($imgname), PDO::PARAM_STR);
    $stmt->bindValue(':tag', Utils::h($tag), PDO::PARAM_STR);
    $stmt->bindValue(':text', Utils::h($text), PDO::PARAM_STR);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();

    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /drege.php');
      exit();
    }
  }
}
