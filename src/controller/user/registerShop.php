<?php
session_start();
include('../../common/funcs/funcs.php');
regiCheck();

$name = $_POST['name'];
$titile = $_POST['titile'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
$openHour = $_POST['open-hour'];
$openTime = $_POST['open-time'];
$open = $openHour . ':' . $openTime;
$closeHour = $_POST['close-hour'];
$closeTime = $_POST['close-time'];
$close = $closeHour . ':' . $closeTime;
$holiday = $_POST['holiday'];
$location = $_POST['location'];
$map = $_POST['map'];
$message = $_POST['message'];
$comment = $_POST['comment'];
$feature = $_POST['feature'];
$uid = $_SESSION['uid'];
$uemail = $_SESSION['uemail'];
$uname = $_SESSION['uname'];

if ($_POST) {
    //DB接続
    include('../../common/component/class-db.php');
    $db = new DB;
    $pdo = $db->dbset();

    //バリデーション処理
    $docFilter = '#^[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々﨑]+$#'; //カタカナひらがな英数字記号Ok
    $titleFilter = '#[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々﨑].{5}#';
    $webFileter = '/^http(.|s)/';
    $emailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);
    $numFilter = '#^[\d]+$#';
    $adressFilter = '#^[ァ-ヶぁ-んa-zA-Z0-9一-龠々﨑\-]+$#';

    docFilter($name, 'name');
    docFilter($title, 'title1');
    docFilter($account_name, 'account_name');
    docFilter($message, 'message1');
    docFilter($feature, 'feature');

    if (!$title) {
    } else 
    if (mb_strlen($title) > 20) {
        $errors['title2'] = '20文字以内の記述をお願いします。';
    }
    if (!$web) {
    } else 
    if (preg_match($webFileter, $web) === 0 || preg_match($webFileter, $web) === false) {
        $errors['web'] = 'http or https から始まるURLを使用して下さい';
    }
    if (!$email) {
    } else 
    if ($emailFilter === false) {
        $errors['email'] = 'E-mailの形式「@」と「.」の記述を確認して下さい。';
    }
    if (!$tell) {
    } else 
    if (strlen($tell) > 11 || strlen($tell) < 10) {
        $errors['tell'] = '10又は11文字での記述をお願いします。';
    }
    if (!$tell) {
    } else 
    if (preg_match($numFilter, $tell) === 0 || preg_match($numFilter, $tell) === false) {
        $errors['tell2'] = '使用出来るのは数字のみです';
    }
    if (!$location) {
    } else 
    if (preg_match($adressFilter, $location) === 0 || preg_match($adressFilter, $location) === false) {
        $errors['location'] = '使用出来ない文字が使用されています。（記号は「-」、「ー」のみ使用可能です）。';
    }
    if (!$message) {
    } else 
    if (mb_strlen($message) > 15) {
        $errors['message2'] = '15文字以内の記述をお願いします。';
    }

    if (empty($errors)) { //$errorsが空の時

        //店舗情報登録の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        //データ登録SQL作成
        $stmt = $pdo->prepare("INSERT INTO shop(user_id,name,title,account_name,web,email,tell,open,close,holiday,location,map,message,comment,created_at,feature)VALUES(:uid,:name,:title,:account_name,:web,:email,:tell,:open,:close,:holiday,:location,:map,:message,:comment,sysdate(),:feature)");
        $stmt->bindValue(':uid', $uid, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':account_name', $account_name, PDO::PARAM_STR);
        $stmt->bindValue(':web', $web, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':tell', $tell, PDO::PARAM_INT);
        $stmt->bindValue(':open', $open, PDO::PARAM_STR);
        $stmt->bindValue(':close', $close, PDO::PARAM_STR);
        $stmt->bindValue(':holiday', $holiday, PDO::PARAM_STR);
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);
        $stmt->bindValue(':map', $map, PDO::PARAM_STR);
        $stmt->bindValue(':message', $message, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindValue(':feature', $feature, PDO::PARAM_STR);
        $status = $stmt->execute();
        //====================================================================

        //データ登録処理後
        if ($status == false) {
            $error = $stmt->errorInfo();
            exit("SQLError:" . $error[2]);
        } else {

            header('Location: /src/view/user/registerMap.php'); //Location:の後ろの半角スペースは必ず入れる。
            exit();
        }
    }
}
?>