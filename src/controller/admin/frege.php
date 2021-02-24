<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');
//loginCheck()

//DB接続
$pdo = Database::dbcon();

$name = $_POST['name'];
$price = $_POST['price'];
$feature = $_POST['feature'];
$tag = $_POST['tag'];
$text = $_POST['text'];
$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');

//画像処理
if ($_SERVER['REQUEST_METHOD'] != 'POST') {

  //データ登録SQL作成
  $stmt = $pdo->prepare("SELECT* FROM flower WHERE user_id = $uid ORDER BY created_at DESC"); //日付で登録が新しいものが上になる様に抽出
  $status = $stmt->execute();
  $images = $stmt->fetchAll();
} else {
  //POSTデータ取得
  $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name']; //ここのnameはアップロードされたファイルのファイル名

  //指定フォルダに画像を保存
  $save = '../../../public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
  move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存

  //バリデーション
  docFilterDF($name, 'name');
  docFilterDF($feature, 'feature');
  docFilterDF($tag, 'tag');
  $numFilter = '#^[0-9]+$#'; //数字Ok
  if (preg_match($numFilter, $price) === 0 || preg_match($numFilter, $price) === false) {
    $errors['price'] = '使用出来ない文字が使用されています。（数字を入力してください）。';
  }

  if (empty($errors)) { //$errorsが空の時
    //データ登録SQL作成
    $stmt = $pdo->prepare("INSERT INTO flower(name, price, feature, tag, text, created_at, user_id, image)VALUES(:name,:price,:feature,:tag,:text,sysdate(),:uid,:imgname);
  ");
    $stmt->bindValue(':name', Utils::h($name), PDO::PARAM_STR);
    $stmt->bindValue(':price', Utils::h($price), PDO::PARAM_INT);
    $stmt->bindValue(':feature', Utils::h($feature), PDO::PARAM_STR);
    $stmt->bindValue(':tag', Utils::h($tag), PDO::PARAM_STR);
    $stmt->bindValue(':text', Utils::h($text), PDO::PARAM_STR);
    $stmt->bindValue(':imgname', Utils::h($imgname), PDO::PARAM_STR);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
    $status = $stmt->execute();


    //データ登録処理後
    if ($status == false) {
      $error = $stmt->errorInfo();
      exit("SQLError:" . $error[2]);
    } else {
      header('Location: /src/view/admin/frege.php');
      exit();
    }
  }
}
