<?php
session_start();
include('../common/funcs/funcs.php');
//loginCheck()

//DB接続
include('../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();


$id = $_POST['id'];
$name = $_POST['name'];
$title = $_POST['title'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
$openHour = $_POST['open-hour'];
$openTime = $_POST['open-time'];
$open = $openHour . ':' . $openTime;
$closeHour = $_POST['close-hour'];
$closeTime = $_POST['close-time'];
$close = $closeHour . ':' . $closeTime;
$holiday = $_POST['holiday'];
$location = $_POST['location'];
$map = $_POST['map'];
$message = $_POST['message'];
$comment = $_POST['comment'];
$feature = $_POST['feature'];
$errors = [];


//バリデーション
$titleFilter = '#[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々﨑].{5}#';
$webFileter = '/^http(.|s)/';
$emailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);
$numFilter = '#^[\d]+$#';
$adressFilter = '#^[ァ-ヶぁ-んa-zA-Z0-9一-龠々﨑\-]+$#';

docFilter($name, 'name');
docFilter($title, 'title1');
docFilter($account_name, 'account_name');
docFilter($message, 'message1');
docFilter($feature, 'feature');

if (!$title) {
} else 
if (mb_strlen($title) > 20) {
  $errors['title2'] = '20文字以内の記述をお願いします。';
}

if (!$web) {
} else 
if (preg_match($webFileter, $web) === 0 || preg_match($webFileter, $web) === false) {
  $errors['web'] = 'http or https から始まるURLを使用して下さい';
}
if (!$email) {
} else 
if ($emailFilter === false) {
  $errors['email'] = 'E-mailの形式「@」と「.」の記述を確認して下さい。';
}
if (!$tell) {
} else 
if (strlen($tell) > 11 || strlen($tell) < 10) {
  $errors['tell'] = '10又は11文字での記述をお願いします。';
}
if (!$tell) {
} else 
if (preg_match($numFilter, $tell) === 0 || preg_match($numFilter, $tell) === false) {
  $errors['tell2'] = '使用出来るのは数字のみです';
}
if (!$location) {
} else 
if (preg_match($adressFilter, $location) === 0 || preg_match($adressFilter, $location) === false) {
  $errors['location'] = '使用出来ない文字が使用されています。（記号は「-」、「ー」のみ使用可能です）。';
}

if (!$message) {
} else 
if (mb_strlen($message) > 15) {
  $errors['message2'] = '15文字以内の記述をお願いします。';
}

if (empty($errors)) { //$errorsが空の時
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
    $_SESSION['errors'] = [];
    header('Location: /src/view/admin/myprofile.php');
    exit;
  }
} else {
  $_SESSION['errors'] = $errors;

  header('Location: /src/view/admin/myprofileEdit.php');
}
