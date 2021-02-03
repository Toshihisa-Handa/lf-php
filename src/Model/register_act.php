<?php  

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];



//DB接続
try{
  $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
} catch(PDOException $e) {
  //ここでエラー時の内容を確認できるようになる。これがないとerror500が出るだけ
  print "エラー！" . $e->getMessage() . "<br/>";
  die('終了します');
}


  //３．データ登録SQL作成
  //prepare("")の中にはmysqlのSQLで入力したINSERT文を入れて修正すれば良いイメージ
  $stmt = $pdo->prepare("INSERT INTO user(name, email, password, created_at)VALUES(:name,:email,:password,sysdate());
  ");
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $stmt->bindValue(':password', $password, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)  第３引数は省略出来るが、セキュリティの観点から記述している。文字列か数値はmysqlのデータベースに登録したものがvarcharaかintかというところで判断する
  $status = $stmt->execute();
  
  
  //４．データ登録処理後（基本コピペ使用でOK)
  if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);//エラーが起きたらエラーの2番目の配列から取ります。ここは考えず、これを使えばOK
                               // SQLEErrorの部分はエラー時出てくる文なのでなんでもOK
  }else{
    //５．index.phpへリダイレクト(エラーがなければindex.phpt)
    header('Location: ../view/login.php');//Location:の後ろの半角スペースは必ず入れる。
    exit();
  
  }
    
  





?>