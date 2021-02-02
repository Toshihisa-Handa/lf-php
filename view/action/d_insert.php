<?php 
include('../funcs.php');

//1. POSTデータ取得

$title = $_POST['title'];
$tag = $_POST['tag'];
$text = $_POST['text'];


//2. DB接続
try {
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');

} catch (PDOException $e) {//$eにエラー内容が入っている。
  exit('DBConnectError:'.$e->getMessage());//ここのDBConnectErrorはエラー時の文字表示の為、ここはなんでも良い。この項目２は基本idとpass以外コピペで覚えればOK
}

//３．データ登録SQL作成
//prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
$stmt = $pdo->prepare("INSERT INTO diary(title,image,tag,text,created_at,user_id)VALUES(:title,'img', :tag,:text, sysdate(),1);");
$stmt->bindValue(':title', h($title), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
$stmt->bindValue(':tag', h($tag), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':text', h($text), PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後（基本コピペ使用でOK)
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);//エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
                             // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
}else{
  //５．index.phpへリダイレクト(エラーがなければindex.phpt)
  header('Location: ../drege.php');//Location:の後ろの半角スペースは必ず入れる。
  exit();

}