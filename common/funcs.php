<?php 
//共通に使う関数を記述

//1.XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//3.セッションリジェネレイト処理を全てのページで行うため、関数化し記述を簡略化する(Login認証)

//手打ち入力でログイン後のページにログインせずに行ってもエラーになるようにしている） 
function loginCheck(){
    if( !isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!=session_id()){
      echo 'ログインして下さい!'."\n";
      exit();
    }
    else{//elseの記述は元のコードではなく新規記述
      session_regenerate_id(true);
      $_SESSION['chk_ssid'] = session_id();
      // echo $_SESSION['chk_ssid'];
    }
}

function ar(){
  echo 'hoge';
}
?>