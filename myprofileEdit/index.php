<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

//DB接続
$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
$posted = $_SESSION['posted'];
$errors = $_SESSION['errors'];
include('../common/header-icon.php');


// 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
if ($_FILES) {
    //account_img
    if ($_FILES['account_img']['name']) {

        $account_img = date("Ymd") . random_int(1, 999999) . $_FILES['account_img']['name']; //ここのnameはアップロードされたファイルのファイル名
        $save1 = '../public/upload/' . basename($account_img);
        move_uploaded_file($_FILES['account_img']['tmp_name'], $save1);
        $sql = "UPDATE shop SET account_img=:account_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':account_img', $account_img, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //shop_img
    if ($_FILES['shop_img']['name']) {
        $shop_img = date("Ymd") . random_int(1, 999999) . $_FILES['shop_img']['name'];
        $save2 = '../public/upload/' . basename($shop_img); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['shop_img']['tmp_name'], $save2);
        $sql = "UPDATE shop SET shop_img=:shop_img WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':shop_img', $shop_img, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img1
    if ($_FILES['img1']['name']) {
        $img1 = date("Ymd") . random_int(1, 999999) . $_FILES['img1']['name'];
        $save3 = '../public/upload/' . basename($img1); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img1']['tmp_name'], $save3);
        $sql = "UPDATE shop SET img1=:img1 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img1', $img1, PDO::PARAM_STR);
        $status = $stmt->execute();
    }
    //img2
    if ($_FILES['img2']['name']) {
        $img2 = date("Ymd") . random_int(1, 999999) . $_FILES['img2']['name'];
        $save4 = '../public/upload/' . basename($img2); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['img2']['tmp_name'], $save4);
        $sql = "UPDATE shop SET img2=:img2 WHERE user_id=:uid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uid', $uid, PDO::PARAM_STR);
        $stmt->bindValue(':img2', $img2, PDO::PARAM_STR);
        $status = $stmt->execute();
    }

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("SQLError:" . $error[2]);
    } else {
        header('Location: /myprofileEdit/'); //Location:の後ろの半角スペースは必ず入れる。
        exit();
    }
}


//sql作成
$sql = "SELECT * FROM shop WHERE user_id=:uid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue('uid', $uid, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
$view = '';
if ($status == false) {
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    $item = $stmt->fetch();
}


?>


<?php include('../common/favicon.html') ?>
<title>店舗情報編集</title>
<?php include('../common/style.html') ?>
<link rel="stylesheet" href="/public/css/myprofileEdit.css">
</head>

<body>
    <div class="grid-box">
        <header>
            <ul>
                <?php include('../common/header-nav-leftIcon.html') ?>
                <div class='nav-right'>
                    <?php include('../common/header-nav-rightIcon.php') ?>
                </div>
            </ul>
        </header>
        <div class="main">
            <h2>基本情報編集</h2>
            <h3 style='color:red;'> <?php echo isset($errors['other']) ? $errors['other'] : ''; ?></h3>
            <form action='/action/myprofileEditUpdate.php' method="post" class='editform1'>
                <div class='inframe'>
                    <div>　　　　店舗名</div><input class='inputs' type="text" name="name" placeholder="例：花田商店" value='<?= isset($posted['name']) ? $posted['name'] : $item["name"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど" value='<?= isset($posted['title']) ? $posted['title'] : $item["title"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['title1']) ? $errors['title1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['title2']) ? $errors['title2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" placeholder="例：花田かすみ" value='<?= isset($posted['account_name']) ? $posted['account_name'] : $item["account_name"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['account_name']) ? $errors['account_name'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com" value='<?= isset($posted['web']) ? $posted['web'] : $item["web"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['web']) ? $errors['web'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）" value='<?= isset($posted['email']) ? $posted['email'] : $item["email"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい" value='<?= isset($posted['tell']) ? $posted['tell'] : $item["tell"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['tell']) ? $errors['tell'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['tell2']) ? $errors['tell2'] : ''; ?></span>
                </div>
                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div>
                    <?php if ($item['open'] == null) : ?>
                        <select name="open-hour">
                            <option value="">選択して下さい</option>
                            <?php include('../common/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="open-time">
                            <option value="">選択して下さい</option>
                            <?php include('../common/select00-59.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="open-hour">
                            <option value="<?= isset($posted['open-hour']) ? $posted['open-hour'] :  explode(":", $item['open'])[0] ?>"><?= isset($posted['open-hour']) ? $posted['open-hour'] :  explode(":", $item['open'])[0] ?></option>
                            <?php include('../common/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="open-time">
                            <option value="<?= isset($posted['open-time']) ? $posted['open-time'] :  explode(":", $item['open'])[1] ?>"><?= isset($posted['open-time']) ? $posted['open-time'] :  explode(":", $item['open'])[1] ?></option>
                            <?php include('../common/select00-59.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　クローズ</div>
                    <?php if ($item['close'] == null) : ?>
                        <select name="close-hour">
                            <option value="">選択して下さい</option>
                            <?php include('../common/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="close-time">
                            <option value="">選択して下さい</option>
                            <?php include('../common/select00-59.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="close-hour">
                            <option value="<?= isset($posted['close-hour']) ? $posted['close-hour'] :  explode(":", $item['close'])[0] ?>"><?= isset($posted['close-hour']) ? $posted['close-hour'] :  explode(":", $item['close'])[0] ?></option>
                            <?php include('../common/select0-23.html') ?>
                        </select>
                        <div>:</div>
                        <select name="close-time">
                            <option value="<?= isset($posted['close-time']) ? $posted['close-time'] :  explode(":", $item['close'])[1] ?>"><?= isset($posted['close-time']) ? $posted['close-time'] :  explode(":", $item['close'])[1] ?></option>
                            <?php include('../common/select00-59.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　　定休日</div>
                    <?php if ($item['holiday'] == null) : ?>
                        <select name="holiday">
                            <option value="">選択して下さい</option>
                            <?php include('../common/selectMon-Sun.html') ?>
                        </select>
                    <?php else : ?>
                        <select name="holiday">
                            <option value="<?= isset($posted['holiday']) ? $posted['holiday'] : $item["holiday"] ?>"><?= isset($posted['holiday']) ? $posted['holiday'] : $item["holiday"] ?></option>
                            <option value="<?= $item['holiday'] ?>"><?= $item['holiday'] ?></option>
                            <?php include('../common/selectMon-Sun.html') ?>
                        </select>
                    <?php endif; ?>
                </div>
                <div class='inframe'>
                    <div>　　　　　住所</div><input type="text" class='inputs' name="location" placeholder="〇〇県〇〇市〇〇町〜" value='<?= isset($posted['location']) ? $posted['location'] : $item["location"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['location']) ? $errors['location'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx" value='<?= $item["map"] ?>'><br>
                </div>
                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入" value='<?= isset($posted['message']) ? $posted['message'] : $item["message"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['message1']) ? $errors['message1'] : ''; ?></span>
                    <span style='color:red;'> <?php echo isset($errors['message2']) ? $errors['message2'] : ''; ?></span>
                </div>
                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"><?= isset($posted['comment']) ? $posted['comment'] : $item["comment"] ?></textarea><br>
                </div>
                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で" value='<?= isset($posted['feature']) ? $posted['feature'] : $item["feature"] ?>'><br>
                    <span style='color:red;'> <?php echo isset($errors['feature']) ? $errors['feature'] : ''; ?></span>
                </div>
                <input type="hidden" name='id' value="<?= $item["id"] ?>">
                <button class='sends1 sends' type="submit">送信</button>
            </form>
        </div>
        <div class="line"></div>
        <div class="main2">
            <h2>画像情報編集</h2>
            <img class='formimg' src="/public/upload/<?= $item["account_img"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="account_img" class="fileinput">プロフィール写真の変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["shop_img"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="shop_img" class="fileinput">　店舗メイン画像変更　
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["img1"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img1" class="fileinput">店舗画像①（横長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="/public/upload/<?= $item["img2"] ?>" alt="">
            <form class='editform' method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img2" class="fileinput">店舗画像②（縦長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
        </div>
        <div class="nav">
            <p><a href="/myprofile/">店舗情報</a></p>
            <p><a href="/drege/">日記の登録</a></p>
            <p><a href="/frege/">花の登録</a></p>
            <p><a href="/mapinfo/">マップ情報</a></p>
        </div>
    </div>
    <!-- フッター ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->
    <div class="footer-glid">
        <footer>
            <h3>Copyright second-cube</h3>
        </footer>
        <!-- フッターナビ -->
        <?php include('../common/footer.html') ?>
    </div>
    <!-- フッターここまで ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝-->

    <!-- 以下はファイルアップロードの記述 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#attachment .fileinput').on('change', function() {
            var file = $(this).prop('files')[0];
            $(this).closest('#attachment').find('.filename').text(file.name);
        });
    </script>
</body>

</html>