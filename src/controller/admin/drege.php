<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT* FROM diary WHERE user_id = $uid ORDER BY created_at DESC");
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name']; //ここのnameはアップロードされたファイルのファイル名

  //指定フォルダに画像を保存
  $save = '../../../public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
  move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存**現在ルートディレクトリがtmp_nameを含んでいない為move_uploadが効かない。

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
      header('Location: drege.php');
      exit();
    }
  }
}
