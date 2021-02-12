<?php
session_start();
include('../../common/funcs.php');


$name = $_POST['name'];
$titile = $_POST['titile'];
$account_name = $_POST['account_name'];
$web = $_POST['web'];
$email = $_POST['email'];
$tell = $_POST['tell'];
$open = $_POST['open'];
$close = $_POST['close'];
$holiday = $_POST['holiday'];
$location = $_POST['location'];
$map = $_POST['map'];
$message = $_POST['message'];
$comment = $_POST['comment'];
$feature = $_POST['feature'];
$uid = $_SESSION['uid'];
$uemail = $_SESSION['uemail'];
$uname = $_SESSION['uname'] ;

if($_POST){
//DB接続
$pdo = dbcon();


//データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO shop(user_id,name,title,account_name,web,email,tell,open,close,holiday,location,map,message,comment,created_at,feature)VALUES(:uid,:name,:title,:account_name,:web,:email,:tell,:open,:close,:holiday,:location,:map,:message,:comment,sysdate(),:feature)");
// $stmt = $pdo->prepare("INSERT INTO shop(user_id,name,account_name,created_at)VALUES(:uid,:name,:account_name,sysdate())");
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
                    <div>　アカウント名</div><input class='inputs' type="text" name="account_name" value='<?=$uname?>' placeholder="例：花田かすみ"><br>
                </div>

                <div class='inframe'>
                    <div>　ウェブサイト</div><input class='inputs' type="text" name="web" placeholder="例：https://xxxxx.com"><br>
                </div>

                <div class='inframe'>
                    <div>メールアドレス</div><input class='inputs' type="text" name="email" value='<?=$uemail?>' placeholder="例：hanadaxxxxx@gmail.com（半角英数字で入力して下さい）"><br>
                </div>

                <div class='inframe'>
                    <div>　　　電話番号</div><input type="text" class='inputs' name="tell" placeholder="「–」なし半角数字で入力して下さい"><br>
                </div>

                <h2>営業時間</h2>
                <div class='inframe'>
                    <div>　　　オープン</div><input type="text" class='inputs' name="open" placeholder="10時"><br>
                </div>

                <div class='inframe'>
                    <div>　　　クローズ</div><input type="text" class='inputs' name="close" placeholder="18時"><br>
                </div>

                <div class='inframe'>
                    <div>　　　　定休日</div><input type="text" class='inputs' name="holiday" placeholder="水曜日"><br>
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

        <div class="line"></div>
        <div class="main2">
            <h2>画像情報編集</h2>
            <img class='formimg' src="<%= item.account_img %>" alt="">
            <form class='editform' action="/myprofile_img" method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="account_img" class="fileinput">プロフィール写真の変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="<%= item.shop_img %>" alt="">
            <form class='editform' action="/myprofile_img2" method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="shop_img" class="fileinput">　店舗メイン画像変更　
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="<%= item.img1 %>" alt="">
            <form class='editform' action="/myprofile_img3" method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img1" class="fileinput">店舗画像①（横長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
            </form>
            <img class='formimg' src="<%= item.img2 %>" alt="">
            <form class='editform' action="/myprofile_img4" method="post" enctype="multipart/form-data">
                <div id='attachment'>
                    <label>
                        <input type="file" name="img2" class="fileinput">店舗画像②（縦長）変更
                    </label>
                    <span class="filename">選択されていません</span>
                </div><br>
                <input class='sends' type="submit" value="送信">
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