<?php
//共通に使う関数を記述




//手打ち入力でログイン後のページにログインせずに行ってもエラーになるようにしている） 
function regiCheck()
{
  if (!isset($_SESSION['chk_regi'])) {
    header('Location: /session_regi_error/');
    exit();
  }
}

function loginCheck()
{
  if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    header('Location: /session_error/');
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

//店鋪画像の更新時の処理
function fileup($imgname, $varimg, $save, $pdo)
{
  global $uid;

  if ($_FILES[$varimg]['name']) {
    $varimg = date("Ymd") . random_int(1, 999999) . $_FILES[$imgname]['name'];
    $save = '/public/upload/' . basename($varimg); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
    move_uploaded_file($_FILES[$imgname]['tmp_name'], $save);
    $sql = "UPDATE shop SET $imgname=:$imgname WHERE user_id=:uid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
    $stmt->bindValue($imgname, $varimg, PDO::PARAM_STR);
    $status = $stmt->execute();
  }
  return $status;
}


//
function filein($imgname)
{
  //POSTデータ取得
  $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name']; //ここのnameはアップロードされたファイルのファイル名

  //指定フォルダに画像を保存
  $save = 'public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
  move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存
  return $imgname;
}
