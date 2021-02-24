<?php 
session_start();

//SESSIONを初期化
$_SESSION = array();

//Cookieに保存してある'SessionIDの保存期間を過去にして破棄
if(isset($_COOKIE[session_name()])){//session_name()はセッションIDを返す関数
  setcookie(session_name(), '', time()-42000,'/');
}

//サーバー側での、セッションIDの破棄(セッションのファイルをこの記述で削除している)
session_destroy();

//処理後、リダイレクト
header('Location: /view/login.php')

?>