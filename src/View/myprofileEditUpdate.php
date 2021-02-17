<?php
session_start();
include('../../common/funcs.php');


//1. POSTデータ取得
$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
// $open = $_POST['open'];
// $close = $_POST['close'];
$openHour = $_POST['open-hour'];
$openTime = $_POST['open-time'];
$open = $openHour.':'.$openTime;
$closeHour = $_POST['close-hour'];
$closeTime = $_POST['close-time'];
$close = $closeHour.':'.$closeTime;
$holiday = $_POST['holiday'];
$location = $_POST['location'];
$map = $_POST['map'];
$message = $_POST['message'];
$comment = $_POST['comment'];
$feature = $_POST['feature'];


//DB接続
$pdo = dbcon();



//バリデーション処理
// $errors = [];
// if(preg_match(ここに正規表現, $name) ===0 || preg_match(ここに正規表現, $name) === false){
//   $errors['name'] = '店舗名に使用出来ない文字が使用されています'
// }







//データ登録SQL作成
$sql = 'UPDATE shop SET name=:name,title=:title,account_name=:account_name,web=:web,
email=:email,tell=:tell,open=:open,close=:close,holiday=:holiday,location=:location,map=:map,
message=:message,comment=:comment,feature=:feature WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', h($name), PDO::PARAM_STR);
$stmt->bindValue(':title', h($title), PDO::PARAM_STR);
$stmt->bindValue(':account_name', h($account_name), PDO::PARAM_STR);
$stmt->bindValue(':web', h($web), PDO::PARAM_STR);
$stmt->bindValue(':email', h($email), PDO::PARAM_STR);
$stmt->bindValue(':tell', h($tell), PDO::PARAM_INT);
$stmt->bindValue(':open', h($open), PDO::PARAM_STR);
$stmt->bindValue(':close', h($close), PDO::PARAM_STR);
$stmt->bindValue(':holiday', h($holiday), PDO::PARAM_STR);
$stmt->bindValue(':location', h($location), PDO::PARAM_STR);
$stmt->bindValue(':map', h($map), PDO::PARAM_STR);
$stmt->bindValue(':message', h($message), PDO::PARAM_STR);
$stmt->bindValue(':comment', h($comment), PDO::PARAM_STR);
$stmt->bindValue(':feature', h($feature), PDO::PARAM_STR);
$stmt->bindValue(':id',   h($id),     PDO::PARAM_INT);  
$status = $stmt->execute();


//データ登録処理後
if ($status == false) {
  $error = $stmt->errorInfo();
  exit("SQLError:" . $error[2]);
} else {
  header('Location: /src/View/myprofileEdit.php');
  exit;
}
