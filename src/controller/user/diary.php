<?php 
session_start();
include('../../common/funcs/funcs.php');

//DB接続
include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
$id = $_GET['id']; //diaryのid
$dcomment = $_POST['dcomment'];
include('../../common/component/header-icon.php');

if (!$_POST) {
  //データ登録SQL作成
  $sql0 = "SELECT dcomment.dcomment,DATE_FORMAT(dcomment.created_at,'%Y/%m/%d %k:%i') AS created_at,ifnull(user.name,'名無し') AS user_name
          FROM dcomment
          LEFT OUTER JOIN user on dcomment.user_id = user.user_id
          WHERE dcomment.diary_id = $id
          ORDER BY dcomment.created_at DESC";

  $stmt = $pdo->prepare($sql0);
  $stmt->bindValue(':uid', $item['user_id'], PDO::PARAM_INT);
  $status = $stmt->execute();
  $commentitems = $stmt->fetchAll();


  $sql = "SELECT diary.id,diary.title,diary.image,diary.tag,diary.text,diary.user_id,shop.name AS shopname
          FROM diary 
          JOIN shop on diary.user_id = shop.user_id 
          WHERE diary.id = $id";
  $stmt = $pdo->prepare($sql); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $item = $stmt->fetch();
} else {
  $sql = 'INSERT INTO dcomment (diary_id, dcomment, created_at, user_id) VALUES (:diary_id,:dcomment,sysdate(),:uid)';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':diary_id', $id, PDO::PARAM_INT);
  $stmt->bindValue(':dcomment', $dcomment, PDO::PARAM_STR);
  $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
  $status = $stmt->execute();

  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {
    header("Location: /src/view/user/diary.php/? id=$id");
    exit();
  }
}
?>