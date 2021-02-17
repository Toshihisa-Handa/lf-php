<?php
session_start();
include('../../common/funcs.php');


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
$open = $openHour.':'.$openTime;
$closeHour = $_POST['close-hour'];
$closeTime = $_POST['close-time'];
$close = $closeHour.':'.$closeTime;
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
    $pdo = dbcon();


    // 画像投稿の項目＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    if ($_FILES) {
        $account_img = date("Ymd") . random_int(1, 999999) . $_FILES['account_img']['name']; //ここのnameはアップロードされたファイルのファイル名
        $shop_img = date("Ymd") . random_int(1, 999999) . $_FILES['shop_img']['name'];
        $img1 = date("Ymd") . random_int(1, 999999) . $_FILES['img1']['name'];
        $img2 = date("Ymd") . random_int(1, 999999) . $_FILES['img2']['name'];
        $save = '../../public/upload/' . basename($imgname); //保存先作成://ファイル名を使用して保存先ディレクトリを指定 basename()でファイルシステムトラバーサル攻撃を防ぐ
        move_uploaded_file($_FILES['image']['tmp_name'], $save); //指定した保存先へ保存**現在ルートディレクトリがtmp_nameを含んでいない為move_uploadが効かない。
        $sql = "INSERT INTO shop(account_img,shop_img,img1,img2)VALUES(:account_img,:shop_img,:img1,:img2)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':account_img', $account_img, PDO::PARAM_STR);
        $stmt->bindValue(':sho_img', $sho_img, PDO::PARAM_STR);
        $stmt->bindValue(':img1', $img1, PDO::PARAM_STR);
        $stmt->bindValue(':img2', $img2, PDO::PARAM_STR);
        $status = $stmt->execute();
        header('Location: /src/View/registerShop.php'); //Location:の後ろの半角スペースは必ず入れる。
    }
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
                </div>

                <div class='inframe'>
                    <div>　サブタイトル</div><input class='inputs' type="text" name="title" placeholder="例：お店のキャッチコピーなど"><br>
                </div>

                <div class='inframe'>
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" value='<?= $uname ?>' placeholder="例：花田かすみ"><br>
                </div>

                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com"><br>
                </div>

                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" value='<?= $uemail ?>' placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）"><br>
                </div>

                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい"><br>
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
                </div>

                <div class='inframe'>
                    <div>　　　　　地図</div><input type="text" class='inputs' name="map" placeholder="https://goo.gl/maps/xxxxxxxx"><br>
                </div>

                <div class='inframe'>
                    <div>　店舗タイトル</div><input type="text" class='inputs' name="message" placeholder="店舗からお客様への一言を記入"><br>
                </div>

                <div class='inframe'>
                    <div>　店舗コメント</div><textarea class='inputs' placeholder="店舗からお客様へのメッセージを記入" name="comment"></textarea><br>
                </div>

                <div class='inframe'>
                    <div>　　　店舗特徴</div><input type="text" class='inputs' name="feature" placeholder="店舗の特徴を一言で"><br>
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
        <div class='Fnav web '>
            <ul class='navs'>
                <li><a href="/map"><img class='navimg' src="/public/images/map-24.png" alt=""></a><a href="/map" class='Fnav-link hlink'>Map</a></li>
                <li><a href="/shops"><img class='navimg' src="/public/images/shop-24.png" alt=""></a><a href="/shops" class='Fnav-link hlink'>Shop</a></li>
                <li><a href="/diarys"><img class='navimg' src="/public/images/script-24.png" alt=""></a><a href="/diarys" class='Fnav-link hlink'>Diary</a></li>
                <li><a href="/flowers"><img class='navimg' src="/public/images/flower-24.png" alt=""></a><a href="/flowers" class='Fnav-link hlink'>Flower</a></li>
                <!-- <li><div id='search'>検索</div></li> -->

            </ul>
        </div>
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