<?php
include('../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];

//データ登録SQL作成
$sql = 'UPDATE flower SET name=:name,price=:price,feature=:feature,tag=:tag,text=:text WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':text', $text, PDO::PARAM_STR);
$stmt->bindValue(':id',   $id,     PDO::PARAM_INT);
$status = $stmt->execute();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /src/view/admin/frege.php');
  exit;
}
