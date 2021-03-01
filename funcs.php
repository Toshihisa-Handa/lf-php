<?php
//共通に使う関数を記述
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

function dbcon()
{
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
  } catch (PDOException $e) {
    print "エラー！" . $e->getMessage() . "<br/>";
    exit('終了します');
  }
  return $pdo;
}

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



function filein($imgname)
{
  //POSTデータ取得
  $imgname = date("Ymd") . random_int(1, 999999) . $_FILES['image']['name']; //ここのnameはアップロードされたファイルのファイル名

  //指定フォルダに画像を保存
  $save = '../upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
  move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存
  return $imgname;
}
