<?php
//共通に使う関数を記述




//手打ち入力でログイン後のページにログインせずに行ってもエラーになるようにしている） 
function regiCheck()
{
  if (!isset($_SESSION['chk_regi'])) {
    header('Location: /src/view/error/session_regi_error.php');
    exit();
  }
}

function loginCheck()
{
  if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    header('Location: /src/view/error/session_error.php');
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION['chk_ssid'] = session_id();
  }
}

function test()
{
  global $errors;
  return $errors['name'] = 'ttthogte';
}
function test2()
{
  global $errors;
  return $errors['email'] = 'emai';
}

function docFilter($a, $b)
{
  global $errors;
  $filter = '#^[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々]+$#'; //カタカナひらがな英数字記号Ok
  if (!$a) {
  } else 
if (preg_match($filter, $a) === 0 || preg_match($filter, $a) === false) {
    return $errors[$b] = '使用出来ない文字が使用されています。（漢字は常用漢字をご使用下さい）。';
  }
}

function docFilterDF($a, $b)
{
  global $errors;
  $filter = '#^[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々]+$#'; //カタカナひらがな英数字記号Ok

  if (preg_match($filter, $a) === 0 || preg_match($filter, $a) === false) {
    return $errors[$b] = '使用出来ない文字が使用されてる。又はテキストが入力されていません。（漢字は常用漢字をご使用下さい）。';
  }
}


function redirectCheck($url)
{
  global $status, $stmt;
  if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
  } else {
    header("Location: " . $url); //Location:の後ろの半角スペースは必ず入れる。
    exit;
  }
}


function fileup($imgname,$varimg,$save,$pdo){
global $uid;

  if ($_FILES[$imgname]['name']) {
    $varimg = date("Ymd") . random_int(1, 999999) . $_FILES[$imgname]['name'];
    $save = '../../../public/upload/' . basename($varimg); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
    move_uploaded_file($_FILES[$imgname]['tmp_name'], $save);
    $sql = "UPDATE shop SET $imgname=:$imgname WHERE user_id=:uid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
    $stmt->bindValue($imgname, $varimg, PDO::PARAM_STR);
   $status = $stmt->execute();
}

return $status;

}