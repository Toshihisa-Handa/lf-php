<?php  
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$nameFilter = '/^[ぁ-んァ-ヶー一-龠a-zA-Z0-9]+$/u';//漢字カナひらがな半角英数字許可
$hash = password_hash($password, PASSWORD_DEFAULT);
$emailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);
$passwordFilter = mb_strlen($password);
$passwordFilter2 = '/^[a-zA-Z0-9]+$/u';//半角英数字許可

//名前が漢字　メールが@ .入ってる　パスワード8文字英数字以上12文字以下
if(preg_match($nameFilter,$name) && preg_match($passwordFilter2, $password) && $emailFilter && $passwordFilter >= 8 && $passwordFilter <=12){
  try{
    $pdo = new PDO('mysql:host=localhost;dbname=lf', 'root', 'root');
  } catch(PDOException $e) {
    print "エラー！" . $e->getMessage() . "<br/>";
    exit('終了します');
  }


//データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO user(name, email, password, created_at)VALUES(:name,:email,:password,sysdate());
  ");
  $stmt->bindValue(':name', $name, PDO::PARAM_STR);  
  $stmt->bindValue(':email', $email, PDO::PARAM_STR); 
  $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
  $status = $stmt->execute();
    
    
//データ登録処理後
  if($status==false){
      $error = $stmt->errorInfo();//emai重複時はここにエラー
      exit("SQLError:".$error[2]);
  }else{

//index.phpへリダイレクト(エラーがなければindex.phpt)
    header('Location: ../view/login.php');//Location:の後ろの半角スペースは必ず入れる。
      exit();
    }  

}else{//
    header('Location: ../view/register.php');//Location:の後ろの半角スペースは必ず入れる。
}




?>