<?php
//共通に使う関数を記述

//1.XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

//db接続
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

//3.セッションリジェネレイト処理を全てのページで行うため、関数化し記述を簡略化する(Login認証)
//手打ち入力でログイン後のページにログインせずに行ってもエラーになるようにしている） 
function regiCheck()
{
  if (!isset($_SESSION['chk_regi'])) {
    header('Location: /common/session_error.php');
    exit();
  }
}

function loginCheck()
{
  if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
    header('Location: /common/session_error.php');
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

