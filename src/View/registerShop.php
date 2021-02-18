<?php
session_start();
include('../../common/funcs.php');
regiCheck();

$name = $_POST['name'];
$titile = $_POST['titile'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
// $open = $_POST['open'];
// $close = $_POST['close'];
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
    include('../../common/class-db.php');
    $db = new DB;
    $pdo = $db->dbset();


    //バリデーション処理
    $docFilter = '#^[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々﨑]+$#'; //カタカナひらがな英数字記号Ok
    $titleFilter = '#[ァ-ヶぁ-んa-zA-Z0-9 -/:-@\[-_\'一-龠々﨑].{5}#';
    $webFileter = '/^http(.|s)/';
    $emailFilter = filter_var($email, FILTER_VALIDATE_EMAIL);
    $numFilter = '#^[\d]+$#';
    $adressFilter = '#^[ァ-ヶぁ-んa-zA-Z0-9一-龠々﨑\-]+$#';

    docFilter($name,'name');
    docFilter($title,'title1');
    docFilter($account_name,'account_name');
    docFilter($message,'message1');
    docFilter($feature,'feature');

  
 
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



        // // 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
        // if ($_FILES) {
        //     $account_img = date("Ymd") . random_int(1, 999999) . $_FILES['account_img']['name']; //ここのnameはアップロードされたファイルのファイル名
        //     $shop_img = date("Ymd") . random_int(1, 999999) . $_FILES['shop_img']['name'];
        //     $img1 = date("Ymd") . random_int(1, 999999) . $_FILES['img1']['name'];
        //     $img2 = date("Ymd") . random_int(1, 999999) . $_FILES['img2']['name'];
        //     $save = '../../public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        //     move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存**現在ルートディレクトリがtmp_nameを含んでいない為move_uploadが効かない。
        //     $sql = "INSERT INTO shop(account_img,shop_img,img1,img2)VALUES(:account_img,:shop_img,:img1,:img2)";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->bindValue(':account_img', $account_img, PDO::PARAM_STR);
        //     $stmt->bindValue(':sho_img', $sho_img, PDO::PARAM_STR);
        //     $stmt->bindValue(':img1', $img1, PDO::PARAM_STR);
        //     $stmt->bindValue(':img2', $img2, PDO::PARAM_STR);
        //     $status = $stmt->execute();
        //     header('Location: /src/View/registerShop.php'); //Location:の後ろの半角スペースは必ず入れる。
        // }
        // ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
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

            header('Location: /src/View/registerMap.php'); //Location:の後ろの半角スペースは必ず入れる。
            exit();
        }
    }
}


?>

<?php include('../../common/favicon.html'); ?>
<title>店舗情報編集</title>
<?php include('../../common/style.html') ?>
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
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい"><br>
                    <span style='color:red;'> <?php echo isset($errors['tell']) ? $errors['tell'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['tell2']) ? $errors['tell2'] : ''; ?></span>
                </div>

                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <!-- <input type="text" class='inputs' name="open" placeholder="10時"><br> -->
                    <select name="open-hour">
                        <option value="">選択して下さい</option>
                        <?php include('../../common/select0-24.html') ?>
                    </select>
                    <div>:</div>

                    <select name="open-time">
                        <option value="">選択して下さい</option>
                        <?php include('../../common/select00-60.html') ?>

                    </select>
                </div>

                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <!-- <input type="text" class='inputs' name="close" placeholder="18時"><br> -->
                    <select name="close-hour">
                        <option value="">選択して下さい</option>
                        <?php include('../../common/select0-24.html') ?>

                    </select>
                    <div>:</div>
                    <select name="close-time">
                        <option value="">選択して下さい</option>
                        <?php include('../../common/select00-60.html') ?>

                    </select>
                </div>

                <div class='inframe'>
                    <div>　　　　定休日</div>
                    <!-- <input type="text" class='inputs' name="holiday" placeholder="水曜日"><br> -->
                    <select name="holiday">
                        <option value="">選択して下さい</option>
                        <?php include('../../common/selectsun-sat.html') ?>
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
        <!-- <?php include('../../common/footer.html') ?> -->
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#attachment .fileinput').on('change', function() {
            var file = $(this).prop('files')[0];
            $(this).closest('#attachment').find('.filename').text(file.name);
        });
    </script>
</body>

</html>