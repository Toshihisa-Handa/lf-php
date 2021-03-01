<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

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
    $pdo = Database::dbcon();


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
        $stmt->bindValue(':name', Utils::h($name), PDO::PARAM_STR);
        $stmt->bindValue(':title', Utils::h($title), PDO::PARAM_STR);
        $stmt->bindValue(':account_name', Utils::h($account_name), PDO::PARAM_STR);
        $stmt->bindValue(':web', Utils::h($web), PDO::PARAM_STR);
        $stmt->bindValue(':email', Utils::h($email), PDO::PARAM_STR);
        $stmt->bindValue(':tell', Utils::h($tell), PDO::PARAM_INT);
        $stmt->bindValue(':open', Utils::h($open), PDO::PARAM_STR);
        $stmt->bindValue(':close', Utils::h($close), PDO::PARAM_STR);
        $stmt->bindValue(':holiday', Utils::h($holiday), PDO::PARAM_STR);
        $stmt->bindValue(':location', Utils::h($location), PDO::PARAM_STR);
        $stmt->bindValue(':map', $map, PDO::PARAM_STR);
        $stmt->bindValue(':message', Utils::h($message), PDO::PARAM_STR);
        $stmt->bindValue(':comment', Utils::h($comment), PDO::PARAM_STR);
        $stmt->bindValue(':feature', Utils::h($feature), PDO::PARAM_STR);
        $status = $stmt->execute();
        //====================================================================

        //データ登録処理後
        if ($status == false) {
            $error = $stmt->errorInfo();
            exit("SQLError:" . $error[2]);
        } else {

            header('Location: /registerMap/'); //Location:の後ろの半角スペースは必ず入れる。
            exit();
        }
    }
}

?>

<?php include('../common/favicon.html'); ?>
<title>店舗情報編集</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofileEdit.css">
</head>

<body>
    <div class="grid-box">
        <header>
        </header>
        <div class="main">
            <h2>基本情報編集</h2>
            <form method="post" class='editform1' enctype="">
                <div class='inframe'>
                    <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店"><br>
                    <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど"><br>
                    <span style='color:red;'> <?php echo isset($errors['title1']) ? $errors['title1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['title2']) ? $errors['title2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" value='<?= $uname ?>' placeholder="例：花田かすみ"><br>
                    <span style='color:red;'> <?php echo isset($errors['account_name']) ? $errors['account_name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com"><br>
                    <span style='color:red;'> <?php echo isset($errors['web']) ? $errors['web'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" value='<?= $uemail ?>' placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）"><br>
                    <span style='color:red;'> <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" value="" placeholder="「–」なし半角数字で入力して下さい"><br>
                    <span style='color:red;'> <?php echo isset($errors['tell']) ? $errors['tell'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['tell2']) ? $errors['tell2'] : ''; ?></span>
                </div>
                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <select name="open-hour">
                        <option value="">選択して下さい</option>
                        <?php include('../common/select0-23.html') ?>
                    </select>
                    <div>:</div>
                    <select name="open-time">
                        <option value="">選択して下さい</option>
                        <?php include('../common/select00-59.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <select name="close-hour">
                        <option value="">選択して下さい</option>
                        <?php include('../common/select0-23.html') ?>
                    </select>
                    <div>:</div>
                    <select name="close-time">
                        <option value="">選択して下さい</option>
                        <?php include('../common/select00-59.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　　定休日</div>
                    <select name="holiday">
                        <option value="">選択して下さい</option>
                        <?php include('../common/selectMon-Sun.html') ?>
                    </select>
                </div>
                <div class='inframe'>
                    <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜"><br>
                    <span style='color:red;'> <?php echo isset($errors['location']) ? $errors['location'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx"><br>
                </div>
                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入"><br>
                    <span style='color:red;'> <?php echo isset($errors['message1']) ? $errors['message1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['message2']) ? $errors['message2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"></textarea><br>
                </div>
                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で"><br>
                    <span style='color:red;'> <?php echo isset($errors['feature']) ? $errors['feature'] : ''; ?></span>
                </div>
                <button class='sends1 sends' type="submit">送信</button>
            </form>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <!-- <?php include('../common/footer.html') ?> -->
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
</body>

</html>